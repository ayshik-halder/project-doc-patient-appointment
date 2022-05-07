<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" type="text/css" href="/assets/css/PatientRegister.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="Doctor Patient Appointment System" />
    <title>Patient Registration</title>
</head>

<body>
    <header id="header">
        <div class="logo">
            <a href="/index.php">
                <img class="logo-img" id="header-img" src="../../assets/images/doceasy/doceasy-patient-logo.svg" alt="DocEasy logo" />
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

        require('../config.php');

        $full_name = $aadhar_no = $dob = $age = $gender = $marital_status = $phn_no = $email = $address = $city = $pin_code = $username = $password = $confirm_password = '';

        $nameErr = $aadharNoErr = $dobErr = $ageErr = $genderErr = $maritalStatusErr = $phnNoErr = $emailErr = $addressErr = $cityErr = $pinCodeErr = $usernameErr = $passwordErr = $confirmPasswordErr = '';

        $flag = true;

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $full_name = $_POST['full_name'];
            $aadhar_no = $_POST['aadhar_no'];
            $dob = $_POST['dob'];
            $age = $_POST['age'];
            $gender = $_POST['gender'];
            $marital_status = $_POST['marital_status'];
            $phn_no = $_POST['phn_no'];
            $email = $_POST['email'];
            $address = $_POST['address'];
            $city = $_POST['city'];
            $pin_code = $_POST['pin_code'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            $confirm_password = $_POST['confirm_password'];

            if (!$full_name) {
                $nameErr = "First name is required";
                $flag = false;
            } elseif (!preg_match("/^[a-zA-Z ]*$/", $full_name)) {
                $nameErr = "only letters and white spaces allowed";
                $flag = false;
            } else {
                test_input($full_name);
            }

            if (!$aadhar_no) {
                $aadharNoErr = "Aadhar Number is required";
                $flag = false;
            } elseif (strlen($aadhar_no) != 12) {
                $aadharNoErr = "Aadhar Number must be contain 12 digit";
                $flag = false;
            } else {
                test_input($aadhar_no);
            }

            $today_date = strtotime(date('Y-m-d'));
            $date_of_birth = strtotime($dob);

            if (!$dob) {
                $dobErr = "DOB is required";
                $flag = false;
            } elseif ($date_of_birth >= $today_date) {
                $dobErr = "Mention Proper Date of Birth";
                $flag = false;
            } else {
                test_input($dob);
            }

            if (!$age) {
                $ageErr = "Mention Your Age";
                $flag = false;
            } elseif (strlen($age) > 2) {
                $ageErr = "Age cannot contain more than 2 digit";
                $flag = false;
            } else {
                test_input($age);
            }

            if (!$gender) {
                $genderErr = "Specify your gender";
                $flag = false;
            } else {
                test_input($gender);
            }

            if (!$marital_status) {
                $maritalStatusErr = "Specify your marital Status";
                $flag = false;
            } else {
                test_input($marital_status);
            }

            if (!$phn_no) {
                $phnNoErr = "Phone Number is required";
                $flag = false;
            } elseif (strlen($phn_no) != 10) {
                $phnNoErr = "Phone Number must be contain 10 digit";
                $flag = false;
            } else {
                test_input($phn_no);
            }

            if (!$email) {
                $emailErr = "Email is required";
                $flag = false;
            } elseif (!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $email)) {
                $emailErr = "Email format is not valid";
                $flag = false;
            } else {
                test_input($email);
            }

            if (!$address) {
                $addressErr = "Address is required";
                $flag = false;
            } else {
                test_input($address);
            }

            if (!$city) {
                $cityErr = "City is required";
                $flag = false;
            } else {
                test_input($city);
            }

            if (!$pin_code) {
                $pinCodeErr = "Pin Code is required";
                $flag = false;
            } elseif (strlen($pin_code) != 6) {
                $pinCodeErr = "Pin Code must be contain 6 digit";
                $flag = false;
            } else {
                test_input($pin_code);
            }

            $sql_username = "SELECT * FROM patient WHERE username='$username'";
            $res_username = $conn->query($sql_username);
            $row = $res_username->fetch_assoc();

            if (!$username) {
                $usernameErr = "Username is required";
                $flag = false;
            } elseif (strlen($username) <= 3) {
                $usernameErr = "Username should be more than 3 characters";
            } elseif (strlen($username) > 11) {
                $usernameErr = "Username should be less than 11 characters";
            } elseif ($row != null) {
                $usernameErr = "Username is already taken";
                $flag = false;
            } else {
                test_input($username);
            }

            if (!$password) {
                $passwordErr = "Password is required";
                $flag = false;
            } elseif (!preg_match("/^[0-9]*$/", $password)) {
                $passwordErr = "Only numbers are allowed";
                $flag = false;
            } else {
                test_input($password);
            }

            if (!$confirm_password) {
                $confirmPasswordErr = "Confirm Password is required";
                $flag = false;
            } elseif ($password && $confirm_password && strcmp($password, $confirm_password) !== 0) {
                $confirmPasswordErr = "Please repeat the password correctly";
                $flag = false;
            } else {
                test_input($confirm_password);
            }
            // submit form if validated successfully
            if ($flag) {

                $query = "INSERT INTO patient(full_name, aadhar_no, dob, age, gender, marital_status, phn_no, email, address, city, pin_code, username, password)
                VALUES('$full_name', '$aadhar_no', '$dob', '$age', '$gender', '$marital_status', '$phn_no', '$email', '$address', '$city', '$pin_code', '$username', '$password' )";

                if ($conn->query($query)) {
                    header("location:../login/patientLogin.php");
                } else {
                    echo "failed" . $conn->error;
                }
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
            <h2>Patient Registration Form</h2>
            <div class="grid">
                <form id="form" action="" method="POST">

                    <div class="column-100">
                        <div class="form-group">
                            <label id="name-label" for="full-name"><strong>Full Name</strong></label>
                            <input type="text" name="full_name" class="form-control" id="full-name" placeholder="Full Name" value="<?php $full_name; ?>" />
                            <small class="error-label"><?php echo $nameErr ?></small>
                        </div>
                    </div>

                    <div class="column-100">
                        <div class="form-group">
                            <label id="aadhar-label" for="aadhar"><strong>Aadhar Card Number</strong></label>
                            <input type="number" name="aadhar_no" class="form-control" id="aadhar" placeholder="0000 0000 0000" value="<?php $aadhar_no; ?>" />
                            <small class="error-label"><?php echo $aadharNoErr ?></small>
                        </div>
                    </div>

                    <div class="column-50">
                        <div class="form-group">
                            <label id="dob-label" for="dob"><strong>DOB</strong></label>
                            <input type="date" name="dob" class="form-control" id="dob" value="<?php $dob; ?>" />
                            <small class="error-label"><?php echo $dobErr ?></small>
                        </div>
                    </div>

                    <div class="column-50">
                        <div class="form-group">
                            <label id="age-label" for="age"><strong>Age</strong></label>
                            <input type="number" name="age" class="form-control" id="age" placeholder="Age" value="<?php echo $age; ?>" />
                            <small class="error-label"><?php echo $ageErr ?></small>
                        </div>
                    </div>

                    <div class="column-100">
                        <div class="form-group">
                            <p><strong>Gender</strong></p>
                            <span id="gender-span">
                                <label id="span" for="male"><input type="radio" id="male" name="gender" value="male" value="<?php $gender; ?>" />&nbsp; Male</label>
                                <label id="span" for="female"><input type="radio" id="female" name="gender" value="female" value="<?php $gender; ?>" /> &nbsp; Female</label>
                                <label id="span" for="other"><input type="radio" id="other" name="gender" value="other" value="<?php $gender; ?>" /> &nbsp; Other</label>
                            </span>
                            <small class="error-label"><?php echo $genderErr ?></small>
                        </div>
                    </div>

                    <div class="column-100">
                        <div class="form-group">
                            <p><strong>Marital Status</strong></p>
                            <span id="marital-span">
                                <label id="span" for="married"><input type="radio" id="married" name="marital_status" value="married" value="<?php $marital_status; ?>" /> &nbsp; Married</label>
                                <label id="span" for="unmarried"><input type="radio" id="unmarried" name="marital_status" value="unmarried" checked value="<?php $marital_status; ?>" /> &nbsp; Unmarried</label>
                            </span>
                            <small class="error-label"><?php echo $maritalStatusErr ?></small>
                        </div>
                    </div>

                    <div class="column-50">
                        <div class="form-group">
                            <label id="phn-label" for="phn-no"><strong>Phone Number</strong></label>
                            <input type="tel" name="phn_no" class="form-control" id="phn-no" placeholder="Phone Number" value="<?php $phn_no; ?>" />
                            <small class="error-label"><?php echo $phnNoErr ?></small>
                        </div>
                    </div>

                    <div class="column-50">
                        <div class="form-group">
                            <label id="email-label" for="email"><strong>Email</strong></label>
                            <input type="email" name="email" class="form-control" id="email" placeholder="Email address" value="<?php $email; ?>" />
                            <small class="error-label"><?php echo $emailErr ?></small>
                        </div>
                    </div>

                    <div class="column-100">
                        <div class="form-group">
                            <p><strong>Address</strong></p>
                            <textarea id="address" class="input-address" name="address" placeholder="Enter your address here..." value="<?php $address; ?>"></textarea>
                            <small class="error-label"><?php echo $addressErr ?></small>
                        </div>
                    </div>

                    <div class="column-50">
                        <div class="form-group">
                            <label id="city-label" for="city"><strong>City</strong></label>
                            <input type="text" name="city" class="form-control" id="city" placeholder="City" value="<?php $city; ?>" />
                            <small class="error-label"><?php echo $cityErr ?></small>
                        </div>
                    </div>

                    <div class="column-50">
                        <div class="form-group">
                            <label id="pin-label" for="pin-code"><strong>Pin Code</strong></label>
                            <input type="number" name="pin_code" class="form-control" id="pin-code" placeholder="Pin-code" value="<?php $pin_code; ?>" />
                            <small class="error-label"><?php echo $pinCodeErr ?></small>
                        </div>
                    </div>

                    <div class="column-100">
                        <div class="form-group">
                            <label id="username-label" for="username"><strong>Username</strong></label>
                            <input type="text" name="username" class="form-control" id="username" placeholder="Username" value="<?php $username; ?>" />
                            <small class="error-label"><?php echo $usernameErr ?></small>
                        </div>
                    </div>

                    <div class="column-50">
                        <div class="form-group">
                            <label id="password-label" for="password"><strong>Password</strong></label>
                            <input type="password" name="password" class="form-control" id="password" placeholder="Password" value="<?php $password; ?>" />
                            <small class="error-label"><?php echo $passwordErr ?></small>
                        </div>
                    </div>

                    <div class="column-50">
                        <div class="form-group">
                            <label id="c-password-label" for="c-password"><strong>Confirm Password</strong></label>
                            <input type="password" name="confirm_password" class="form-control" id="c-password" placeholder="Re-enter the Password" value="<?php $confirm_password; ?>" />
                            <small class="error-label"><?php echo $confirmPasswordErr ?></small>
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
                            <a href="../../index.php">
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
                    <li><a href="/index.php#contact">Contact</a></li>
                </ul>
                <div id="copyright">Copyright &#169; DocEasy 2022</div>
            </div>
        </footer>

    </main>
</body>

</html>