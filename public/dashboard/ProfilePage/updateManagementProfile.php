<?php
include "../../config.php";
session_start();
if ($_SESSION["loggedIn"]) {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <link rel="stylesheet" type="text/css" href="/assets/css/managementRegister.css" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>

    <body>
        <?php
        $uname =  $_SESSION["uname"];
        $sql = "SELECT * FROM management,clinic WHERE clinic.id = management.clinic_id AND username='$uname'";


        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        if ($row) {
        ?>
            <header id="header">
                <div class="logo">
                    <a href="../managementDash.php">
                        <img class="logo-img" id="header-img" src="/assets/images/doceasy/doceasy-doctor-logo.svg" alt="DocEasy logo" />
                    </a>
                </div>

                <nav id="nav-bar">
                    <ul>
                        <li><a class="nav-link" href="./changePassword/managementPasswordUpdate.php">Change Password</a></li>
                        <li><a class="nav-link" href="/public/logout/managementLogout.php">Logout</a></li>
                    </ul>
                </nav>
            </header>
            <main>

                <?php
                $management_id = $row["m_id"];
                $nameErr = $phnNoErr = '';
                $flag = true;

                if (isset($_POST["update"])) {

                    $full_name = $_POST['full_name'];
                    $phn_no = $_POST['phn_no'];
                    $email = $_POST['Email'];

                    if (!preg_match("/^[a-zA-Z ]*$/", $full_name)) {
                        $nameErr = "only letters and white spaces allowed";
                        $flag = false;
                    }

                    if (strlen($phn_no) != 10) {
                        $phnNoErr = "Phone Number must be contain 10 digit";
                        $flag = false;
                    }


                    if ($flag) {
                        $query1 = "UPDATE management SET full_name = '$full_name', phn_no = '$phn_no', Email = '$email' WHERE m_id = '$management_id'";

                        if ($conn->query($query1)) {
                            header("location:../managementDash.php");
                        } else {
                            echo "failed" . $conn->error;
                        }
                    }
                }
                ?>

                <section id="registration">
                    <h2>Management Details</h2>
                    <div class="grid">
                        <form id="form" action="" method="POST">

                            <div class="column-100">
                                <div class="form-group">
                                    <label id="name-label" for="full-name"><strong>Full Name</strong></label>
                                    <input type="text" name="full_name" class="form-control" id="full-name" placeholder="Full Name" value="<?php echo $row["full_name"] ?>" />
                                    <small class="error-label"><?php echo $nameErr ?></small>
                                </div>
                            </div>

                            <div class="column-100">
                                <div class="form-group">
                                    <label id="phn-label" for="phn-no"><strong>Phone Number</strong></label>
                                    <input type="tel" name="phn_no" class="form-control" id="phn-no" placeholder="Phone Number" value="<?php echo $row["phn_no"] ?>" />
                                    <small class="error-label"><?php echo $phnNoErr ?></small>
                                </div>
                            </div>

                            <div class="column-100">
                                <div class="form-group">
                                    <label id="email-label" for="email"><strong>Email</strong></label>
                                    <input type="email" name="Email" class="form-control" id="email" placeholder="Email address" value="<?php echo $row["Email"] ?>" />
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
                                    <a href="../managementDash.php">
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
        header("Location: /public/login/ManagementLogin.php");
    }
?>

    </html>