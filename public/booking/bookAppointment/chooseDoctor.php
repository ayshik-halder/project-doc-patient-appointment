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

            $doctor = $doctorErr = '';
            $flag = true;

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $doctor = $_POST['username'];

                if ($doctor == "Choose Doctor") {
                    $doctorErr = "Specify your Doctor";
                    $flag = false;
                }

                $_SESSION["doctor"] = $doctor;

                if ($flag) {
                    $_SESSION["logged_in"] = true;
                    header("Location:./chooseDate.php");
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
                                    <select name="username" id="doctor" , class="form-control">
                                        <option selected>Choose Doctor</option>

                                        <?php
                                        $query_doctor = "SELECT DISTINCT full_name FROM doctor,clinic WHERE doctor.clinic_id = clinic.id AND specialization = '$dept' AND clinic_name= '$cname' AND start_time IS NOT NULL";
                                        $result_doctor = $conn->query($query_doctor);
                                        while ($row = $result_doctor->fetch_array()) {
                                            $doctor = $row['full_name'];
                                        ?>
                                            <option><?php echo $doctor ?></option>
                                        <?php } ?>
                                    </select>
                                    <small class="error-label"><?php echo $doctorErr ?></small>
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



<?php } ?>

    </html>