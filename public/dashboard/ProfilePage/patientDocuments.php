<?php
require_once "../../config.php";
session_start();
if ($_SESSION["loggedIn"]) {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <link rel="stylesheet" type="text/css" href="/assets/css/PatientRegister.css" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>

    <body>
        <?php
        $uname =  $_SESSION["uname"];
        $sql = "SELECT * FROM patient WHERE username='$uname'";

        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        if ($row) {
        ?>

            <header id="header">
                <div class="logo">
                    <a href="../../patientDash.php">
                        <img class="logo-img" id="header-img" src="/assets/images/doceasy/doceasy-patient-logo.svg" alt="DocEasy logo" />
                    </a>
                </div>

                <nav id="nav-bar">
                    <ul>
                        <li><a class="nav-link" href="#"><?php echo $row["full_name"];  ?></a></li>
                        <li><a class="nav-link" href="/public/logout/patietLogout.php">Logout</a></li>
                        <li><a class="nav-link" href="../patientDash.php">Exit</a></li>
                    </ul>
                </nav>
            </header>
            <main>

                <?php
                $patient_id = $row["p_id"];
                $reportTypeErr = '';
                $flag = true;

                if (isset($_POST["update"])) {

                    $report = $_POST['report'];
                    $report_type = $_POST['report_type'];

                    if ($report) {
                        if (!$report_type) {
                            $reportTypeErr = "Report Type is required";
                            $flag = false;
                        }
                    }

                    if ($flag) {

                        $query2 = "INSERT INTO patient_document(patient_id, report_type, report)
                        VALUES('$patient_id', '$report_type', '$report')";

                        $query3 = "DELETE FROM patient_document WHERE patient_id = '$patient_id' AND report = '' ";

                        if ($conn->query($query2)) {
                            if ($conn->query($query3)) {
                                $message = 'Your Document is submitted successfully';

                            echo "<SCRIPT>
                                alert('$message')
                                window.location.replace('/public/dashboard/patientDash.php');
                                </SCRIPT>";
                            } else {
                                echo "failed" . $conn->error;
                            }
                        }
                    }
                }
                ?>

                <section id="registration">
                    <h2>Your Documents</h2>
                    <div class="grid">
                        <form id="form" action="" method="POST">

                            <div class="column-100">
                                <div class="form-group">
                                    <label id="document-label" for="document"><strong>Your Documents</strong></label>
                                    <?php
                                    $sql_document = "SELECT * FROM patient, patient_document WHERE patient.p_id = patient_document.patient_id AND patient_id = $patient_id ";

                                    $result_document = $conn->query($sql_document);
                                    while ($row_document = $result_document->fetch_array()) { ?>
                                        <input name="report" class="form-control" id="document" value="<?php echo $row_document["report"] ?>" disabled />
                                    <?php } ?>
                                </div>
                            </div>

                            <div class="column-50">
                                <div class="form-group">
                                    <label id="report-label" for="report"><strong>Report</strong></label>
                                    <input type="file" name="report" class="form-control" id="report" value="<?php $report ?>" />
                                </div>
                            </div>

                            <div class="column-50">
                                <div class="form-group">
                                    <label id="report_type-label" for="report_type"><strong>Report Type</strong></label>
                                    <input type="text" name="report_type" class="form-control" id="report_type" placeholder="Mention report type if you attach any report" value="<?php $report_type ?>" />
                                    <small class="error-label"><?php echo $reportTypeErr ?></small>
                                </div>
                            </div>

                            <div class="column-50">
                                <div class="form-group">
                                    <label id="submit-label" for="submit"></label>
                                    <input id="submit" type="submit" name="update" value="Update" class="btn" />
                                </div>
                            </div>

                            <div class="column-50">
                                <div class="form-group">
                                    <a href="./updatePatientProfile.php">
                                        <label id="back-label" for="back"></label>
                                        <input id="back" type="button" value="back" class="btn" />
                                    </a>
                                </div>
                            </div>

                        </form>
                    </div>
                </section>

            </main>
    </body>

<?php
        }
    } else {
        header("Location: /public/login/PatientLogin.php");
    }
?>

    </html>