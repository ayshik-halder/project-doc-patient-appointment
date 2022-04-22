<?php
include "../../config.php";
session_start();
if ($_SESSION["loggedIn"]) {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <link rel="stylesheet" type="text/css" href="/assets/css/DocRegister.css" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>

    <body>
        <?php
        $uname =  $_SESSION["uname"];
        $sql = "SELECT * FROM doctor WHERE username='$uname'";

        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        if ($row) {
        ?>
            <header id="header">
                <div class="logo">
                    <a href="../doctorDash.php">
                        <img class="logo-img" id="header-img" src="/assets/images/doceasy/doceasy-doctor-logo.svg" alt="DocEasy logo" />
                    </a>
                </div>

                <nav id="nav-bar">
                    <ul>
                        <li><a class="nav-link" href="./changePassword/DoctorPasswordUpdate.php">Change Password</a></li>
                        <li><a class="nav-link" href="/public/logout/docLogout.php">Logout</a></li>
                    </ul>
                </nav>
            </header>
            <main>

                <?php
                $doctor_id = $row["d_id"];
                $nameErr = $dobErr = $ageErr = $specializationErr = $experienceErr = $phnNoErr = $emailErr = $feeErr =  '';
                $flag = true;

                if (isset($_POST["update"])) {

                    $full_name = $_POST['full_name'];
                    $dob = $_POST['dob'];
                    $age = $_POST['age'];
                    $degree = $_POST['degree'];
                    $degree_proof = $_POST['degree_proof'];
                    $experience = $_POST['experience'];
                    $phn_no = $_POST['phn_no'];
                    $email = $_POST['email'];
                    $start_time = $_POST['start_time'];
                    $end_time = $_POST['end_time'];
                    $fee = $_POST['fee'];


                    if (!preg_match("/^[a-zA-Z ]*$/", $full_name)) {
                        $nameErr = "only letters and white spaces allowed";
                        $flag = false;
                    }


                    $today_date = strtotime(date('Y-m-d'));
                    $date_of_birth = strtotime($dob);

                    if ($date_of_birth >= $today_date) {
                        $dobErr = "Mention Proper Date of Birth";
                        $flag = false;
                    }

                    if (strlen($age) > 2) {
                        $ageErr = "Age cannot contain more than 2 digit";
                        $flag = false;
                    }

                    if (strlen($phn_no) != 10) {
                        $phnNoErr = "Phone Number must be contain 10 digit";
                        $flag = false;
                    }

                    if (!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $email)) {
                        $emailErr = "Email format is not valid";
                        $flag = false;
                    }

                    if (strlen($fee) > 4) {
                        $feeErr = "Fee cannot contain more than 4 digit";
                        $flag = false;
                    }

                    if ($flag) {
                        $query1 = "UPDATE doctor SET full_name = '$full_name', dob = '$dob', age = '$age', degree = '$degree', degree_proof = '$degree_proof', experience = '$experience', phn_no = '$phn_no', email = '$email', start_time = '$start_time', end_time = '$end_time', fee = '$fee' WHERE d_id = '$doctor_id'";

                        if ($conn->query($query1)) {
                            header("location:../doctorDash.php");
                        } else {
                            echo "failed" . $conn->error;
                        }
                    }
                }
                ?>

                <section id="registration">
                    <h2>Doctor Details</h2>
                    <div class="grid">
                        <form id="form" action="" method="POST">

                            <div class="column-100">
                                <div class="form-group">
                                    <label id="name-label" for="full-name"><strong>Full Name</strong></label>
                                    <input type="text" name="full_name" class="form-control" id="full-name" placeholder="Full Name" value="<?php echo $row["full_name"] ?>" />
                                    <small class="error-label"><?php echo $nameErr ?></small>
                                </div>
                            </div>

                            <div class="column-50">
                                <div class="form-group">
                                    <label id="dob-label" for="dob"><strong>DOB</strong></label>
                                    <input type="date" name="dob" class="form-control" id="dob" value="<?php echo $row["dob"] ?>" />
                                    <small class="error-label"><?php echo $dobErr ?></small>
                                </div>
                            </div>

                            <div class="column-50">
                                <div class="form-group">
                                    <label id="age-label" for="age"><strong>Age</strong></label>
                                    <input type="number" name="age" class="form-control" id="age" placeholder="Age" value="<?php echo $row["age"] ?>" />
                                    <small class="error-label"><?php echo $ageErr ?></small>
                                </div>
                            </div>

                            <div class="column-50">
                                <div class="form-group">
                                    <label id="degree-label" for="degree"><strong>Degree</strong></label>
                                    <input type="text" name="degree" class="form-control" id="degree" placeholder="Last Completed Degree" value="<?php echo $row["degree"] ?>" />
                                </div>
                            </div>

                            <div class="column-50">
                                <div class="form-group">
                                    <label id="degree-proof-label" for="degree-proof"><strong>Degree Proof</strong></label>
                                    <input type="file" name="degree_proof" class="form-control" id="degree-proof" placeholder="Degree Certificate" value="<?php echo $row["degree_proof"] ?>" />
                                </div>
                            </div>

                            <div class="column-50">
                                <div class="form-group">
                                    <label id="specialization-label" for="specialization"><strong>Specialization</strong></label>
                                    <input type="text" name="specialization" class="form-control" id="specialization" placeholder="Number of Year" value="<?php echo $row["specialization"] ?>" />
                                </div>
                            </div>

                            <div class="column-50">
                                <div class="form-group">
                                    <label id="experience-label" for="experience"><strong>Work Experience</strong></label>
                                    <input type="number" name="experience" class="form-control" id="experience" placeholder="Number of Year" value="<?php echo $row["experience"] ?>" />
                                    <small class="error-label"><?php echo $experienceErr ?></small>
                                </div>
                            </div>

                            <div class="column-50">
                                <div class="form-group">
                                    <label id="phn-label" for="phn-no"><strong>Phone Number</strong></label>
                                    <input type="tel" name="phn_no" class="form-control" id="phn-no" placeholder="Phone Number" value="<?php echo $row["phn_no"] ?>" />
                                    <small class="error-label"><?php echo $phnNoErr ?></small>
                                </div>
                            </div>

                            <div class="column-50">
                                <div class="form-group">
                                    <label id="email-label" for="email"><strong>Email</strong></label>
                                    <input type="email" name="email" class="form-control" id="email" placeholder="Email address" value="<?php echo $row["email"] ?>" />
                                    <small class="error-label"><?php echo $emailErr ?></small>
                                </div>
                            </div>

                            <div class="column-50">
                                <div class="form-group">
                                    <label id="start-time-label" for="start-time"><strong>Start Time</strong></label>
                                    <input type="time" name="start_time" class="form-control" id="start-time" value="<?php echo $row["start_time"] ?>" />
                                </div>
                            </div>

                            <div class="column-50">
                                <div class="form-group">
                                    <label id="end-time-label" for="end-time"><strong>End Time</strong></label>
                                    <input type="time" name="end_time" class="form-control" id="end-time" value="<?php echo $row["end_time"] ?>" />
                                </div>
                            </div>

                            <div class="column-100">
                                <div class="form-group">
                                    <label id="fee-label" for="fee"><strong>Fee</strong></label>
                                    <input type="number" name="fee" class="form-control" id="fee" placeholder="Fees" value="<?php echo $row["fee"] ?>" />
                                    <small class="error-label"><?php echo $feeErr ?></small>
                                </div>
                            </div>

                            <div class="column-50">
                                <div class="form-group">
                                    <label id="submit-label" for="submit"></label>
                                    <input id="submit" type="submit" name="update" value="Update" class="btn" />
                                </div>
                            </div>

                            <div class="column-50">
                                <div class="form-group">
                                    <a href="../doctorDash.php">
                                        <label id="back-label" for="back"></label>
                                        <input id="back" type="button" value="back" class="btn" />
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </section>

            </main>
    </body>


<?php
        }
    } else {
        header("Location: /public/login/DocLogin.php");
    }
?>

    </html>