<?php
include "../config.php";
session_start();

if (isset($_POST['username']) && isset($_POST['clinic_name']) && isset($_POST['phn_no']) && isset($_POST['Email'])) {

    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $uname = validate($_POST['username']);
    $clinic = validate($_POST['clinic_name']);
    $phn_no = validate($_POST['phn_no']);
    $email = validate($_POST['Email']);

    $_SESSION["uname"] = $uname;

    $sql = "SELECT * FROM management,clinic WHERE clinic.id = management.clinic_id AND username='$uname' AND clinic_name='$clinic' AND phn_no='$phn_no' AND management.Email='$email'";

    $result = $conn->query($sql);
	$row = $result->fetch_assoc();
    if($row != null){
        $_SESSION["loggedIn"] = true;
        header("location: /public/dashboard/ProfilePage/changePassword/managementPasswordUpdate.php");
    }else{
        header("location: /public/login/ManagementLogin.php");
    }
}