<?php
include "../config.php";
session_start();
if ($_SESSION["loggedIn"]) {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <link rel="stylesheet" type="text/css" href="/assets/css/managementDashboard.css" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Management Dashboard</title>
    </head>

    <body>
        <?php
        $uname =  $_SESSION["uname"];
        $sql = "SELECT * FROM management,clinic WHERE clinic.id = management.clinic_id AND username='$uname'";

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
                        <li><a class="nav-link" href="#"><?php echo $row["clinic_name"];  ?></a></li>
                        <li><a class="nav-link" href="#"><?php echo $row["full_name"];  ?></a></li>
                        <li><a class="nav-link" href="/public/historyPage/clinicAvailableDoctor.php">Available Doctor</a></li>
                        <li><a class="nav-link" href="/public/historyPage/ClinicAvailableTest.php">Available Test facility</a></li>
                        <li><a class="nav-link" href="/public/historyPage/managementTestHistory.php">Test History</a></li>
                        <li><a class="nav-link" href="../logout/managementLogout.php">Logout</a></li>
                        
                    </ul>
                </nav>
            </header>

            <main>
            <section id="why">
                    <h2>Welcome <?php echo explode(' ', trim($row["full_name"]))[0]; ?></h2>
                    <div class="container">
                        <div class="card">
                            <div class="icon">
                                <a href="/public/dashboard/ProfilePage/updateClinicProfile.php">
                                    <img src="/assets/images/myProfile.png" alt="Profile icon" />
                                </a>
                            </div>
                            <div class="desc">
                                <h3><?php echo $row["clinic_name"];  ?></h3>
                                <p>
                                    Click to view or update clinic details. 
                                    Keep clinic information updated with time.
                                </p>
                            </div>
                        </div>

                        <div class="card">
                            <div class="icon">
                                <a href="/public/historyPage/managementAppointmentHistory.php">
                                    <img src="/assets/images/mySchedule.png" alt="History" />
                                </a>
                            </div>
                            <div class="desc">
                                <h3>Clinic Appointments</h3>
                                <p>
                                    Manage and view your appointment and diagnosis history here. Appointments once
                                    confirmed can only be deleted as per your discretion.
                                </p>
                            </div>
                        </div>
                        
                        <div class="card">
                            <div class="icon">
                                <a href="/public/register/testRegister.php">
                                    <img src="/assets/images/myTests.png" alt="Diagnosis" />
                                </a>
                            </div>
                            <div class="desc">
                                <h3>Lab Test Register</h3>
                                <p>
                                    Register new lab tests and diagnosis facilities at your clinic.
                                    Patient's can avail these new tests as soon as it is verified.
                                </p>
                            </div>
                        </div>

                        <div class="card">
                            <div class="icon">
                                <a href="#">
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
                            <li><a href="/public/register/testRegister.php">Diagnosis Register</a></li>
                            <li><a href="/index.php#contact">Contact Admin</a></li>
                        </ul>
                        <div id="copyright">Copyright &#169; DocEasy 2022</div>
                    </div>
                </footer>
            </main>
    </body>


<?php
        }
    } else {
        header("Location: ../login/ManagementLogin.php");
    }
?>

    </html>