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

        $sql = "SELECT *, doctor.full_name AS doctor_name 
                FROM doctor, clinic, management 
                WHERE clinic.id = management.clinic_id AND clinic.id = doctor.clinic_id AND management.username='$uname'
                ORDER BY doctor.full_name";


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
                                    <th>DOCTOR NAME</th>
                                    <th>MCI No</th>
                                    <th>SPECIALIZATION</th>
                                    <th>DEGREE</th>
                                    <th>DEGREE PROOF</th>
                                    <th>EXPERIENCE</th>
                                    <th>TIMING</th>
                                    <th>FEE</th>
                                    <th>EMAIL</th>
                                    <th>PHONE NO</th>
                                </tr>

                                <?php

                                while ($row = $result->fetch_assoc()) {
                                ?>
                                    <tr>
                                        <td> <?php echo $row["doctor_name"]; ?> </td>
                                        <td> <?php echo $row["mci_no"]; ?> </td>
                                        <td> <?php echo $row["specialization"]; ?> </td>
                                        <td> <?php echo $row["degree"]; ?> </td>
                                        <td> <?php echo $row["degree_proof"]; ?> </td>
                                        <td> <?php echo $row["experience"] . " Year"; ?> </td>
                                        <td> <?php echo $row["start_time"] . "-" . $row["end_time"]; ?> </td>
                                        <td> <?php echo $row["fee"]; ?> </td>
                                        <td> <?php echo $row["email"]; ?> </td>
                                        <td> <?php echo $row["phn_no"]; ?> </td>
                                    </tr>

                                <?php }
                                ?>

                            </table>
                        </div>
                    </div>
                </section>


            </main>
    </body>

<?php
        } else {
            echo "No record found";
        }
    } else {
        header("Location: /public/login/ManagementLogin.php");
    }
?>

    </html>