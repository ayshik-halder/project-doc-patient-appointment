<?php
include "../config.php";
session_start();
if ($_SESSION["loggedIn"]) {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <link rel="stylesheet" type="text/css" href="/assets/css/testRegister.css" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Test Register</title>
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
                        <li><a class="nav-link" href="../logout/managementLogout.php">Logout</a></li>
                    </ul>
                </nav>
            </header>

            <main>

                <?php

                require_once('../config.php');

                function test_input($data)
                {
                    $data = trim($data);
                    $data = stripslashes($data);
                    $data = htmlspecialchars($data);
                    return $data;
                }

                $clinic_id = $row["clinic_id"];

                $test_type = $start_time = $end_time = $min_fee = $max_fee = '';

                $testTypeErr = $startTimeErr = $endTimeErr = $minFeeErr = $maxFeeErr = '';

                $flag = true;

                if ($_SERVER["REQUEST_METHOD"] == "POST") {

                    // $clinic_id = $_POST[$row['clinic_id']];
                    $test_type = $_POST['test_type'];
                    $start_time = $_POST['start_time'];
                    $end_time = $_POST['end_time'];
                    $min_fee = $_POST['minimum_fee'];
                    $max_fee = $_POST['maximum_fee'];


                    if ($test_type == "Choose Test Type") {
                        $testTypeErr = "Mention Diagnosis Test Type";
                        $flag = false;
                    } else {
                        test_input($test_type);
                    }

                    if (!$start_time) {
                        $startTimeErr = "Start Time is required";
                        $flag = false;
                    } else {
                        test_input($start_time);
                    }

                    if (!$end_time) {
                        $endTimeErr = "End time is required";
                        $flag = false;
                    } else {
                        test_input($end_time);
                    }

                    if (!$min_fee) {
                        $minFeeErr = "Diagnosis Fee is required";
                        $flag = false;
                    } else {
                        test_input($min_fee);
                    }

                    if (!$max_fee) {
                        $maxFeeErr = "Diagnosis Fee is required";
                        $flag = false;
                    } else {
                        test_input($max_fee);
                    }

                    // submit form if validated successfully
                    if ($flag) {
                        $query = "INSERT INTO test(clinic_id, test_type, start_time, end_time, minimum_fee, maximum_fee)
                        VALUE('$clinic_id', '$test_type', '$start_time', '$end_time', '$min_fee', '$max_fee')";

                        if ($conn->query($query)) {
                            header("location:../dashboard/managementDash.php");
                        } else {
                            echo "failed" . $conn->error;
                        }
                    }
                }


                ?>


                <section id="registration">
                    <h2>Diagnosis Registration Form</h2>
                    <div class="grid">
                        <form id="form" action="" method="POST">


                            <div class="column-100">
                                <div class="form-group">
                                    <label id="test-type-label" for="test-type"><strong>Diagnosis Type</strong></label>
                                    <select name="test_type" id="test-type" class="form-control">
                                        <option selected>Choose Test Type</option>
                                        <?php
                                        $test_type = array('Blood Test', 'CT Scan', 'ECG', 'PET Scan', 'Ultrasound', 'X-rays', 'Ultrasonography', 'Urine Test', 'MRI Scan');
                                        sort($test_type, SORT_STRING);

                                        foreach ($test_type as $items) { ?>
                                            <option> <?php echo $items ?></option>
                                        <?php } ?>
                                    </select>
                                    <small class="error-label"><?php echo $testTypeErr ?></small>
                                </div>
                            </div>

                            <div class="column-50">
                                <div class="form-group">
                                    <label id="start-time-label" for="start-time"><strong> Start Time</strong></label>
                                    <input type="time" name="start_time" class="form-control" id="start-time" value="<?php echo $start_time; ?>" />
                                    <small class="error-label"><?php echo $startTimeErr ?></small>
                                </div>
                            </div>

                            <div class="column-50">
                                <div class="form-group">
                                    <label id="end-time-label" for="end-time"><strong>End Time</strong></label>
                                    <input type="time" name="end_time" class="form-control" id="end-time" value="<?php echo $end_time; ?>" />
                                    <small class="error-label"><?php echo $endTimeErr ?></small>
                                </div>
                            </div>

                            <div class="column-50">
                                <div class="form-group">
                                    <label id="min-fee-label" for="fee"><strong>Minimum Fees</strong></label>
                                    <input type="text" name="minimum_fee" class="form-control" id="minimum-fee" placeholder="Minimum Diagnosis Fee" value="<?php echo $min_fee; ?>" />
                                    <small class="error-label"><?php echo $minFeeErr ?></small>
                                </div>
                            </div>

                            <div class="column-50">
                                <div class="form-group">
                                    <label id="max-fee-label" for="fee"><strong>Maximum Fees</strong></label>
                                    <input type="text" name="maximum_fee" class="form-control" id="maximum-fee" placeholder="Maximum Diagnosis Fee" value="<?php echo $max_fee; ?>" />
                                    <small class="error-label"><?php echo $maxFeeErr ?></small>
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
                                    <a href="../dashboard/managementDash.php">
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
                            <li><a href="#">Diagnosis Register</a></li>
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
        header("Location: ../login/managementLogin.php");
    }
?>

    </html>