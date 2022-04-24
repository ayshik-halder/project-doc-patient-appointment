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
            <p>Not yet a user?</p>
            <li><a class="nav-link" href="../../index.php#register"><u>Register</u></a></li>
          </ul>
        </nav>
      </header>

    <main>
        <section id="register">
            <h2>Login at DocEasy</h2>
            <div class="container">
                <!-- Patient Login  -->
                <div class="card" id="patient">
                    <div class="product-logo">
                        <img class="logo-img" src="../../assets/images/doceasy/doceasy-patient-logo.svg"
                            alt="DocEasy logo" />
                    </div>
                    <div class="desc">
                        <h3>Features</h3>
                        <ol>
                            <li>Easily personalise your details</li>
                            <li>Every Doctor you choose is well approved</li>
                            <li>Easy to use dashboard for accessibility</li>
                            <li>Track multiple appointments for various departments</li>
                            <li>Weekly & monthly reports to share with your doctor</li>
                        </ol>
                    </div>
                    <a href="PatientLogin.php">
                        <button class="btn">Login</button>
                    </a>
                </div>


                <!-- Doctor Login  -->
                <div class="card" id="doctor">
                    <div class="product-logo">
                        <img class="logo-img" src="../../assets/images/doceasy/doceasy-doctor-logo.svg"
                            alt="DocEasy for doctors logo" />
                    </div>
                    <div class="desc">
                        <h3>Features</h3>
                        <ol>
                            <li>Know your Patients</li>
                            <li>Manage and keep track of patient's appointments</li>
                            <li>Choose your clinic address</li>
                            <li>Personalise area of expertise and qualifications</li>
                            <li>Cross-device syncing</li>
                        </ol>
                    </div>
                    <a href="DocLogin.php">
                        <button class="btn">Login</button>
                    </a>
                </div>
                <div class="card" id="management">
                    <div class="product-logo">
                        <img class="logo-img" src="../../assets/images/doceasy/doceasy-patient-logo.svg"
                            alt="DocEasy logo" />
                    </div>
                    <div class="desc">
                        <h3>Features</h3>
                        <ol>
                            <li>Easily personalise your details</li>
                            <li>Every Doctor you choose is well approved</li>
                            <li>Easy to use dashboard for accessibility</li>
                            <li>Track multiple appointments for various departments</li>
                            <li>Weekly & monthly reports to share with your doctor</li>
                        </ol>
                    </div>
                    <a href="ManagementLogin.php">
                        <button class="btn">Login</button>
                    </a>
                </div>
                
            </div>
        </section>

        <footer>
            <div id="footer-logo">
              <img class="logo-img" src="../../assets/images/doceasy/doceasy-logo-white.svg" alt="Doceasy logo" />
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

</html>