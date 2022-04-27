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
            $payment = $_SESSION["payment"];


            $sql = "SELECT * FROM doctor,clinic WHERE doctor.clinic_id = clinic.id AND full_name = '$doctor' AND clinic_name = '$cname'";

            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            if ($row) {

                $doctor_id = $row["d_id"];
                $clinic_id = $row["clinic_id"];

                $transactionErr = $transaction = '';
                $flag = true;

                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $transaction = $_POST['transaction_id'];
                    $problem = $_POST['problem'];

                    $query = "INSERT INTO book_appointment(patient_id, doctor_id, clinic_id, date, problem, transaction_id) VALUES('$patient_id', '$doctor_id', '$clinic_id', '$date', '$problem', '$transaction')";

                    if ($payment == "UPI Payment") {
                        if (!$transaction) {
                            $transactionErr = "Mention your Ttansaction Id";
                            $flag = false;
                        }
                    }

                    if ($flag) {
                        if ($conn->query($query)) {

                            $query_status = "UPDATE book_appointment
                                        SET approval_status = 'APPROVED'
                                        WHERE patient_id = '$patient_id' AND doctor_id = '$doctor_id' AND date = '$date';";

                            if ($conn->query($query_status)) {
                                header("Location:/public/dashboard/patientDash.php");
                            } else {
                                echo "failed" . $conn->error;
                            }
                        } else {
                            echo "failed" . $conn->error;
                        }
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
                                        <input type="text" name="payment" class="form-control" id="payment" value="<?php echo $payment; ?>" />
                                    </div>

                                    <?php
                                    if ($payment == "UPI Payment") { ?>
                                        <div class="form-group">
                                            <label id="upi-label" for="upi"><strong>Clinic UPI ID</strong></label>
                                            <input type="text" name="clinic_upi_id" class="form-control" id="upi" value="<?php echo $row["clinic_upi_id"]; ?>" />
                                        </div>

                                        <div class="form-group">
                                            <label id="transaction-label" for="transaction"><strong>Transaction ID</strong></label>
                                            <input type="text" name="transaction_id" class="form-control" id="transaction" placeholder="Mention your transaction id" value="<?php echo $transaction; ?>" />
                                            <small class="error-label"><?php echo $transactionErr ?></small>
                                        </div>
                                    <?php } ?>

                                    <div class="form-group">
                                        <label id="problem-label" for="problem"><strong>Problem</strong></label>
                                        <input type="text" name="problem" class="form-control" placeholder="Problem (OPTIONAL)" id="problem" value="<?php $problem; ?>" />
                                    </div>

                                    <div class="form-group">
                                        <div id="button-group">
                                            <label id="submit-label" for="submit"></label>
                                            <input id="submit" type="submit" value="Submit" class="btn" />
                                            <label id="back-label" for="back"></label>
                                            <a href="./choosePayment.php">
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