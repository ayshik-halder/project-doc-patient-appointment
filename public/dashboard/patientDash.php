<?php
include "../config.php";
session_start();
if ($_SESSION["loggedIn"]) {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <link rel="stylesheet" type="text/css" href="/assets/css/patientDash.css" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Patient Dashboard</title>
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
                    <a href="#hero">
                        <img class="logo-img" id="header-img" src="/assets/images/doceasy/doceasy-patient-logo.svg" alt="DocEasy logo" />
                    </a>
                </div>

                <nav id="nav-bar">
                    <ul>
                        <li><a class="nav-link" href="#team"><?php echo $row["first_name"]." ".$row["last_name"];  ?></a></li>
                        <li><a class="nav-link" href="../logout/logout.php">Logout</a></li>
                    </ul>
                </nav>
            </header>

    </body>

    </html>
<?php
        }
    } else {
        header("Location: ../login/patientLogin.php");
    }
?>