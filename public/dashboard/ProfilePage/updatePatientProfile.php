<?php
require_once "../../config.php";
session_start();
if ($_SESSION["loggedIn"]) {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <link rel="stylesheet" type="text/css" href="/assets/css/PatientRegister.css" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>

    <body>
        <?php
        $uname =  $_SESSION["uname"];
        $sql = "SELECT * FROM patient WHERE username='$uname'";

        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        if ($row) {
        ?>

            <header id="header">
                <div class="logo">
                    <a href="../patientDash.php">
                        <img class="logo-img" id="header-img" src="/assets/images/doceasy/doceasy-patient-logo.svg" alt="DocEasy logo" />
                    </a>
                </div>

                <nav id="nav-bar">
                    <ul>
                        <li><a class="nav-link" href="./changePassword/PatientpasswordUpdate.php">Change Password</a></li>
                        <li><a class="nav-link" href="/public/logout/patietLogout.php">Logout</a></li>
                    </ul>
                </nav>
            </header>
            <main>

                <?php
                $patient_id = $row["p_id"];
                $nameErr = $dobErr = $ageErr = $phnNoErr = $emailErr = $addressErr = $cityErr = $pinCodeErr = '';
                $flag = true;

                if (isset($_POST["update"])) {

                    $full_name = $_POST['full_name'];
                    $dob = $_POST['dob'];
                    $age = $_POST['age'];
                    $phn_no = $_POST['phn_no'];
                    $email = $_POST['email'];
                    $address = $_POST['address'];
                    $city = $_POST['city'];
                    $pin_code = $_POST['pin_code'];
                    $allergy = $_POST['allergic'];
                    $report_type = $_POST['report_type'];
                    $report = $_POST['report'];


                    if (!$full_name) {
                        $nameErr = "First name is required";
                        $flag = false;
                    } elseif (!preg_match("/^[a-zA-Z ]*$/", $full_name)) {
                        $nameErr = "only letters and white spaces allowed";
                        $flag = false;
                    }

                    $today_date = strtotime(date('Y-m-d'));
                    $date_of_birth = strtotime($dob);

                    if (!$dob) {
                        $dobErr = "DOB is required";
                        $flag = false;
                    } elseif ($date_of_birth >= $today_date) {
                        $dobErr = "Mention Proper Date of Birth";
                        $flag = false;
                    }

                    if (!$age) {
                        $ageErr = "Mention Your Age";
                        $flag = false;
                    } elseif (strlen($age) > 2) {
                        $ageErr = "Age cannot contain more than 2 digit";
                        $flag = false;
                    }

                    if (!$phn_no) {
                        $phnNoErr = "Phone Number is required";
                        $flag = false;
                    } elseif (strlen($phn_no) != 10) {
                        $phnNoErr = "Phone Number must be contain 10 digit";
                        $flag = false;
                    }

                    if (!$email) {
                        $emailErr = "Email is required";
                        $flag = false;
                    } elseif (!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $email)) {
                        $emailErr = "Email format is not valid";
                        $flag = false;
                    }

                    if (!$address) {
                        $addressErr = "Address is required";
                        $flag = false;
                    } 

                    if (!$city) {
                        $cityErr = "City is required";
                        $flag = false;
                    } 

                    if (!$pin_code) {
                        $pinCodeErr = "Pin Code is required";
                        $flag = false;
                    } elseif (strlen($pin_code) != 6) {
                        $pinCodeErr = "Pin Code must be contain 6 digit";
                        $flag = false;
                    }


                    if ($flag) {
                        $query1 = "UPDATE patient SET full_name = '$full_name', dob = '$dob', age = '$age', phn_no = '$phn_no', email = '$email', address = '$address', city = '$city', pin_code = '$pin_code', allergic = '$allergy' WHERE p_id = '$patient_id'";

                        $query2 = "INSERT INTO patient_document(patient_id, report_type, report)
                        VALUES('$patient_id', '$report_type', '$report')";

                        $query3 = "DELETE FROM patient_document WHERE patient_id = '$patient_id' AND report_type = '' AND report = '' ";

                        if ($conn->query($query1)) {
                            if ($conn->query($query2)) {
                                if ($conn->query($query3)) {

                                    header("location:../patientDash.php");
                                } else {
                                    echo "failed" . $conn->error;
                                }
                            }
                        }
                    }
                }
                ?>

                <section id="registration">
                    <h2>Patient Details</h2>
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

                            <div class="column-100">
                                <div class="form-group">
                                    <label id="address-label" for="address"><strong>Address</strong></label>
                                    <input type="text" name="address" class="form-control" id="address" placeholder="Address" value="<?php echo $row["address"] ?>" />
                                    <small class="error-label"><?php echo $addressErr ?></small>
                                </div>
                            </div>

                            <div class="column-50">
                                <div class="form-group">
                                    <label id="city-label" for="city"><strong>City</strong></label>
                                    <input type="text" name="city" class="form-control" id="city" placeholder="City" value="<?php echo $row["city"] ?>" />
                                    <small class="error-label"><?php echo $cityErr ?></small>
                                </div>
                            </div>

                            <div class="column-50">
                                <div class="form-group">
                                    <label id="pin-label" for="pin-code"><strong>Pin Code</strong></label>
                                    <input type="number" name="pin_code" class="form-control" id="pin-code" placeholder="Pin-code" value="<?php echo $row["pin_code"] ?>" />
                                    <small class="error-label"><?php echo $pinCodeErr ?></small>
                                </div>
                            </div>

                            <div class="column-100">
                                <div class="form-group">
                                    <label id="allergy-label" for="allergy"><strong>Allergy</strong></label>
                                    <input type="text" name="allergic" class="form-control" id="allergy" placeholder="If your are allergic to something mention it (OPTIONAL)" value="<?php echo $row["allergic"] ?>" />
                                </div>
                            </div>

                            <div class="column-100">
                                <div class="form-group">
                                    <label id="report-label" for="report"><strong>Report</strong></label>
                                    <input type="file" name="report" class="form-control" id="report" value="<?php $report ?>" />
                                </div>
                            </div>

                            <div class="column-100">
                                <div class="form-group">
                                    <label id="report_type-label" for="report_type"><strong>Report Type</strong></label>
                                    <input type="text" name="report_type" class="form-control" id="report_type" placeholder="Mention report type if you attach any report" value="<?php $report_type ?>" />
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
                                    <a href="../patientDash.php">
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
        header("Location: /public/login/PatientLogin.php");
    }
?>

    </html>