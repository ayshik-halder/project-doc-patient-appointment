<?php
include "../config.php";
session_start();
if ($_SESSION["loggedIn"]) {
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <link rel="stylesheet" type="text/css" href="/assets/css/userHistory.css" />
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>

    <body>

        <?php
        $uname =  $_SESSION["uname"];
        $doctor_id =  $_SESSION["doctor_id"];

        $sql = "SELECT *, 
        patient.full_name AS patient_name, patient.age AS patient_age, patient.gender AS patient_gender, doctor.full_name AS doctor_name, book_appointment.id AS booking_id  
        FROM doctor, clinic, book_appointment, patient
        WHERE book_appointment.clinic_id = clinic.id AND patient.p_id = book_appointment.patient_id AND doctor.d_id = book_appointment.doctor_id AND d_id = '$doctor_id'";

        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        if ($row) {
        ?>
            <header id="header">
                <div class="logo">
                    <a href="/index.php">
                        <img class="logo-img" id="header-img" src="/assets/images/doceasy/doceasy-doctor-logo.svg" alt="DocEasy logo" />
                    </a>
                </div>

                <nav id="nav-bar">
                    <ul>
                        <li><a class="nav-link" href="#"><?php echo $row["doctor_name"];  ?></a></li>
                        <li><a class="nav-link" href="/public/dashboard/doctorDash.php">Exit</a></li>
                        <li><a class="nav-link" href="/public/logout/docLogout.php">Logout</a></li>
                    </ul>
                </nav>
            </header>
            <main>
                <section id="table">
                    <div class="container">
                        <div class="card">
                            <table>
                                <tr>
                                    <th>DATE</th>
                                    <th>PATIENT NAME</th>
                                    <th>AGE</th>
                                    <th>GENDER</th>
                                    <th>MARITAL STATUS</th>
                                    <th>PATIENT DOCUMENTS</th>
                                    <th>PROBLEM</th>
                                    <th>PATIENT ALLERGY</th>
                                    <th>STATUS</th>
                                    <th>ACTION</th>
                                </tr>

                                <?php
                                while ($row = $result->fetch_assoc()) {
                                    $patient_id = $row["p_id"];
                                ?>
                                    <tr>
                                        <td> <?php echo $row["date"]; ?> </td>
                                        <td> <?php echo $row["patient_name"]; ?> </td>
                                        <td> <?php echo $row["patient_age"]; ?> </td>
                                        <td> <?php echo $row["patient_gender"]; ?> </td>
                                        <td> <?php echo $row["marital_status"]; ?> </td>
                                        <td>
                                            <?php
                                            $sql_document = "SELECT * FROM patient, patient_document WHERE patient.p_id = patient_document.patient_id AND patient_id = $patient_id ";

                                            $result_document = $conn->query($sql_document);
                                            while ($row_document = $result_document->fetch_array()) { ?>
                                                <?php echo $row_document["report"]; ?>
                                            <?php } ?> </td>
                                        <td> <?php echo $row["problem"]; ?> </td>
                                        <td> <?php echo $row["allergic"]; ?> </td>
                                        <td> <?php echo $row["approval_status"]; ?> </td>
                                        <td> <button> <a href="./doctorHistoryDelete.php?id=<?php echo $row['booking_id'] ?>" onclick='return checkDelete()'> Cancel </a> </button> </td>
                                    </tr>
                                <?php } ?>

                                <script>
                                    function checkDelete() {
                                        return confirm('Are you sure you want to cancel the Appointment');
                                    }
                                </script>

                            </table>
                        </div>
                    </div>
                </section>

            </main>
    </body>

<?php
        } else {
            echo "No record found";
        }
    } else {
        header("Location: /public/login/DocLogin.php");
    }
?>

    </html>