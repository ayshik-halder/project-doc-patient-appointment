<?php
include "../../config.php";
session_start();
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

        $dept = $deptErr = '';
        $flag = true;

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $dept = $_POST['specialization'];

            if ($dept == "Choose Department") {
                $deptErr = "Specify your Department";
                $flag = false;
            }

            $_SESSION["dept"] = $dept;

            if ($flag) {
                $_SESSION["logged_in"] = true;
                header("Location:./chooseClinic.php");
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
                                <select name="specialization" id="specialization" , class="form-control">
                                    <option selected>Choose Department</option>

                                    <?php
                                    $query_dept = "SELECT DISTINCT specialization FROM doctor";
                                    $result_dept = $conn->query($query_dept);
                                    while ($row = $result_dept->fetch_array()) {
                                        $dept = $row['specialization'];
                                    ?>
                                        <option><?php echo $dept ?></option>
                                    <?php } ?>
                                </select>
                                <small class="error-label"><?php echo $deptErr ?></small>
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

</html>