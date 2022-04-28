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

        $sql = "SELECT *, doctor.full_name AS doctor_name, book_appointment.id AS booking_id, patient.full_name AS patient_name 
                FROM patient, book_appointment, doctor, clinic, management 
                WHERE patient.p_id = book_appointment.patient_id AND doctor.d_id = book_appointment.doctor_id AND clinic.id = book_appointment.clinic_id AND clinic.id = management.clinic_id AND management.username='$uname'
                ORDER BY date DESC, doctor_name";

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
                                    <th>TIME</th>
                                    <th>DOCTOR NAME</th>
                                    <th>PATIENT NAME</th>
                                    <th>PROBLEM</th>
                                    <th>STATUS</th>
                                    <th>DOCTOR MESSAGE</th>
                                    <th>YOUR MESSAGE</th>
                                    <th>ACTION</th>
                                </tr>

                                <?php
                                while ($row = $result->fetch_assoc()) {
                                ?>
                                    <tr>
                                        <td> <?php echo $row["date"]; ?> </td>
                                        <td> <?php echo $row["start_time"] . "-" . $row["end_time"]; ?> </td>
                                        <td> <?php echo $row["doctor_name"]; ?> </td>
                                        <td> <?php echo $row["patient_name"]; ?> </td>
                                        <td> <?php echo $row["problem"]; ?> </td>
                                        <td> <?php echo $row["approval_status"]; ?> </td>
                                        <td> <?php echo $row["doctor_message"]; ?> </td>
                                        <td> <?php echo $row["patient_message"]; ?> </td>
                                        <td> <button> <a href="./managementAppointmentDelete.php?id=<?php echo $row['booking_id'] ?>" onclick='return checkDelete()'> Cancel </a> </button> </td>
                                    </tr>
                                <?php } ?>

                                <script>
                                    function checkDelete() {
                                        return confirm('Are you sure you want to cancel the Appointment');
                                    }
                                </script>

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