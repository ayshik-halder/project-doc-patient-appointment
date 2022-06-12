<?php
include "../../config.php";
session_start();
if ($_SESSION["loggedIn"]) {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <link rel="stylesheet" type="text/css" href="/assets/css/clinicRegister.css" />
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
                        <img class="logo-img" id="header-img" src="/assets/images/doceasy/doceasy-logo.svg" alt="DocEasy logo" />
                    </a>
                </div>

                <nav id="nav-bar">
                    <ul>
                        <li><a class="nav-link" href="#"><?php echo $row["full_name"]; ?></a></li>
                        <li><a class="nav-link" href="../managementDash.php">Exit</a></li>
                        <li><a class="nav-link" href="/public/logout/managementLogout.php">Logout</a></li>
                    </ul>
                </nav>
            </header>
            <main>

                <?php
                $clinic_id = $row["clinic_id"];
                $flag = true;

                if (isset($_POST["update"])) {

                    $clinic_name = $_POST['clinic_name'];
                    $address = $_POST['address'];
                    $city = $_POST['city'];
                    $pin_code = $_POST['pin_code'];
                    $contact_no = $_POST['contact_no'];
                    $email = $_POST['email'];
                    $clinic_upi_id = $_POST['clinic_upi_id'];


                    $query1 = "UPDATE clinic SET clinic_name = '$clinic_name', address = '$address', city = '$city', pin_code = '$pin_code', contact_no = '$contact_no', email = '$email', clinic_upi_id = '$clinic_upi_id' WHERE id = '$clinic_id'";

                    if ($conn->query($query1)) {
                        header("location:../managementDash.php");
                    } else {
                        echo "failed" . $conn->error;
                    }
                }
                ?>

                <section id="registration">
                    <h2>Clinic Registration Form</h2>
                    <div class="grid">
                        <form id="form" action="" method="POST">

                            <div class="column-100">
                                <div class="form-group">
                                    <label id="clinic-name-label" for="clinic-name"><strong>Clinic Name</strong></label>
                                    <input type="text" name="clinic_name" class="form-control" id="Clinic-name" placeholder="Clinic Name" value="<?php echo $row['clinic_name']; ?>" required />
                                </div>
                            </div>

                            <div class="column-50">
                                <div class="form-group">
                                    <label id="licence-no-label" for="licence-no"><strong>Clinic Licence Number</strong></label>
                                    <input type="number" name="licence_no" class="form-control" id="licence-no" placeholder="Clinic Licence Number" value="<?php echo $row['licence_no']; ?>" required />
                                </div>
                            </div>

                            <div class="column-100">
                                <div class="form-group">
                                    <label id="address-label" for="address"><strong>Clinic Address</strong></label>
                                    <input type="text" name="address" class="form-control" id="address" placeholder="Clinic Address" value="<?php echo $row['address']; ?>" required />
                                </div>
                            </div>

                            <div class="column-50">
                                <div class="form-group">
                                    <label id="city-label" for="city"><strong>City</strong></label>
                                    <input type="text" name="city" class="form-control" id="city" placeholder="City" value="<?php echo $row['city']; ?>" required />
                                </div>
                            </div>

                            <div class="column-50">
                                <div class="form-group">
                                    <label id="pin-label" for="pin-code"><strong>Pin Code</strong></label>
                                    <input type="number" name="pin_code" class="form-control" id="pin-code" placeholder="Pin-code" value="<?php echo $row['pin_code']; ?>" required />
                                </div>
                            </div>

                            <div class="column-50">
                                <div class="form-group">
                                    <label id="phn-label" for="phn-no"><strong>Contact Number</strong></label>
                                    <input type="tel" name="contact_no" class="form-control" id="phn-no" placeholder="Phone Number" value="<?php echo $row['contact_no']; ?>" required />
                                </div>
                            </div>

                            <div class="column-50">
                                <div class="form-group">
                                    <label id="email-label" for="email"><strong>Email</strong></label>
                                    <input type="email" name="email" class="form-control" id="email" placeholder="Email address" value="<?php echo $row['email']; ?>" required />
                                </div>
                            </div>

                            <div class="column-100">
                                <div class="form-group">
                                    <label id="upi-label" for="upi-id"><strong>Clinic UPI ID</strong></label>
                                    <input type="text" name="clinic_upi_id" class="form-control" id="upi" placeholder="UPI ID" value="<?php echo $row['clinic_upi_id']; ?>" required />
                                </div>
                            </div>

                            <div class="column-50">
                                <div class="form-group">
                                    <label id="submit-label" for="submit"></label>
                                    <input id="submit" type="submit" value="Update" name="update" class="btn" />
                                </div>
                            </div>

                            <div class="column-50">
                                <div class="form-group">
                                    <a href="/public/dashboard/managementDash.php">
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