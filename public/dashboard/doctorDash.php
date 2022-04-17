<?php
include "../config.php";
session_start();
if ($_SESSION["loggedIn"]) {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <link rel="stylesheet" type="text/css" href="/assets/css/DocDash.css" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Doctor Dashboard</title>
    </head>

    <body>
        <?php
        $uname =  $_SESSION["uname"];
        $sql = "SELECT * FROM doctor WHERE username='$uname'";

        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        if ($row) {
        ?>
            <header id="header">
                <div class="logo">
                    <a href="/index.php">
                        <img class="logo-img" id="header-img" src="/assets/images/doceasy/doceasy-doctor-logo.svg" alt="DocEasy logo" />
                    </a>
                </div>

                <nav id="nav-bar">
                    <ul>
                        <li><a class="nav-link" href="#"><?php echo $row["full_name"];  ?></a></li>
                        <li><a class="nav-link" href="#"><?php echo $row["specialization"];  ?></a></li>
                        <li><a class="nav-link" href="../logout/docLogout.php">Logout</a></li>
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
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">Customer Support</a></li>
                            <li><a href="/index.php#contact">Contact</a></li>
                        </ul>
                        <div id="copyright">Copyright &#169; DocEasy 2022</div>
                    </div>
                </footer>
            </main>
    </body>


<?php
        }
    } else {
        header("Location: ../login/DocLogin.php");
    }
?>

    </html>