<?php

include '../config.php';

$id = $_GET['id'];

$query_delete = "DELETE FROM book_test WHERE ticket_no = '$id' ";

        if ($conn->query($query_delete)) {
            header("Location: ./patientTestHistory.php"); 
    } else {
        echo "failed" . $conn->error;
    }
?>