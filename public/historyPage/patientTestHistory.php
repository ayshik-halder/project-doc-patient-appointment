<?php
include "../config.php";
session_start();
if ($_SESSION["loggedIn"]) {
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <link rel="stylesheet" type="text/css" href="/assets/css/userHistory.css" />
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>

    <body>

        <?php
        $uname =  $_SESSION["uname"];
        $patient_id =  $_SESSION["patient_id"];

        $sql = "SELECT *
                FROM patient, book_test, test, clinic
                WHERE patient.p_id = book_test.patient_id AND test.t_id = book_test.test_id AND clinic.id = book_test.clinic_id AND  p_id='$patient_id'
                ORDER BY date DESC";

        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        if ($row) {
        ?>
            <header id="header">
                <div class="logo">
                    <a href="/index.php">
                        <img class="logo-img" id="header-img" src="/assets/images/doceasy/doceasy-patient-logo.svg" alt="DocEasy logo" />
                    </a>
                </div>

                <nav id="nav-bar">
                    <ul>
                        <li><a class="nav-link" href="#"><?php echo $row["full_name"];  ?></a></li>
                        <li><a class="nav-link" href="/public/dashboard/patientDash.php">Exit</a></li>
                        <li><a class="nav-link" href="/public/logout/patietLogout.php">Logout</a></li>
                    </ul>
                </nav>
            </header>
            <main>
                <section id="table">
                    <div class="container">
                        <div class="card">
                            <table>
                                <tr>
                                    <th>DATE</th>
                                    <th>TIME</th>
                                    <th>CLINIC</th>
                                    <th>TEST</th>
                                    <th>FEE</th>
                                    <th>STATUS</th>
                                    <th>TEST REPORTS</th>
                                    <th>ACTION</th>
                                </tr>

                                <?php
                                while ($row = $result->fetch_assoc()) {
                                ?>
                                    <tr>
                                    <td> <?php echo $row["date"]; ?> </td>
                                    <td> <?php echo $row["start_time"]."-".$row["end_time"]; ?> </td>
                                    <td> <?php echo $row["clinic_name"]; ?> </td>
                                    <td> <?php echo $row["test_type"]; ?> </td>
                                    <td> <?php echo $row["minimum_fee"]."-".$row["maximum_fee"]; ?> </td>
                                    <td> <?php echo $row["approval_status"]; ?> </td>
                                    <td></td>
                                    <td> <button> <a href="./PatientTestDelete.php?id=<?php echo $row["ticket_no"] ?>"> Cancel </a> </button> </td>
                                    </tr>
                                <?php } ?>
                            </table>
                        </div>
                    </div>
                </section>

            </main>
    </body>

<?php
        }
    } else {
        header("Location: /public/login/PatientLogin.php");
    }
?>

    </html>