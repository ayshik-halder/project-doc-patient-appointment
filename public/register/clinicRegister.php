<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" type="text/css" href="/assets/css/clinicRegister.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="Doctor Patient Appointment System" />
    <title>Clinic Registration</title>
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
                <p>Already a User?</p>
                <li><a class="nav-link" href="../login/PatientLogin.php"><u>Login</u></a></li>
            </ul>
        </nav>
    </header>
    
    <main>

        <?php

        require_once('../config.php');

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $clinic_name = test_input($_POST['clinic_name']);
            $address = test_input($_POST['address']);
            $city = test_input($_POST['city']);
            $pin_code = test_input($_POST['pin_code']);
            $contact_no = test_input($_POST['contact_no']);
            $email = test_input($_POST['email']);

            $query = "INSERT INTO clinic(clinic_name, address, city, pin_code, contact_no, email)
            VALUES('$clinic_name', '$address', '$city', '$pin_code', '$contact_no', '$email' )";

            if ($conn->query($query)) {
                header("location:../dashboard/adminDash.php");
            } else {
                echo "failed" . $conn->error;
            }
        }

        function test_input($data)
        {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        ?>
        <section id="registration">
            <h2>Clinic Registration Form</h2>
            <div class="grid">
                <form id="form" action="" method="POST">
                    <div class="column-100">
                        <div class="form-group">
                            <label id="clinic-name-label" for="clinic-name"><strong>Clinic Name</strong></label>
                            <input type="text" name="clinic_name" class="form-control" id="Clinic-name" placeholder="Clinic Name" value="<?php $clinic_name; ?>" required />
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
                    <li><a href="#">Privacy Policy</a></li>
                    <li><a href="#">Customer Support</a></li>
                    <li><a href="#contact">Contact</a></li>
                </ul>
                <div id="copyright">Copyright &#169; DocEasy 2022</div>
            </div>
        </footer>

    </main>
</body>