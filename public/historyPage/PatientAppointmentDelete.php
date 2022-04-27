<?php

include '../config.php';

$id = $_GET['id'];

$query_cancel = "UPDATE book_appointment SET approval_status = 'DECLINE' WHERE id = '$id' ";

        if ($conn->query($query_cancel)) {
            header("Location: ./patientAppointmentHistory.php"); 
    } else {
        echo "failed" . $conn->error;
    }
?>