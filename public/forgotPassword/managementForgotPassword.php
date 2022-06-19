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
                <img class="logo-img" id="header-img" src="/assets/images/doceasy/doceasy-logo.svg" alt="DocEasy logo" />
            </a>
        </div>

        <nav id="nav-bar">
            <ul>
                <p>Not yet a user?</p>
                <li><a class="nav-link" href="/index.php#contact"><u>Contact Admin</u></a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section id="registration">
            <div class="container">
                <div class="card">
                    <h2>Forgot Password Form</h2>
                    <div class="grid">
                        <form id="form" action="./managementForgotPassConn.php" method="POST">
                            <div class="form-group">
                            <label id="aadhar-label" for="aadhar"><strong>Aadhar Card Number</strong></label>
                            <input type="number" name="aadhar_no" class="form-control" id="aadhar" placeholder="0000 0000 0000" />
                            </div>

                            <div class="form-group">
                                <label id="phn-label" for="phn-no"><strong>Phone Number</strong></label>
                                <input type="tel" name="phn_no" class="form-control" id="phn-no" placeholder="Phone Number" />
                            </div>

                            <div class="form-group">
                                <label id="email-label" for="email"><strong>Email</strong></label>
                                <input type="email" name="Email" class="form-control" id="email" placeholder="Email address" />
                            </div>

                            <div class="form-group">
                                <div id="button-group">
                                    <label id="submit-label" for="submit"></label>
                                    <input id="submit" type="submit" value="Submit" class="btn" />
                                    <label id="back-label" for="back"></label>
                                    <a href="/public/login/ManagementLogin.php">
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