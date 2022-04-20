<?php
require_once "../../config.php";
session_start();
if ($_SESSION["logged_In"]) {
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
            $test = $_SESSION["test"];
            $cname = $_SESSION["cname"];
            $date = $_SESSION["date"];

            $sql = "SELECT * FROM test,clinic WHERE test.clinic_id = clinic.id AND test_type = '$test' AND clinic_name = '$cname'";

            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            if ($row) {

                $test_id = $row["t_id"];
                $clinic_id = $row["clinic_id"];

                $payment = $paymentErr = '';
                $flag = true;

                if ($_SERVER["REQUEST_METHOD"] == "POST") {

                    if ($payment == "Choose Payment Type") {
                        $paymentErr = "Mention Payment Type";
                        $flag = false;
                    }

                    if ($flag) {
                        $query = "INSERT INTO book_test(patient_id, test_id, clinic_id, date)
                                VALUE('$patient_id', '$test_id', '$clinic_id', '$date')";

                        if ($conn->query($query)) {
                            session_unset();
                            session_destroy();
                            header("Location:/public/dashboard/patientDash.php");
                        } else {
                            echo "failed" . $conn->error;
                        }
                    }
                }
            ?>


                <section id="registration">
                    <div class="container">
                        <div class="card">
                            <h2>Book Diagnosis Test</h2>
                            <div class="grid">
                                <form id="form" action=" " method="POST">
                                    <div class="form-group">
                                        <label id="test-type-label" for="test-type"><strong>Test Type</strong></label>
                                        <input type="text" name="test_type" class="form-control" id="test_type" value="<?php echo $test; ?>" />
                                    </div>

                                    <div class="form-group">
                                        <label id="cname-label" for="clinic-name"><strong>Clinic Name</strong></label>
                                        <input type="text" name="clinic_name" class="form-control" id="clinic_name" value="<?php echo $cname; ?>" />
                                    </div>

                                    <div class="form-group">
                                        <label id="fee-label" for="fee"><strong>Fees</strong></label>
                                        <input type="text" class="form-control" id="fee" value="<?php echo $row["minimum_fee"] . " - " . $row["maximum_fee"]; ?>" />
                                    </div>

                                    <div class="form-group">
                                        <label id="date-label" for="date"><strong>Choose Date</strong></label>
                                        <input type="date" name="date" class="form-control" id="date" value="<?php echo $date; ?>" />
                                    </div>

                                    <div class="form-group">
                                        <label id="payment-label" for="payment-type"><strong>Payment Mode</strong></label>
                                        <select name="payment" id="payment" class="form-control">
                                            <option selected>Choose Payment Type</option>
                                            <option value="<?php echo $payment ?>">Cash Payment</option>
                                        </select>
                                        <small class="error-label"><?php echo $paymentErr ?></small>
                                    </div>

                                    <div class="form-group">
                                        <div id="button-group">
                                            <label id="submit-label" for="submit"></label>
                                            <input id="submit" type="submit" value="Submit" class="btn" />
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