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

            $clinic_name = $clinicErr = '';
            $flag = true;

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $cname = $_POST['clinic_name'];

                if ($cname == "Choose Clinic") {
                    $clinicErr = "Specify your Clinic";
                    $flag = false;
                }

                $_SESSION["cname"] = $cname;

                if ($flag) {
                    $_SESSION["logged_In"] = true;
                    header("Location:./chooseDate.php");
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
                                    <select name="clinic_name" id="clinic-name" , class="form-control">
                                        <option selected>Choose Clinic</option>

                                        <?php
                                        $query_clinic = "SELECT DISTINCT clinic_name FROM test,clinic WHERE test.clinic_id = clinic.id AND test_type = '$test'";
                                        $result_clinic = $conn->query($query_clinic);
                                        while ($row = $result_clinic->fetch_array()) {
                                            $clinic_name = $row['clinic_name'];
                                        ?>
                                            <option><?php echo $clinic_name ?></option>
                                        <?php } ?>
                                    </select>
                                    <small class="error-label"><?php echo $clinicErr ?></small>
                                </div>

                                <div class="form-group">
                                    <div id="button-group">
                                        <label id="submit-label" for="submit"></label>
                                        <input id="submit" type="submit" value="Next" class="btn" />
                                        <label id="back-label" for="back"></label>
                                        <a href="./chooseTest.php">
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



<?php } ?>

    </html>