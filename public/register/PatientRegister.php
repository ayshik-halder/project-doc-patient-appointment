<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet" type="text/css" href="/assets/css/PatientRegister.css" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="description" content="Doctor Patient Appointment System" />
  <title>Patient Registration</title>
</head>

<body>
  <header id="header">
    <div class="logo">
      <a href="../../index.php">
        <img class="logo-img" id="header-img" src="../../assets/images/doceasy/doceasy-patient-logo.svg" alt="DocEasy logo" />
      </a>
    </div>

    <nav id="nav-bar">
      <ul>
        <p>Already a User?</p>
        <li><a class="nav-link" href="../login/PatientLogin.php"><u>Login</u></a></li>
      </ul>
    </nav>
  </header>

  <main>

  <?php

    require_once('../config.php');

    $first_name = $last_name = $dob = $age = $gender = $marital_status = $phn_no = $email = $address = $city = $pin_code = $username = $password = $confirm_password = '';

    $firstNameErr = $lastNameErr = $dobErr = $ageErr = $genderErr = $maritalStatusErr = $phnNoErr = $emailErr = $addressErr = $cityErr = $pinCodeErr = $usernameErr = $passwordErr = $confirmPasswordErr = '';

    $flag = true;

  	if ($_SERVER["REQUEST_METHOD"] == "POST") {

      $first_name = $_POST['first_name'];
      $last_name = $_POST['last_name'];
      $dob = $_POST['dob'];
      $age = $_POST['age'];
      $gender = $_POST['gender'];
      $marital_status = $_POST['marital_status'];
      $phn_no = $_POST['phn_no'];
      $email = $_POST['email'];
      $address = $_POST['address'];
      $city = $_POST['city'];
      $pin_code = $_POST['pin_code'];
      $username = $_POST['username'];
      $password = $_POST['password'];
      $confirm_password = $_POST['confirm_password'];

      if (!$first_name) {
        $firstNameErr = "First name is required";
        $flag = false;
      } else {
        test_input($first_name);
        if(!preg_match("/^[a-zA-Z-' ]*$/", $first_name)) {
          $firstNameErr = "only letters and white spaces allowed";
        }
      }

      if (!$last_name) {
        $lastNameErr = "Last name is required";
        $flag = false;
      } else {
        test_input($last_name);
      }

      if (!$dob) {
        $dobErr = "DOB is required";
        $flag = false;
      } else {
        test_input($dob);
      }

      if (!$age) {
        $ageErr = "Age is required";
        $flag = false;
      } else {
        test_input($age);
      }

      if (!$gender) {
        $genderErr = "Gender is required";
        $flag = false;
      } else {
        test_input($gender);
      }

      if (!$marital_status) {
        $maritalStatusErr = "Marital Status is required";
        $flag = false;
      } else {
        test_input($marital_status);
      }

      if (!$phn_no) {
        $phnNoErr = "Phone Number is required";
        $flag = false;
      } else {
        test_input($phn_no);
      }

      if (!$email) {
        $emailErr = "Email is required";
        $flag = false;
      } else {
        test_input($email);
      }

      if (!$address) {
        $addressErr = "Address is required";
        $flag = false;
      } else {
        test_input($address);
      }

      if (!$city) {
        $cityErr = "City is required";
        $flag = false;
      } else {
        test_input($city);
      }

      if (!$pin_code) {
        $pinCodeErr = "Pin Code is required";
        $flag = false;
      } else {
        test_input($pin_code);
      }

      if (!$username) {
        $usernameErr = "Username is required";
        $flag = false;
      } else {
        test_input($username);
      }

      if (!$password) {
        $passwordErr = "Password is required";
        $flag = false;
      } else {
        test_input($password);
      }

      if (!$confirm_password) {
        $confirmPasswordErr = "Confirm Password is required";
        $flag = false;
      }  elseif ($password && $confirm_password && strcmp($password, $confirm_password) !== 0) {
        $confirmPasswordErr = "Please repeat the password correctly";
        $flag = false;
      } else {
        test_input($confirm_password);
      }

     

		// submit form if validated successfully
      if ($flag) {

        $query = "INSERT INTO patient(first_name, last_name, dob, age, gender, marital_status, phn_no, email, address, city, pin_code, username, password)
        VALUES('$first_name', '$last_name', '$dob', '$age', '$gender', '$marital_status', '$phn_no', '$email', '$address', '$city', '$pin_code', '$username', '$password' )";

        if ($conn->query($query)) {
          header("location: ../dashboard/patientDash.html");
        } else {
          echo "failed" . $conn->error;
        }
      }
    }

    function test_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	  }
    
    $conn->close();
    
    ?>



    <section id="registration">
      <h2>Patient Registration Form</h2>
      <div class="grid">
        <form id="form" action="#" method="POST">
          <div class="column-50">
            <!-- add link in action  -->
            <div class="form-group">
              <label id="fname-label" for="first-name"><strong>First Name</strong></label>
              <input type="text" name="first_name" class="form-control" id="first-name" placeholder="First Name" value="<?php $first_name; ?>" required />
              <p><?php echo $firstNameErr; ?></p>
            </div>
          </div>

          <div class="column-50">
            <div class="form-group">
              <label id="lname-label" for="last-name"><strong>Last Name</strong></label>
              <input type="text" name="last_name" class="form-control" id="last-name" placeholder="Last Name" value="<?php $last_name; ?>" required />
            </div>
          </div>

          <div class="column-50">
            <div class="form-group">
              <label id="dob-label" for="dob"><strong>DOB</strong></label>
              <input type="date" name="dob" class="form-control" id="dob" placeholder="date of Birth" value="<?php $dob; ?>" required />
            </div>
          </div>

          <div class="column-50">
            <div class="form-group">
              <label id="age-label" for="age"><strong>Age</strong></label>
              <input type="number" name="age" class="form-control" id="age" placeholder="Age" value="<?php $age; ?>" />
            </div>
          </div>

          <div class="column-100">
            <div class="form-group">
              <p><strong>Gender</strong></p>
              <span id="gender-span">
                <label id="span" for="male"><input type="radio" id="male" name="gender" value="male" value="<?php $gender; ?>" />&nbsp; Male</label>
                <label id="span" for="female"><input type="radio" id="female" name="gender" value="female" value="<?php $gender; ?>" /> &nbsp; Female</label>
                <label id="span" for="other"><input type="radio" id="other" name="gender" value="other" value="<?php $gender; ?>" /> &nbsp; Other</label>
              </span>
            </div>
          </div>

          <div class="column-100">
            <div class="form-group">
              <p><strong>Marital Status</strong></p>
              <span id="marital-span">
                <label id="span" for="married"><input type="radio" id="married" name="marital_status" value="married" value="<?php $marital_status; ?>" /> &nbsp; Married</label>
                <label id="span" for="unmarried"><input type="radio" id="unmarried" name="marital_status" value="unmarried" value="<?php $marital_status; ?>" /> &nbsp; Unmarried</label>
              </span>
            </div>
          </div>

          <div class="column-50">
            <div class="form-group">
              <label id="phn-label" for="phn-no"><strong>Phone Number</strong></label>
              <input type="tel" name="phn_no" class="form-control" id="phn-no" placeholder="Phone Number" pattern="[0-9]{10}" value="<?php $phn_no; ?>" />
            </div>
          </div>

          <div class="column-50">
            <div class="form-group">
              <label id="email-label" for="email"><strong>Email</strong></label>
              <input type="email" name="email" class="form-control" id="email" placeholder="Email address" value="<?php $email; ?>" required />
            </div>
          </div>

          <div class="column-100">
            <div class="form-group">
              <p><strong>Address</strong></p>
              <textarea id="address" class="input-address" name="address" placeholder="Enter your address here..." value="<?php $address; ?>" ></textarea>
            </div>
          </div>

          <div class="column-50">
            <div class="form-group">
              <label id="city-label" for="city"><strong>City</strong></label>
              <input type="text" name="city" class="form-control" id="city" placeholder="City" value="<?php $city; ?>" required />
            </div>
          </div>

          <div class="column-50">
            <div class="form-group">
              <label id="pin-label" for="pin-code"><strong>Pin Code</strong></label>
              <input type="number" name="pin_code" class="form-control" id="pin-code" placeholder="Pin-code" value="<?php $pin_code; ?>" required />
            </div>
          </div>

          <div class="column-100">
            <div class="form-group">
              <label id="username-label" for="username"><strong>Username</strong></label>
              <input type="text" name="username" class="form-control" id="username" placeholder="Username" value="<?php $username; ?>" required />
            </div>
          </div>

          <div class="column-50">
            <div class="form-group">
              <label id="password-label" for="password"><strong>Password</strong></label>
              <input type="password" name="password" class="form-control" id="password" placeholder="Password" value="<?php $password; ?>" required />
            </div>
          </div>

          <div class="column-50">
            <div class="form-group">
              <label id="c-password-label" for="c-password"><strong>Confirm Password</strong></label>
              <input type="password" name="confirm_password" class="form-control" id="c-password" placeholder="Re-enter the Password" value="<?php $confirm_password; ?>" required />
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