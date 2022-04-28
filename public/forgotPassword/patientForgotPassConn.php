<?php
include "../config.php";
session_start();

if (isset($_POST['username']) && isset($_POST['dob']) && isset($_POST['phn_no']) && isset($_POST['email'])) {

    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $uname = validate($_POST['username']);
    $dob = validate($_POST['dob']);
    $phn_no = validate($_POST['phn_no']);
    $email = validate($_POST['email']);

    $_SESSION["uname"] = $uname;

    $sql = "SELECT * FROM patient WHERE username='$uname' AND dob='$dob' AND phn_no='$phn_no' AND email='$email'";

    $result = $conn->query($sql);
	$row = $result->fetch_assoc();
    if($row != null){
        $_SESSION["loggedIn"] = true;
        header("location: /public/dashboard/ProfilePage/changePassword/PatientpasswordUpdate.php");
    }else{
        header("location: /public/login/PatientLogin.php");
    }
}
?>