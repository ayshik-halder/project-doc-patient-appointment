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

            $sql = "SELECT * FROM test WHERE test_type='$test'";

            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            if ($row) {

                $date = $dateErr = '';
                $flag = true;

                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $date = $_POST['date'];

                    if (!$date) {
                        $dateErr = "Mention Date";
                        $flag = false;
                    }

                    $_SESSION["date"] = $date;

                    if ($flag) {
                        $_SESSION["logged_In"] = true;
                        header("Location:./bookTest.php");
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
                                        <input type="date" name="date" class="form-control" id="date" value="<?php $date; ?>" />
                                        <small class="error-label"><?php echo $dateErr ?></small>
                                    </div>

                                    <div class="form-group">
                                        <div id="button-group">
                                            <label id="submit-label" for="submit"></label>
                                            <input id="submit" type="submit" value="Next" class="btn" />
                                            <label id="back-label" for="back"></label>
                                            <a href="./chooseClinic.php">
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
        } ?>

    </html>