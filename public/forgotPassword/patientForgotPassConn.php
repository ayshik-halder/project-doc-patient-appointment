<?php
include "../config.php";
session_start();

if (isset($_POST['aadhar_no']) && isset($_POST['phn_no']) && isset($_POST['email'])) {

    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $aadhar_no = validate($_POST['aadhar_no']);
    $phn_no = validate($_POST['phn_no']);
    $email = validate($_POST['email']);

    $sql = "SELECT * FROM patient WHERE aadhar_no='$aadhar_no' AND phn_no='$phn_no' AND email='$email'";

    $result = $conn->query($sql);
	$row = $result->fetch_assoc();
    if($row != null){
        $uname = $row["username"] ;
        $_SESSION["uname"] = $uname;
        
        $_SESSION["loggedIn"] = true;
        header("location: /public/dashboard/ProfilePage/changePassword/PatientpasswordUpdate.php");
    }else{
        header("location: /public/login/PatientLogin.php");
    }
}
