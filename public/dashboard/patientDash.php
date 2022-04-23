<?php
include "../config.php";
session_start();
if ($_SESSION["loggedIn"]) {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <link rel="stylesheet" type="text/css" href="/assets/css/patientDash.css" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Patient Dashboard</title>
    </head>

    <body>
        <?php
        $uname =  $_SESSION["uname"];
        $sql = "SELECT * FROM patient WHERE username='$uname'";

        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        if ($row) {
            $patient_id = $row["p_id"];
            $_SESSION["patient_id"] = $patient_id;
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
                        <li><a class="nav-link" href="./ProfilePage/updatePatientProfile.php">Update Profile</a></li>
                        <li><a class="nav-link" href="./historyPage/patientHistory.php">My Appointments</a></li>
                        <li><a class="nav-link" href="#">My Tests</a></li>
                        <li><a class="nav-link" href="../logout/patietLogout.php">Logout</a></li>
                    </ul>
                </nav>
            </header>


            <main>

                <section id="register">
                    <h2>Booking at DocEasy</h2>
                    <div class="container">
                        <!-- Patient Login  -->
                        <div class="card" id="patient">
                            <div class="product-logo">
                                <img class="logo-img" src="/assets/images/doceasy/doceasy-book-appointment.svg" alt="DocEasy logo" />
                            </div>
                            <div class="desc">
                                <h3>Features</h3>
                                <ol>
                                    <li>Choose from a variety of Departments</li>
                                    <li>Book at your preferred and nearest Clinic</li>
                                    <li>We offer a wide section of Doctors.</li>
                                </ol>
                            </div>
                            <a href="/public/booking/bookAppointment/chooseDept.php">
                                <button class="btn">Book Appointment</button>
                            </a>
                        </div>


                        <!-- Doctor Login  -->
                        <div class="card" id="doctor">
                            <div class="product-logo">
                                <img class="logo-img" src="/assets/images/doceasy/doceasy-book-tests.svg" alt="DocEasy for doctors logo" />
                            </div>
                            <div class="desc">
                                <h3>Features</h3>
                                <ol>
                                    <li>Book your lab diagnosis now!</li>
                                    <li>Verified from trusted lab physicians.</li>
                                    <li>Get doctor recommendations.</li>
                                </ol>
                            </div>
                            <a href="/public/booking/bookTest/chooseTest.php">
                                <button class="btn">Book Diagnosis</button>
                            </a>
                        </div>
                    </div>
                </section>

                <footer>
                    <div id="footer-logo">
                        <img class="logo-img" src="/assets/images/doceasy/doceasy-logo-white.svg" alt="Doceasy logo" />
                    </div>
                    <div id="footer-info">
                        <ul>
                            <li><a href="/public/feedback/clinic_feedback.php">Clinic Feedback</a></li>
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
        header("Location: ../login/patientLogin.php");
    }
?>

    </html>