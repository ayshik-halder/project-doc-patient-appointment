<?php
include "../config.php";
session_start();
if ($_SESSION["loggedIn"]) {
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <link rel="stylesheet" type="text/css" href="/assets/css/userHistory.css" />
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>

    <body>

        <?php
        $uname =  $_SESSION["uname"];

        $sql = "SELECT * 
                FROM test, clinic, management 
                WHERE clinic.id = management.clinic_id AND clinic.id = test.clinic_id AND management.username='$uname' 
                ORDER BY test_type";
        

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
                        <li><a class="nav-link" href="#"><?php echo $row["full_name"];  ?></a></li>
                        <li><a class="nav-link" href="/public/dashboard/managementDash.php">Exit</a></li>
                        <li><a class="nav-link" href="/public/logout/managementLogout.php">Logout</a></li>
                    </ul>
                </nav>
            </header>
            <main>
                <section id="table">
                    <div class="container">
                        <div class="card">
                            <table>
                                <tr>
                                   
                                    <th>TEST TYPE</th>
                                    <th>START TIME</th>
                                    <th>END TIME</th>
                                    <th>STARTING FEE</th>
                                    <th>MAXIMUM FEE</th>
                                </tr>

                                <?php
                                                               
                                while ($row = $result->fetch_assoc()) {
                                ?>
                                    <tr>
                                    <td> <?php echo $row["test_type"]; ?> </td>
                                    <td> <?php echo $row["end_time"]; ?> </td>
                                    <td> <?php echo $row["start_time"]; ?> </td>
                                    <td> <?php echo $row["minimum_fee"]; ?> </td>
                                    <td> <?php echo $row["maximum_fee"]; ?> </td>
                                    </tr>
                                   
                                <?php } 
                                ?>
                               
                            </table>
                        </div>
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