<?php

include '../config.php';

$id = $_GET['id'];

$query_delete = "UPDATE book_appointment SET approval_status = 'DECLINE' WHERE id = '$id' ";
        if ($conn->query($query_delete)) {
            header("Location: ./doctorAppointmentHistory.php"); 
    } else {
        echo "failed" . $conn->error;
    }
?>
