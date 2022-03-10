<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet" type="text/css" href="/assets/css/DocRegister.css" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="description" content="Doctor Patient Appointment System" />
  <title>Doctor Registration</title>
</head>

<body>
  <header id="header">
    <div class="logo">
      <a href="../../index.php">
        <img class="logo-img" id="header-img" src="../../assets/images/doceasy/doceasy-doctor-logo.svg" alt="DocEasy logo" />
      </a>
    </div>

    <nav id="nav-bar">
      <ul>
        <p>Already a User?</p>
        <li><a class="nav-link" href="../login/login.php"><u>Login</u></a></li>
      </ul>
    </nav>
  </header>
  
  <main>
    <section id="registration">
      <h2>Doctor Registration Form</h2>
      <div class="grid">
        <form id="form" action="#">

          <div class="column-50">
            <!-- add link in action  -->
            <div class="form-group">
              <label id="fname-label" for="first-name"><strong>First Name</strong></label>
              <input type="text" name="first-name" class="form-control" id="first-name" placeholder="First Name"
                required />
            </div>
          </div>

          <div class="column-50">
            <div class="form-group">
              <label id="lname-label" for="last-name"><strong>Last Name</strong></label>
              <input type="text" name="last-name" class="form-control" id="last-name" placeholder="Last Name"
                required />
            </div>
          </div>

          <div class="column-50">
            <div class="form-group">
              <label id="dob-label" for="dob"><strong>DOB</strong></label>
              <input type="date" name="dob" class="form-control" id="dob" placeholder="date of Birth" required />
            </div>
          </div>

          <div class="column-50">
            <div class="form-group">
              <label id="age-label" for="age"><strong>Age</strong></label>
              <input type="number" name="age" class="form-control" id="age" placeholder="Age" />
            </div>
          </div>

          <div class="column-100">
            <div class="form-group">
              <p><strong>Gender</strong></p>
              <span id="gender-span">
                <label id="span" for="male"><input type="radio" id="male" name="gender" value="male"> &nbsp; Male</label>
                <label id="span" for="female"><input type="radio" id="female" name="gender"
                    value="female"> &nbsp; Female</label>
                <label id="span" for="other"><input type="radio" id="other" name="gender" value="other"> &nbsp; Other</label>
              </span>
            </div>
          </div>

          <div class="column-50">
            <div class="form-group">
              <label id="specialization-label" for="specialization"><strong>Specialization</strong></label>
              <input type="text" name="specialization" class="form-control" id="specialization" placeholder="Department"
                required />
            </div>
          </div>

          <div class="column-50">
            <div class="form-group">
              <label id="experience-label" for="experience"><strong>Work Experience</strong></label>
              <input type="number" name="experience" class="form-control" id="experience" placeholder="Number of Year"
                required />
            </div>
          </div>

          <div class="column-50">
            <div class="form-group">
              <label id="phn-label" for="phn-no"><strong>Phone Number</strong></label>
              <input type="tel" name="phn-no" class="form-control" id="phn-no" placeholder="Phone Number" />
            </div>
          </div>

          <div class="column-50">
            <div class="form-group">
              <label id="email-label" for="email"><strong>Email</strong></label>
              <input type="email" name="email" class="form-control" id="email" placeholder="Email address" required />
            </div>
          </div>

          <div class="column-100">
            <div class="form-group">
              <label id="cname-label" for="clinic-name"><strong>Clinic Name</strong></label>
              <input type="text" name="clinic-name" class="form-control" id="clinic-name" placeholder="Clinic Name"
                required />
            </div>
          </div>

          <div class="column-100">
            <div class="form-group">
              <label id="address-label" for="address"><strong>Clinic Address</strong></label>
              <input type="text" name="address" class="form-control" id="address" placeholder="Clinic Address"
                required />
            </div>
          </div>

          <div class="column-50">
            <div class="form-group">
              <label id="city-label" for="city"><strong>City</strong></label>
              <input type="text" name="city" class="form-control" id="city" placeholder="City" required />
            </div>
          </div>

          <div class="column-50">
            <div class="form-group">
              <label id="pin-label" for="pin-code"><strong>Pin Code</strong></label>
              <input type="number" name="pin-code" class="form-control" id="pin-code" placeholder="Pin-code" required />
            </div>
          </div>

          <div class="column-100">
            <div class="form-group">
              <label id="username-label" for="username"><strong>Username</strong></label>
              <input type="text" name="username" class="form-control" id="username" placeholder="Username" required />
            </div>
          </div>

          <div class="column-50">
            <div class="form-group">
              <label id="password-label" for="password"><strong>Password</strong></label>
              <input type="password" name="password" class="form-control" id="password" placeholder="Password"
                required />
            </div>
          </div>

          <div class="column-50">
            <div class="form-group">
              <label id="c-password-label" for="c-password"><strong>Confirm Password</strong></label>
              <input type="password" name="c-password" class="form-control" id="c-password"
                placeholder="Re-enter the Password" required />
            </div>
          </div>

          <div class="column-50">
            <div class="form-group">
              <label id="submit-label" for="submit"></label>
              <input id="submit" type="submit" value="Submit" class="btn" />
            </div>
          </div>

          <div class="column-50">
            <div class="form-group">
              <a href="../../index.php">
                <label id="back-label" for="back"></label>
                <input id="back" type="button" value="back" class="btn" />
              </a>
            </div>
          </div>

        </form>
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

</html>