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
            $date = $_SESSION["date"];


            $sql = "SELECT * FROM doctor,clinic WHERE doctor.clinic_id = clinic.id AND full_name = '$doctor' AND clinic_name = '$cname'";

            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            if ($row) {

                $doctor_id = $row["d_id"];
                $clinic_id = $row["clinic_id"];

                $payment = $paymentErr = '';
                $flag = true;

                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $payment = $_POST['payment'];

                    if ($payment == "Choose Payment Type") {
                        $paymentErr = "Mention Payment Type";
                        $flag = false;
                    }

                    $_SESSION["payment"] = $payment;

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
                                        <label id="date-label" for="date"><strong>Date</strong></label>
                                        <input type="text" name="date_time" class="form-control" id="date" value="<?php echo $date; ?>" />
                                    </div>

                                    <div class="form-group">
                                        <label id="payment-label" for="payment-type"><strong>Payment Mode</strong></label>
                                        <select name="payment" id="payment" class="form-control">
                                            <option selected>Choose Payment Type</option>
                                            <option>Cash Payment</option>
                                            <option>UPI Payment</option>
                                        </select>
                                        <small class="error-label"><?php echo $paymentErr ?></small>
                                    </div>

                                    <div class="form-group">
                                        <div id="button-group">
                                            <label id="submit-label" for="submit"></label>
                                            <input id="submit" type="submit" value="Next" class="btn" />
                                            <label id="back-label" for="back"></label>
                                            <a href="./chooseDate.php">
                                                <input id="back" type="back" value="back" class="btn" />
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