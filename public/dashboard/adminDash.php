<?php
include "../config.php";
session_start();
if ($_SESSION["loggedIn"]) {
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <link rel="stylesheet" type="text/css" href="/assets/css/adminDash.css" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin Dashboard</title>
    </head>

    <body>
        <?php
        $uname =  $_SESSION["uname"];
        $sql = "SELECT * FROM admin WHERE username='$uname'";

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
                        <li><a class="nav-link" href="/public/logout/adminLogout.php">Logout</a></li>
                    </ul>
                </nav>
            </header>


            <main>
            <section id="why">
                    <h2>Welcome <?php echo explode(' ', trim($row["full_name"]))[0]; ?></h2>
                    <div class="container">
                        <div class="card">
                            <div class="icon">
                                <a href="http://localhost/phpmyadmin/index.php?route=/database/structure&server=1&db=doceasy" target="blank">
                                    <img src="/assets/images/myData.png" alt="Profile icon" />
                                </a>
                            </div>
                            <div class="desc">
                                <h3>Access Master Data</h3>
                                <p>
                                    Click to view or update clinic details. 
                                    Keep clinic information updated with time.
                                </p>
                            </div>
                        </div>

                        <div class="card">
                            <div class="icon">
                                <a href="/public/register/clinicRegister.php">
                                    <img src="/assets/images/clinic.png" alt="Schedule icon" />
                                </a>
                            </div>
                            <div class="desc">
                                <h3>Clinic Register</h3>
                                <p>
                                    Register new Clinic at Doceasy
                                </p>
                            </div>
                        </div>
                        
                        <div class="card">
                            <div class="icon">
                                <a href="/public/register/managementRegister.php">
                                    <img src="/assets/images/management.png" alt="Diagnosis" />
                                </a>
                            </div>
                            <div class="desc">
                                <h3>Management Register</h3>
                                <p>
                                    Assign members to a clinic's management team.
                                </p>
                            </div>
                        </div>

                        <div class="card">
                            <div class="icon">
                                <a href="/public/feedback/adminFeedback.php">
                                    <img src="/assets/images/myFeedback.png" alt="contact icon" />
                                </a>
                            </div>
                            <div class="desc">
                                <h3>View Feedbacks</h3>
                                <p>
                                    View all the feedbacks and answer to customer's queries.
                                    
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
                            <?php include_once "../config.php"; ?>
                            <li><a href="/public/dashboard/ProfilePage/updateAppointmentStatus.php">Update Appointment Status</a></li>
                            <li><a href="/public/register/clinicRegister.php">Clinic Registration</a></li>
                            <li><a href="/public/register/managementRegister.php">Management Registration</a></li>
                        </ul>
                        <div id="copyright">Copyright &#169; DocEasy 2022</div>
                    </div>
                </footer>
            </main>
    </body>


<?php
        }
    } else {
        header("Location: ../login/adminLogin.php");
    }
?>

    </html>