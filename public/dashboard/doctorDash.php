<?php
include "../config.php";
session_start();
if ($_SESSION["loggedIn"]) {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <link rel="stylesheet" type="text/css" href="/assets/css/DoctorDash.css" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Doctor Dashboard</title>
    </head>

    <body>
        <?php
        $uname =  $_SESSION["uname"];
        $sql = "SELECT * FROM doctor,clinic WHERE doctor.clinic_id = clinic.id AND username='$uname'";

        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        if ($row) {
            $doctor_id = $row["d_id"];
            $_SESSION["doctor_id"] = $doctor_id;

            if ($row["start_time"] == '' || $row["end_time"] == '' || $row["fee"] == '' || $row["degree"] == '' || $row["degree_proof"] == '') {
                echo '<script> alert("Complete Your Profile") </script>';
            }

        ?>
            <header id="header">
                <div class="logo">
                    <a href="/index.php">
                        <img class="logo-img" id="header-img" src="/assets/images/doceasy/doceasy-doctor-logo.svg" alt="DocEasy logo" />
                    </a>
                </div>

                <nav id="nav-bar">
                    <ul>
                        <li><a class="nav-link" href="#"><?php echo $row["full_name"];  ?></a></li>
                        <li><a class="nav-link" href="#"><?php echo $row["clinic_name"];  ?></a></li>
                        <li><a class="nav-link" href="#"><?php echo $row["specialization"];  ?></a></li>
                        <li><a class="nav-link" href="../logout/docLogout.php">Logout</a></li>
                    </ul>
                </nav>
            </header>


            <main>
                <section id="why">
                    <h2>Welcome <?php echo explode(' ', trim($row["full_name"]))[0]; ?></h2>
                    <div class="container">
                        <div class="card">
                            <div class="icon">
                                <a href="/public/dashboard/ProfilePage/updateDoctorProfile.php">
                                    <img src="/assets/images/myProfile.png" alt="Profile icon" />
                                </a>
                            </div>
                            <div class="desc">
                                <h3>My Profile</h3>
                                <p>
                                    Fill your details so that patients can book appointments.
                                    View and update your personal profile here.
                                </p>
                            </div>
                        </div>

                        <div class="card">
                            <div class="icon">
                                <a href="/public/historyPage/doctorAppointmentHistory.php">
                                    <img src="/assets/images/mySchedule.png" alt="Schedule icon" />
                                </a>
                            </div>
                            <div class="desc">
                                <h3>My Appointments</h3>
                                <p>
                                    Manage and view your appointment history here. Appointments once
                                    confirmed can only be deleted as per your discretion.
                                </p>
                            </div>
                        </div>

                        <div class="card">
                            <div class="icon">
                                <a href="/public/feedback/clinicFeedback.php">
                                    <img src="/assets/images/myFeedback.png" alt="contact icon" />
                                </a>
                            </div>
                            <div class="desc">
                                <h3>Contact Clinic</h3>
                                <p>
                                    Talk to your assigned management. Address any queries or clarification
                                    that needs to be resolved.
                                </p>
                            </div>
                        </div>
                    </div>
                </section>

                <footer>
                    <div id="footer-logo">
                        <img class="logo-img" src="/assets/images/doceasy/doceasy-logo-white.svg" alt="Doceasy logo" />
                    </div>
                    <div id="footer-info">
                        <ul>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">Customer Support</a></li>
                            <li><a href="/index.php#contact">Contact</a></li>
                        </ul>
                        <div id="copyright">Copyright &#169; DocEasy 2022</div>
                    </div>
                </footer>

            </main>

    </body>


<?php
        }
    } else {
        header("Location: ../login/DocLogin.php");
    }
?>

    </html>