<?php
include "../config.php";
session_start();
if ($_SESSION["loggedIn"]) {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <link rel="stylesheet" type="text/css" href="/assets/css/patientDashboard.css" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Management Dashboard</title>
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
                    <a href="/index.php">
                        <img class="logo-img" id="header-img" src="/assets/images/doceasy/doceasy-logo.svg" alt="DocEasy logo" />
                    </a>
                </div>

                <nav id="nav-bar">
                    <ul>
                        <li><a class="nav-link" href="#"><?php echo $row["clinic_name"];  ?></a></li>
                        <li><a class="nav-link" href="#"><?php echo $row["full_name"];  ?></a></li>
                        <li><a class="nav-link" href="../logout/managementLogout.php">Logout</a></li>
                    </ul>
                </nav>
            </header>


            <main>
                <footer>
                    <div id="footer-logo">
                        <img class="logo-img" src="/assets/images/doceasy/doceasy-logo-white.svg" alt="Doceasy logo" />
                    </div>
                    <div id="footer-info">
                        <ul>
                            <li><a href="/public/register/testRegister.php">Diagnosis Register</a></li>
                            <li><a href="/index.php#contact">Contact Admin</a></li>
                        </ul>
                        <div id="copyright">Copyright &#169; DocEasy 2022</div>
                    </div>
                </footer>
            </main>
    </body>


<?php
        }
    } else {
        header("Location: ../login/patientLogin.php");
    }
?>

    </html>