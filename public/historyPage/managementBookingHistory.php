<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" type="text/css" href="/assets/css/login.css" />
    <!-- Font Awsome  -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="Doctor Patient Appointment System" />
    <title></title>
</head>

<body>
    <header id="header">
        <div class="logo">
          <a href="/index.php">
            <img class="logo-img" id="header-img" src="/assets/images/doceasy/doceasy-logo.svg" alt="DocEasy logo" />
          </a>
        </div>
    
        <nav id="nav-bar">
          <ul>
            <li><a class="nav-link" href="/public/dashboard/managementDash.php">Exit</a></li>
            <li><a class="nav-link" href="/public/logout/managementLogout.php">Logout</a></li>
          </ul>
        </nav>
      </header>

    <main>
        <section id="register">
            <h2>View History</h2>
            <div class="container">
                <!-- Doctor Login  -->
                <div class="card" id="doctor">
                    <div class="product-logo">
                        <img class="logo-img" src="/assets/images/doceasy/doceasy-doctor-logo.svg"
                            alt="DocEasy for doctors logo" />
                    </div>
                    <div class="desc">
                        <h3>Appointments</h3>
                        <ol>
                            <li>View Appointments booked in your clinic</li>
                            <li>Keep track of patient's appointments</li>
                            <li>Cancel appointments</li>
                        </ol>
                    </div>
                    <a href="/public/historyPage/managementAppointmentHistory.php">
                        <button class="btn">View</button>
                    </a>
                </div>
                <div class="card" id="management">
                    <div class="product-logo">
                        <img class="logo-img" src="/assets/images/doceasy/doceasy-logo-mgmt.svg"
                            alt="DocEasy logo" />
                    </div>
                    <div class="desc">
                        <h3>Lab Tests</h3>
                        <ol>
                            <li>View Booked Tests</li>
                            <li>Add Reports</li>
                            <li>View history and cancelled appointments</li>
                            <li>Add new Tests to your clinic</li>
                            <li>Respond to Patient queries</li>
                        </ol>
                    </div>
                    <a href="/public/historyPage/managementTestHistory.php">
                        <button class="btn">View</button>
                    </a>
                </div>
                
            </div>
        </section>

        <footer>
            <div id="footer-logo">
              <img class="logo-img" src="/assets/images/doceasy/doceasy-logo-white.svg" alt="Doceasy logo" />
            </div>
            <div id="footer-info">
              <ul>
                <li><a href="#">Privacy Policy</a></li>
                <li><a href="/index.php#contact" target="_blank">Contact</a></li>
              </ul>
              <div id="copyright">Copyright &#169; DocEasy 2022</div>
            </div>
        </footer>
    </main>
</body>

</html>