<?php
include "../config.php";
session_start();

if (isset($_POST['aadhar_no']) && isset($_POST['mci_no']) && isset($_POST['clinic_name'])) {

    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $aadhar_no = validate($_POST['aadhar_no']);
    $mci_no = validate($_POST['mci_no']);
    $clinic = validate($_POST['clinic_name']);

    $sql = "SELECT * FROM doctor,clinic WHERE clinic.id = doctor.clinic_id AND aadhar_no='$aadhar_no' AND mci_no='$mci_no' AND clinic_name='$clinic'";

    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    if ($row != null) {
        $uname = $row["username"];
        $_SESSION["uname"] = $uname;

        $_SESSION["loggedIn"] = true;
        header("location: /public/dashboard/ProfilePage/changePassword/DoctorPasswordUpdate.php");
    } else {
        header("location: /public/login/DocLogin.php");
    }
}
