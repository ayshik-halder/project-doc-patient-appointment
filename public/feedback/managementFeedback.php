<?php
include "../config.php";
session_start();
if ($_SESSION["loggedIn"]) {
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <link rel="stylesheet" type="text/css" href="/assets/css/userHistory.css" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>

    <body>
        <?php

        $clinic_name =  $_SESSION["clinic_name"];
        $full_name =  $_SESSION["full_name"];

        $sql = "SELECT * FROM clinic_feedback, clinic 
                WHERE clinic.id = clinic_feedback.clinic_id
                ORDER BY message_type, clinic_name, user_type, name";

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
                        <li><a class="nav-link" href="#"><?php echo $clinic_name  ?></a></li>
                        <li><a class="nav-link" href="#"><?php echo $full_name  ?></a></li>
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
                                    <th>DATE & TIME</th>
                                    <th>CLINIC NAME</th>
                                    <th>USER TYPE</th>
                                    <th>NAME</th>
                                    <th>EMAIL</th>
                                    <th>MESSAGE TYPE</th>
                                    <th>MESSAGE</th>
                                    <th>ATTACH FILE</th>
                                </tr>

                                <?php
                                while ($row = $result->fetch_assoc()) {
                                ?>
                                    <tr>
                                        <td> <?php echo $row["date_time"]; ?> </td>
                                        <td> <?php echo $row["clinic_name"]; ?> </td>
                                        <td> <?php echo $row["user_type"]; ?> </td>
                                        <td> <?php echo $row["name"]; ?> </td>
                                        <td> <?php echo $row["email"]; ?> </td>
                                        <td> <?php echo $row["message_type"]; ?> </td>
                                        <td> <?php echo $row["message"]; ?> </td>
                                        <td> <?php echo $row["attach_file"]; ?> </td>
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
            echo "No Record Found";
        }
    } else {
        header("Location: ../login/adminLogin.php");
    }
?>

    </html>