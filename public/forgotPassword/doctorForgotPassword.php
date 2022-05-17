<?php
require_once "../config.php"
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" type="text/css" href="/assets/css/userLogin.css" />

    <!-- Font Awsome  -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="Doctor Patient Appointment System" />
    <title></title>
</head>

<body>
    <header id="header">
        <div class="logo">
            <a href="/index.php">
                <img class="logo-img" id="header-img" src="/assets/images/doceasy/doceasy-doctor-logo.svg" alt="DocEasy logo" />
            </a>
        </div>

        <nav id="nav-bar">
            <ul>
                <p>Not yet a user?</p>
                <li><a class="nav-link" href="/public/register/DocRegister.php"><u> Register </u></a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section id="registration">
            <div class="container">
                <div class="card">
                    <h2>Forget Password Form</h2>
                    <div class="grid">
                        <form id="form" action="./doctorForgotPassConn.php" method="POST">
                            <div class="form-group">
                                <label id="username-label" for="username"><strong>Username</strong></label>
                                <input type="text" name="username" class="form-control" id="username" placeholder="Username" />
                            </div>

                            <div class="form-group">
                                <label id="dob-label" for="dob"><strong>DOB</strong></label>
                                <input type="date" name="dob" class="form-control" id="dob" />
                            </div>

                            <div class="form-group">
                                <label id="cname-label" for="clinic-name"><strong>Clinic Name</strong></label>
                                <select name="clinic_name" id="clinic-name" class="form-control">
                                    <option selected>Choose Clinic</option>
                                    <?php
                                    $query_clinic = "SELECT * FROM clinic";
                                    $result_clinic = $conn->query($query_clinic);
                                    while ($row = $result_clinic->fetch_array()) {
                                    ?>
                                        <option><?php echo $row['clinic_name']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label id="specialization-label" for="specialization"><strong>Specialization</strong></label>
                                <select name="specialization" id="specialization" class="form-control">
                                    <option selected>Choose your specialized Department</option>
                                    <?php
                                    $query_specialization = "SELECT DISTINCT specialization FROM doctor";
                                    $result_specialization = $conn->query($query_specialization);
                                    while ($row = $result_specialization->fetch_array()) {
                                    ?>
                                        <option><?php echo $row['specialization']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <div id="button-group">
                                    <label id="submit-label" for="submit"></label>
                                    <input id="submit" type="submit" value="Submit" class="btn" />
                                    <label id="back-label" for="back"></label>
                                    <a href="/public/login/DocLogin.php">
                                        <input id="back" type="back" value="back" class="btn" />
                                    </a>
                                </div>
                            </div>

                        </form>
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
                    
                    <li><a href="/index.php#contact" target="_blank">Contact</a></li>
                </ul>
                <div id="copyright">Copyright &#169; DocEasy 2022</div>
            </div>
        </footer>

    </main>
</body>