<?php
require_once('../../config.php');

date_default_timezone_set('Asia/Kolkata');
$date = date('Y-m-d');

$query = "UPDATE book_test, book_appointment
    SET book_test.approval_status = 'EXPIRE', book_appointment.approval_status = 'EXPIRE'
    WHERE book_test.date < '$date' AND book_appointment.date < '$date'";


if ($conn->query($query)) {
    $message = 'Approval Status is changed successfully';

    echo "<SCRIPT>
        alert('$message')
        window.location.replace('/public/dashboard/adminDash.php');
        </SCRIPT>";
} else {
    echo "failed" . $conn->error;
}
?>