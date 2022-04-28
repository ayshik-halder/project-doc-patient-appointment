<?php
include "../config.php";
session_start();

if (isset($_POST['username']) && isset($_POST['dob']) && isset($_POST['clinic_name']) && isset($_POST['specialization'])) {

    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $uname = validate($_POST['username']);
    $dob = validate($_POST['dob']);
    $clinic = validate($_POST['clinic_name']);
    $specialization = validate($_POST['specialization']);

    $_SESSION["uname"] = $uname;

    $sql = "SELECT * FROM doctor,clinic WHERE clinic.id = doctor.clinic_id AND username='$uname' AND dob='$dob' AND clinic_name='$clinic' AND specialization='$specialization'";

    $result = $conn->query($sql);
	$row = $result->fetch_assoc();
    if($row != null){
        $_SESSION["loggedIn"] = true;
        header("location: /public/dashboard/ProfilePage/changePassword/DoctorPasswordUpdate.php");
    }else{
        header("location: /public/login/DocLogin.php");
    }
}
