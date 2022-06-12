<?php
require_once "../../../config.php";
session_start();
if ($_SESSION["loggedIn"]) {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <link rel="stylesheet" type="text/css" href="/assets/css/PatientRegister.css" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>

    <body>
        <?php
        $uname =  $_SESSION["uname"];
        $sql = "SELECT * FROM patient WHERE username='$uname'";

        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        if ($row) {
        ?>

            <header id="header">
                <div class="logo">
                    <a href="../../patientDash.php">
                        <img class="logo-img" id="header-img" src="/assets/images/doceasy/doceasy-patient-logo.svg" alt="DocEasy logo" />
                    </a>
                </div>

                <nav id="nav-bar">
                    <ul>
                        <li><a class="nav-link" href="#"><?php echo $row["full_name"];  ?></a></li>
                        <li><a class="nav-link" href="#"><?php echo $row["username"];  ?></a></li>
                        <li><a class="nav-link" href="/public/dashboard/patientDash.php">Exit</a></li>
                        <li><a class="nav-link" href="/public/logout/patietLogout.php">Logout</a></li>
                    </ul>
                </nav>
            </header>
            <main>

                <?php
                $patient_id = $row["p_id"];
                $passwordErr = $confirmPasswordErr = '';
                $flag = true;

                if (isset($_POST["update"])) {

                    $password = $_POST['password'];
                    $confirm_password = $_POST['confirm_password'];

                    if (!$password) {
                        $passwordErr = "Password is required";
                        $flag = false;
                    } elseif (!preg_match("/^[0-9]*$/", $password)) {
                        $passwordErr = "Only numbers are allowed";
                        $flag = false;
                    }

                    if (!$confirm_password) {
                        $confirmPasswordErr = "Confirm Password is required";
                        $flag = false;
                    } elseif ($password && $confirm_password && strcmp($password, $confirm_password) !== 0) {
                        $confirmPasswordErr = "Please repeat the password correctly";
                        $flag = false;
                    }


                    if ($flag) {
                        $query1 = "UPDATE patient SET password = '$password' WHERE p_id = '$patient_id'";

                        if ($conn->query($query1)) {
                            $message = 'Your Password is updated successfully';

                            echo "<SCRIPT>
                                alert('$message')
                                window.location.replace('/public/dashboard/patientDash.php');
                                </SCRIPT>";
                        } else {
                            echo "failed" . $conn->error;
                        }
                    }
                }
                ?>

                <section id="registration">
                    <h2>Change Password</h2>
                    <div class="grid">
                        <form id="form" action="" method="POST">

                            <div class="column-100">
                                <div class="form-group">
                                    <label id="password-label" for="password"><strong>New Password</strong></label>
                                    <input type="password" name="password" class="form-control" id="password" placeholder="New Password" value="<?php $password; ?>" />
                                    <small class="error-label"><?php echo $passwordErr ?></small>
                                </div>
                            </div>

                            <div class="column-100">
                                <div class="form-group">
                                    <label id="c-password-label" for="c-password"><strong>Confirm New Password</strong></label>
                                    <input type="password" name="confirm_password" class="form-control" id="c-password" placeholder="Re-enter the new Password" value="<?php $confirm_password; ?>" />
                                    <small class="error-label"><?php echo $confirmPasswordErr ?></small>
                                </div>
                            </div>

                            <div class="column-50">
                                <div class="form-group">
                                    <label id="submit-label" for="submit"></label>
                                    <input id="submit" type="submit" name="update" value="Update" class="btn" />
                                </div>
                            </div>

                            <div class="column-50">
                                <div class="form-group">
                                    <a href="../updatePatientProfile.php">
                                        <label id="back-label" for="back"></label>
                                        <input id="back" type="button" value="back" class="btn" />
                                    </a>
                                </div>
                            </div>

                        </form>
                    </div>
                </section>

            </main>
    </body>

<?php
        }
    } else {
        header("Location: /public/login/PatientLogin.php");
    }
?>

    </html>