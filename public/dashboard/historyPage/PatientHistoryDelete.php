<?php

include '../../config.php';

$id = $_GET['id'];

$query_delete = "DELETE FROM book_appointment WHERE id = '$id' ";
?>
<script> 
    if(confirm("Do you want to cancel the appointment?")){
        <?php
        if ($conn->query($query_delete)) {
            header("Location: ./patientHistory.php"); 
    } else {
        echo "failed" . $conn->error;
    }
?>
    console.log("Confirmed YES");
    }
else{
    console.log("Confirmed NO");
}
</script>
