<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" type="text/css" href="/assets/css/userLogin.css" />

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
                <li><a class="nav-link" href="#"><u> Register </u></a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section id="registration">
            <div class="container">
                <div class="card">
                    <h2>Admin Login Form</h2>
                    <div class="grid">
                        <form id="form" action="#">
                            <div class="form-group">
                                <label id="username-label" for="username"><strong>Username</strong></label>
                                <input type="text" name="username" class="form-control" id="username" placeholder="Username" required />
                            </div>
                            <div class="form-group">
                                <label id="password-label" for="password"><strong>Password</strong></label>
                                <input type="password" name="password" class="form-control" id="password" placeholder="Password" required />
                            </div>
                            <div class="form-group">
                                <div id="button-group">
                                    <label id="submit-label" for="submit"></label>
                                    <input id="submit" type="submit" value="Submit" class="btn" />
                                    <label id="back-label" for="back"></label>
                                    <a href="/index.php">
                                        <input id="back" type="back" value="back" class="btn" />
                                    </a>
                                </div>
                            </div>

                            <div class="form-group">
                                <p>
                                    Not yet a user?
                                    <a href="#"><u> Register </u></a>
                                </p>
                            </div>
                        </form>
                    </div>
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
                    <li><a href="#contact">Contact</a></li>
                </ul>
                <div id="copyright">Copyright &#169; DocEasy 2022</div>
            </div>
        </footer>

    </main>
</body>