<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" type="text/css" href="/assets/css/DocRegister.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="Doctor Patient Appointment System" />
    <title>Doctor Registration</title>
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
                <p>Already a User?</p>
                <li><a class="nav-link" href="/public/login/DocLogin.php"><u>Login</u></a></li>
            </ul>
        </nav>
    </header>

    <main>

        <?php

        require_once('../config.php');

        $first_name = $last_name = $dob = $age = $gender = $specialization = $experience = $phn_no = $email = $clinic_name = $clinic_address = $clinic_city = $clinic_pin = $username = $password = $confirm_password = '';

        $firstNameErr = $lastNameErr = $dobErr = $genderErr = $specializationErr = $experienceErr = $phnNoErr = $emailErr = $clinicNameErr = $usernameErr = $passwordErr = $confirmPasswordErr = '';

        $flag = true;

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $first_name = $_POST['first_name'];
            $last_name = $_POST['last_name'];
            $dob = $_POST['dob'];
            $age = $_POST['age'];
            $gender = $_POST['gender'];
            $specialization = $_POST['specialization'];
            $experience = $_POST['experience'];
            $phn_no = $_POST['phn_no'];
            $email = $_POST['email'];
            $clinic_name = $_POST['clinic_name'];
            $clinic_address = $_POST['clinic_address'];
            $clinic_city = $_POST['clinic_city'];
            $clinic_pin = $_POST['clinic_pin'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            $confirm_password = $_POST['confirm_password'];


            if (!$first_name) {
                $firstNameErr = "First name is required";
                $flag = false;
            } elseif (!preg_match("/^[a-zA-Z ]*$/", $first_name)) {
                $firstNameErr = "only letters and white spaces allowed";
                $flag = false;
            } else {
                test_input($first_name);
            }

            if (!$last_name) {
                $lastNameErr = "Last name is required";
                $flag = false;
            } elseif (!preg_match("/^[a-zA-Z ]*$/", $last_name)) {
                $lastNameErr = "only letters and white spaces allowed";
                $flag = false;
            } else {
                test_input($last_name);
            }

            if (!$dob) {
                $dobErr = "DOB is required";
                $flag = false;
            } else {
                test_input($dob);
            }

            if (!$gender) {
                $genderErr = "Specify your gender";
                $flag = false;
            } else {
                test_input($gender);
            }

            if ($specialization == "Choose your specialized Department") {
                $specializationErr = "Mention your specialization";
                $flag = false;
            } else {
                test_input($specialization);
            }

            if (!$experience) {
                $experienceErr = "Experience Year is required";
                $flag = false;
            } else {
                test_input($experience);
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

            if ($clinic_name == "Choose Clinic Name") {
                $clinicNameErr = "Specify your Clinic Name";
                $flag = false;
            } else {
                test_input($clinic_name);
            }


            $sql_username = "SELECT * FROM doctor WHERE username='$username'";
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

                $query = "INSERT INTO doctor(first_name, last_name, dob, age, gender, specialization, experience, phn_no, email, clinic_name, clinic_address, clinic_city, clinic_pin, username, password)
        VALUES('$first_name', '$last_name', '$dob', '$age', '$gender', '$specialization', '$experience', '$phn_no', '$email', '$clinic_name', '$clinic_address', '$clinic_city', '$clinic_pin', '$username', '$password' )";

                if ($conn->query($query)) {
                    header("location:../login/docLogin.php");
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
            <h2>Doctor Registration Form</h2>
            <div class="grid">
                <form id="form" action="" method="POST">

                    <div class="column-50">
                        <div class="form-group">
                            <label id="fname-label" for="first-name"><strong>First Name</strong></label>
                            <input type="text" name="first_name" class="form-control" id="first-name" placeholder="First Name" value="<?php echo $first_name; ?>" />
                            <small class="error-label"><?php echo $firstNameErr ?></small>
                        </div>
                    </div>

                    <div class="column-50">
                        <div class="form-group">
                            <label id="lname-label" for="last-name"><strong>Last Name</strong></label>
                            <input type="text" name="last_name" class="form-control" id="last-name" placeholder="Last Name" value="<?php echo $last_name; ?>" />
                            <small class="error-label"><?php echo $lastNameErr ?></small>
                        </div>
                    </div>

                    <div class="column-50">
                        <div class="form-group">
                            <label id="dob-label" for="dob"><strong>DOB</strong></label>
                            <input type="date" name="dob" class="form-control" id="dob" placeholder="date of Birth" value="<?php echo $dob; ?>" />
                            <small class="error-label"><?php echo $dobErr ?></small>
                        </div>
                    </div>

                    <div class="column-50">
                        <div class="form-group">
                            <label id="age-label" for="age"><strong>Age</strong></label>
                            <input type="number" name="age" class="form-control" id="age" placeholder="Age" value="<?php echo $age; ?>" />
                        </div>
                    </div>

                    <div class="column-100">
                        <div class="form-group">
                            <p><strong>Gender</strong></p>
                            <span id="gender-span">
                                <label id="span" for="male"><input type="radio" id="male" name="gender" value="male" value="<?php echo $gender; ?>" /> &nbsp; Male</label>
                                <label id="span" for="female"><input type="radio" id="female" name="gender" value="female" value="<?php echo $gender; ?>" /> &nbsp; Female</label>
                                <label id="span" for="other"><input type="radio" id="other" name="gender" value="other" value="<?php echo $gender; ?>" /> &nbsp; Other</label>
                            </span>
                            <small class="error-label"><?php echo $genderErr ?></small>
                        </div>
                    </div>

                    <div class="column-50">
                        <div class="form-group">
                            <label id="specialization-label" for="specialization"><strong>Specialization</strong></label>
                            <select name="specialization" id="specialization" class="form-control">
                                <option selected>Choose your specialized Department</option>
                                <?php
                                $specialization = array('Neurology', 'Dermatology', 'Gynaecology', 'Immunology', 'Ophthalmology', 'Anesthesiology', 'Psychiatry', 'Urology', 'Cardiology', 'Otolaryngology');
                                sort($specialization, SORT_STRING);

                                foreach ($specialization as $items) { ?>
                                    <option> <?php echo $items ?></option>
                                <?php } ?>
                            </select>
                            <small class="error-label"><?php echo $specializationErr ?></small>
                        </div>
                    </div>

                    <div class="column-50">
                        <div class="form-group">
                            <label id="experience-label" for="experience"><strong>Work Experience</strong></label>
                            <input type="number" name="experience" class="form-control" id="experience" placeholder="Number of Year" value="<?php echo $experience; ?>" />
                            <small class="error-label"><?php echo $experienceErr ?></small>
                        </div>
                    </div>

                    <div class="column-50">
                        <div class="form-group">
                            <label id="phn-label" for="phn-no"><strong>Phone Number</strong></label>
                            <input type="tel" name="phn_no" class="form-control" id="phn-no" placeholder="Phone Number" value="<?php echo $phn_no; ?>" />
                            <small class="error-label"><?php echo $phnNoErr ?></small>
                        </div>
                    </div>

                    <div class="column-50">
                        <div class="form-group">
                            <label id="email-label" for="email"><strong>Email</strong></label>
                            <input type="email" name="email" class="form-control" id="email" placeholder="Email address" value="<?php echo $email; ?>" />
                            <small class="error-label"><?php echo $emailErr ?></small>
                        </div>
                    </div>

                    <div class="column-100">
                        <div class="form-group">
                            <label id="cname-label" for="clinic-name"><strong>Clinic Name</strong></label>
                            <select name="clinic_name" id="clinic-name" , class="form-control">
                                <option selected>Choose Clinic Name</option>

                                <?php
                                $query_clinic = "SELECT * FROM clinic";
                                $result_clinic = $conn->query($query_clinic);
                                while ($row = $result_clinic->fetch_array()) {
                                ?>
                                    <option><?php echo $row['clinic_name'] ?></option>
                                <?php } ?>
                            </select>
                            <small class="error-label"><?php echo $clinicNameErr ?></small>
                        </div>
                    </div>

                    <div class="column-100">
                        <div class="form-group">
                            <label id="address-label" for="address"><strong>Clinic Address</strong></label>
                            <input type="text" name="clinic_address" class="form-control" id="address" placeholder="Clinic Address" value="<?php echo $clinic_address; ?>" />
                        </div>
                    </div>

                    <div class="column-50">
                        <div class="form-group">
                            <label id="city-label" for="city"><strong>City</strong></label>
                            <input type="text" name="clinic_city" class="form-control" id="city" placeholder="City" value="<?php echo $clinic_city; ?>" />
                        </div>
                    </div>

                    <div class="column-50">
                        <div class="form-group">
                            <label id="pin-label" for="pin-code"><strong>Pin Code</strong></label>
                            <input type="number" name="clinic_pin" class="form-control" id="pin-code" placeholder="Pin-code" value="<?php echo $clinic_pin; ?>" />
                        </div>
                    </div>

                    <div class="column-100">
                        <div class="form-group">
                            <label id="username-label" for="username"><strong>Username</strong></label>
                            <input type="text" name="username" class="form-control" id="username" placeholder="Username" value="<?php echo $username; ?>" />
                            <small class="error-label"><?php echo $usernameErr ?></small>
                        </div>
                    </div>

                    <div class="column-50">
                        <div class="form-group">
                            <label id="password-label" for="password"><strong>Password</strong></label>
                            <input type="password" name="password" class="form-control" id="password" placeholder="Password" value="<?php echo $password; ?>" />
                            <small class="error-label"><?php echo $passwordErr ?></small>
                        </div>
                    </div>

                    <div class="column-50">
                        <div class="form-group">
                            <label id="c-password-label" for="c-password"><strong>Confirm Password</strong></label>
                            <input type="password" name="confirm_password" class="form-control" id="c-password" placeholder="Re-enter the Password" value="<?php echo $confirm_password; ?>" />
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
                <img class="logo-img" src="../../assets/images/doceasy/doceasy-logo-white.svg" alt="Doceasy logo" />
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