<?php
require_once "../../config.php";
session_start();
if ($_SESSION["logged_in"]) {
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <link rel="stylesheet" type="text/css" href="/assets/css/booking.css" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>

    <body>
        <main>
            <?php

            $patient_id = $_SESSION["patient_id"];
            $dept = $_SESSION["dept"];
            $cname = $_SESSION["cname"];
            $doctor = $_SESSION["doctor"];

            $sql = "SELECT * FROM doctor WHERE full_name='$doctor'";

            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            if ($row) {

                $date = $dateErr = '';
                $flag = true;

                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $date = $_POST['date'];


                    $today_date = strtotime(date('Y-m-d'));
                    $DATE = strtotime($date);
                    $last_date = strtotime(date("Y-m-t", $today_date));

                    if (!$date) {
                        $dateErr = "Mention Date";
                        $flag = false;
                    } elseif ($today_date == $last_date) {
                        $tomorrow = strtotime(date("Y-m-d", strtotime(date('Y-m-d') . '+1days')));
                        $lastDate = strtotime(date("Y-m-t", $tomorrow));

                        if ($DATE <= $today_date) {
                            $dateErr = "Choose Upcoming date of next month";
                            $flag = false;
                        } elseif ($DATE > $lastDate) {
                            $dateErr = "Choose Upcoming date of next month";
                            $flag = false;
                        }
                    } elseif ($DATE <= $today_date) {
                        $dateErr = "Choose Upcoming date of current month";
                        $flag = false;
                    } elseif ($DATE > $last_date) {
                        $dateErr = "Choose Upcoming date of current month";
                        $flag = false;
                    }

                    $_SESSION["date"] = $date;

                    if ($flag) {
                        $_SESSION["logged_In"] = true;
                        header("Location:./bookAppointment.php");
                    }
                }
            ?>

                <section id="registration">
                    <div class="container">
                        <div class="card">
                            <h2>Book Doctor Appointment</h2>
                            <div class="grid">
                                <form id="form" action=" " method="POST">
                                    <div class="form-group">
                                        <label id="specialization-label" for="specialization"><strong>Department</strong></label>
                                        <input type="text" name="specialization" class="form-control" id="specialization" value="<?php echo $dept; ?>" />
                                    </div>

                                    <div class="form-group">
                                        <label id="cname-label" for="clinic-name"><strong>Clinic Name</strong></label>
                                        <input type="text" name="clinic_name" class="form-control" id="clinic_name" value="<?php echo $cname; ?>" />
                                    </div>

                                    <div class="form-group">
                                        <label id="doctor-label" for="doctor"><strong>Doctor</strong></label>
                                        <input type="text" name="full_name" class="form-control" id="doctor" value="<?php echo $doctor; ?>" />
                                    </div>

                                    <div class="form-group">
                                        <label id="fee-label" for="fee"><strong>Fees</strong></label>
                                        <input type="text" name="fee" class="form-control" id="fee" value="<?php echo $row["fee"]; ?>" />
                                    </div>

                                    <div class="form-group">
                                        <label id="date-label" for="date"><strong>Choose Date</strong></label>
                                        <input type="date" name="date" class="form-control" id="date" value="<?php $date; ?>" />
                                        <small class="error-label"><?php echo $dateErr ?></small>
                                    </div>

                                    <div class="form-group">
                                        <div id="button-group">
                                            <label id="submit-label" for="submit"></label>
                                            <input id="submit" type="submit" value="Next" class="btn" />
                                            <label id="back-label" for="back"></label>
                                            <a href="./chooseDoctor.php">
                                                <input id="back" type="back" value="back" class="btn" />
                                            </a>
                                            </a>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </section>
        </main>
    </body>



<?php }
        }
?>

    </html>