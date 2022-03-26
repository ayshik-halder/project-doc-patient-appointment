<?php
require_once "../config.php";
session_start();
if ($_SESSION["loggedIn"]) {
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <link rel="stylesheet" type="text/css" href="/assets/css/managementRegister.css" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="description" content="Doctor Patient Appointment System" />
        <title>Management Registration</title>
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
                        <li><a class="nav-link" href="../logout/adminLogout.php">Logout</a></li>
                    </ul>
                </nav>
            </header>

            <main>

                <?php

                $first_name = $last_name = $phn_no = $email = $clinic_name = $username = $password = $confirm_password = '';

                $firstNameErr = $lastNameErr = $phnNoErr = $emailErr = $clinicNameErr = $usernameErr = $passwordErr = $confirmPasswordErr = '';

                $flag = true;

                function test_input($data)
                {
                    $data = trim($data);
                    $data = stripslashes($data);
                    $data = htmlspecialchars($data);
                    return $data;
                }

                if ($_SERVER["REQUEST_METHOD"] == "POST") {

                    $first_name = $_POST['first_name'];
                    $last_name = $_POST['last_name'];
                    $phn_no = $_POST['phn_no'];
                    $email = $_POST['email'];
                    $clinic_name = $_POST['clinic_name'];
                    $username = $_POST['username'];
                    $password = $_POST['password'];
                    $confirm_password = $_POST['confirm_password'];


                    if (!$first_name) {
                        $firstNameErr = "First name is required";
                        $flag = false;
                    } else {
                        test_input($first_name);
                    }

                    if (!$last_name) {
                        $lastNameErr = "Last name is required";
                        $flag = false;
                    } else {
                        test_input($last_name);
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
                    } else {
                        test_input($email);
                    }

                    if ($clinic_name == "Choose Clinic Name") {
                        $clinicNameErr = "Specify your Clinic Name";
                        $flag = false;
                    } else {
                        test_input($clinic_name);
                    }
                    
                    $sql_username = "SELECT * FROM management WHERE username='$username'";
                    $res_username = $conn->query($sql_username);
                    $row = $res_username->fetch_assoc();

                    if (!$username) {
                        $usernameErr = "Username is required";
                        $flag = false;
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

                    if ($flag) {

                        $query = "INSERT INTO management(first_name, last_name, phn_no, email, clinic_name, username, password)
                VALUES('$first_name', '$last_name', '$phn_no', '$email', '$clinic_name', '$username', '$password' )";

                        if ($conn->query($query)) {
                            header("location:../dashboard/adminDash.php");
                        } else {
                            echo "failed" . $conn->error;
                        }
                    }
                }



                ?>

                <section id="registration">
                    <h2>Management Registration Form</h2>
                    <div class="grid">
                        <form id="form" action="" method="POST">
                            <div class="column-50">
                                <div class="form-group">
                                    <label id="fname-label" for="first-name"><strong>First Name</strong></label>
                                    <input type="text" name="first_name" class="form-control" id="first-name" placeholder="First Name" value="<?php $first_name; ?>" />
                                    <small class="error-label"><?php echo $firstNameErr ?></small>
                                </div>
                            </div>

                            <div class="column-50">
                                <div class="form-group">
                                    <label id="lname-label" for="last-name"><strong>Last Name</strong></label>
                                    <input type="text" name="last_name" class="form-control" id="last-name" placeholder="Last Name" value="<?php $last_name; ?>" />
                                    <small class="error-label"><?php echo $lastNameErr ?></small>
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
                            <?php include_once "../config.php"; ?>
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