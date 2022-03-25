<?php
include "../config.php";
session_start();

if (isset($_POST['username']) && isset($_POST['password'])) {

    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $uname = validate($_POST['username']);
    $pass = validate($_POST['password']);

    $_SESSION["uname"] = $uname;

    $sql = "SELECT * FROM patient WHERE username='$uname' AND password='$pass'";

    $result = $conn->query($sql);
	$row = $result->fetch_assoc();
    if($row != null){
        $_SESSION["loggedIn"] = true;
        header("location: ../dashboard/patientDash.php");
    }else{
        header("location: ../login/PatientLogin.php");
    }
}
?>
