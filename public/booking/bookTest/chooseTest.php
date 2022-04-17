<?php
include "../../config.php";
session_start();
if ($_SESSION["loggedIn"]) {
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <link rel="stylesheet" type="text/css" href="/assets/css/booking.css" />

        <!-- Font Awsome  -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="description" content="Doctor Patient Appointment System" />
        <title></title>
    </head>

    <body>
        <main>

            <?php

            $patient_id = $_SESSION["patient_id"];

            $test = $testErr = '';
            $flag = true;

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $test = $_POST['test_type'];

                if ($test == "Choose Test Type") {
                    $testErr = "Specify your Test Type";
                    $flag = false;
                }

                $_SESSION["test"] = $test;

                if ($flag) {
                    $_SESSION["logged_In"] = true;
                    header("Location:./chooseClinic.php");
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
                                    <select name="test_type" id="test-type" , class="form-control">
                                        <option selected>Choose Test Type</option>

                                        <?php
                                        $query_test = "SELECT DISTINCT test_type FROM test";
                                        $result_test = $conn->query($query_test);
                                        while ($row = $result_test->fetch_array()) {
                                            $test = $row['test_type'];
                                        ?>
                                            <option><?php echo $test ?></option>
                                        <?php } ?>
                                    </select>
                                    <small class="error-label"><?php echo $testErr ?></small>
                                </div>

                                <div class="form-group">
                                    <div id="button-group">
                                        <label id="submit-label" for="submit"></label>
                                        <input id="submit" type="submit" value="Next" class="btn" />
                                        <label id="back-label" for="back"></label>
                                        <a href="/public/dashboard/patientDash.php">
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

<?php
} else {
    header("Location: ../login/patientLogin.php");
}
?>

    </html>