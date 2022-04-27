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

        $sql = "SELECT *, patient.full_name AS p_name, patient.email AS p_email, patient.phn_no AS p_contact 
                FROM test, clinic, management, patient, book_test 
                WHERE clinic.id = book_test.clinic_id AND test.t_id = book_test.test_id AND patient.p_id = book_test.patient_id AND clinic.id = management.clinic_id AND management.username='$uname'
                ORDER BY date, test_type, p_name";


        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        if ($row) {
        ?>
            <header id="header">
                <div class="logo">
                    <a href="/index.php">
                        <img class="logo-img" id="header-img" src="/assets/images/doceasy/doceasy-logo.svg" alt="DocEasy logo" />
                    </a>
                </div>

                <nav id="nav-bar">
                    <ul>
                        <li><a class="nav-link" href="#"><?php echo $row["full_name"];  ?></a></li>
                        <li><a class="nav-link" href="/public/dashboard/managementDash.php">Exit</a></li>
                        <li><a class="nav-link" href="/public/logout/managementLogout.php">Logout</a></li>
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
                                    <th>TEST</th>
                                    <th>PATIENT NAME</th>
                                    <th>PATIENT CONTACT INFO</th>
                                    <th>PATIENT EMAIL</th>
                                    <th>TIMING</th>
                                    <th>FEE</th>
                                    <th>TEST REPORTS</th>
                                </tr>

                                <?php
                                while ($row = $result->fetch_assoc()) {
                                ?>
                                    <tr>
                                        <td> <?php echo $row["date"]; ?> </td>
                                        <td> <?php echo $row["test_type"]; ?> </td>
                                        <td> <?php echo $row["p_name"]; ?> </td>
                                        <td> <?php echo $row["p_contact"]; ?> </td>
                                        <td> <?php echo $row["p_email"]; ?> </td>
                                        <td> <?php echo $row["start_time"] . "-" . $row["end_time"]; ?> </td>
                                        <td> <?php echo $row["minimum_fee"] . "-" . $row["maximum_fee"]; ?> </td>
                                        <td></td>
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
        header("Location: /public/login/ManagementLogin.php");
    }
?>

    </html>