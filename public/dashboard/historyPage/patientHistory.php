<?php
include "../../config.php";
session_start();
if ($_SESSION["loggedIn"]) {
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>

    <body>

        <?php
        $uname =  $_SESSION["uname"];
        $patient_id =  $_SESSION["patient_id"];

        $sql = "SELECT *, doctor.full_name AS doctor_name, book_appointment.id AS booking_id 
                FROM patient,book_appointment,doctor,clinic 
                WHERE patient.p_id = book_appointment.patient_id AND doctor.d_id = book_appointment.doctor_id AND clinic.id = book_appointment.clinic_id AND p_id='$patient_id'";

        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        if ($row) {
        ?>

            <main>
                <table>
                    <tr>
                        <th>Date</th>
                        <th>Doctor Name</th>
                        <th>Problem</th>
                        <th>Clinic Details</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>

                    <?php
                    while ($row = $result->fetch_assoc()) {
                    ?>
                        <tr>
                            <td> <?php echo $row["date"]; ?> </td>
                            <td> <?php echo $row["doctor_name"]; ?> </td>
                            <td> <?php echo $row["problem"]; ?> </td>
                            <td> <?php echo $row["clinic_name"]; ?> </td>
                            <td> <?php echo $row["approval_status"]; ?> </td>
                            <td> <button> <a href="./PatientHistoryDelete.php?id=<?php echo $row['booking_id'] ?>"> Cancel </a> </button> </td>
                        </tr>
                    <?php } ?>
                </table>

            </main>
    </body>

<?php
        }
    } else {
        header("Location: /public/login/PatientLogin.php");
    }
?>

    </html>