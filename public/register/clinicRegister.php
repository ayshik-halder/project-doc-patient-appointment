<?php
include "../config.php";
session_start();
if ($_SESSION["loggedIn"]) {
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <link rel="stylesheet" type="text/css" href="/assets/css/clinicRegister.css" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="description" content="Doctor Patient Appointment System" />
        <title>Clinic Registration</title>
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
                        <li><a class="nav-link" href="/public/dashboard/adminDash.php">Exit</a></li>
                        <li><a class="nav-link" href="/public/logout/adminLogout.php">Logout</a></li>
                    </ul>
                </nav>
            </header>

            <main>

                <?php

                $clinic_name = $licence_no = $address = $city = $pin_code = $contact_no = $email = $clinic_upi_id = '';

                if ($_SERVER["REQUEST_METHOD"] == "POST") {

                    $clinic_name = $_POST['clinic_name'];
                    $licence_no = $_POST['licence_no'];
                    $address = $_POST['address'];
                    $city = $_POST['city'];
                    $pin_code = $_POST['pin_code'];
                    $contact_no = $_POST['contact_no'];
                    $email = $_POST['email'];
                    $clinic_upi_id = $_POST['clinic_upi_id'];

                    $query = "INSERT INTO clinic(clinic_name, licence_no, address, city, pin_code, contact_no, email, clinic_upi_id)
                    VALUES('$clinic_name', '$licence_no', '$address', '$city', '$pin_code', '$contact_no', '$email', '$clinic_upi_id' )";

                    if ($conn->query($query)) {
                        header("location:../dashboard/adminDash.php");
                    } else {
                        echo "failed" . $conn->error;
                    }
                }

                ?>
                <section id="registration">
                    <h2>Clinic Registration Form</h2>
                    <div class="grid">
                        <form id="form" action="" method="POST">
                            <div class="column-50">
                                <div class="form-group">
                                    <label id="clinic-name-label" for="clinic-name"><strong>Clinic Name</strong></label>
                                    <input type="text" name="clinic_name" class="form-control" id="Clinic-name" placeholder="Clinic Name" value="<?php $clinic_name; ?>" required />
                                </div>
                            </div>

                            <div class="column-50">
                                <div class="form-group">
                                    <label id="licence-no-label" for="licence-no"><strong>Clinic Licence Number</strong></label>
                                    <input type="number" name="licence_no" class="form-control" id="licence-no" placeholder="Clinic Licence Number" value="<?php $licence_no; ?>" required />
                                </div>
                            </div>

                            <div class="column-100">
                                <div class="form-group">
                                    <p><strong>Clinic Address</strong></p>
                                    <textarea id="address" class="input-address" name="address" placeholder="Enter Clinic address here..." value="<?php $address; ?>" required></textarea>
                                </div>
                            </div>

                            <div class="column-50">
                                <div class="form-group">
                                    <label id="city-label" for="city"><strong>City</strong></label>
                                    <input type="text" name="city" class="form-control" id="city" placeholder="City" value="<?php $city; ?>" required />
                                </div>
                            </div>

                            <div class="column-50">
                                <div class="form-group">
                                    <label id="pin-label" for="pin-code"><strong>Pin Code</strong></label>
                                    <input type="number" name="pin_code" class="form-control" id="pin-code" placeholder="Pin-code" value="<?php $pin_code; ?>" required />
                                </div>
                            </div>

                            <div class="column-50">
                                <div class="form-group">
                                    <label id="phn-label" for="phn-no"><strong>Contact Number</strong></label>
                                    <input type="tel" name="contact_no" class="form-control" id="phn-no" placeholder="Phone Number" value="<?php $contact_no; ?>" required />
                                </div>
                            </div>

                            <div class="column-50">
                                <div class="form-group">
                                    <label id="email-label" for="email"><strong>Email</strong></label>
                                    <input type="email" name="email" class="form-control" id="email" placeholder="Email address" value="<?php $email; ?>" required />
                                </div>
                            </div>

                            <div class="column-100">
                                <div class="form-group">
                                    <label id="upi-label" for="upi-id"><strong>Clinic UPI ID</strong></label>
                                    <input type="text" name="clinic_upi_id" class="form-control" id="upi" placeholder="UPI ID" value="<?php $clinic_upi_id; ?>" required />
                                </div>
                            </div>

                            <div class="column-50">
                                <div class="form-group">
                                    <label id="submit-label" for="submit"></label>
                                    <input id="submit" type="submit" value="Submit" class="btn" />
                                </div>
                            </div>

                            <div class="column-50">
                                <div class="form-group">
                                    <a href="/public/dashboard/adminDash.php">
                                        <label id="back-label" for="back"></label>
                                        <input id="back" type="button" value="back" class="btn" />
                                    </a>
                                </div>
                            </div>

                        </form>
                    </div>
                </section>

                <footer>
                    <div id="footer-logo">
                        <img class="logo-img" src="/assets/images/doceasy/doceasy-logo-white.svg" alt="Doceasy logo" />
                    </div>
                    <div id="footer-info">
                        <ul>
                            <li><a href="http://localhost/phpmyadmin">PhpMyAdmin</a></li>
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