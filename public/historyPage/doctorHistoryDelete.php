<?php

include '../config.php';

$id = $_GET['id'];

$query_delete = "DELETE FROM book_appointment WHERE id = '$id' ";
        if ($conn->query($query_delete)) {
            header("Location: ./doctorAppointmentHistory.php"); 
    } else {
        echo "failed" . $conn->error;
    }
?>
