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
            $dept = $_SESSION["dept"];

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
                    $_SESSION["logged_in"] = true;
                    header("Location:./chooseDoctor.php");
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
                                    <select name="clinic_name" id="clinic-name" , class="form-control">
                                        <option selected>Choose Clinic</option>

                                        <?php
                                        $query_clinic = "SELECT DISTINCT clinic_name FROM doctor,clinic WHERE doctor.clinic_id = clinic.id AND specialization = '$dept'";
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
                                        <a href="./chooseDept.php">
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