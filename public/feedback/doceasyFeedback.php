<?php

require_once('../config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    $date = $_POST['date_time'];

    date_default_timezone_set('Asia/Kolkata');
    $date = date('d-m-Y H:i:s');

    $query = "INSERT INTO doceasy_feedback(name, email, message, date_time) 
    VALUES('$name', '$email', '$message', '$date')";


    if ($conn->query($query)) {
        header("location:/index.php");
    } else {
        echo "failed" . $conn->error;
    }
}

?>