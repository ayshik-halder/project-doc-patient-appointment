<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet" type="text/css" href="/assets/css/style.css" />
  <!-- Font Awsome  -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="description" content="Doctor Patient Appointment System" />
  <title></title>
</head>

<body>
  <header id="header">
    <div class="logo">
      <a href="#hero">
        <img class="logo-img" id="header-img" src="assets/images/doceasy/doceasy-logo.svg" alt="DocEasy logo" />
      </a>
    </div>

    <nav id="nav-bar">
      <ul>
        <li><a class="nav-link" href="#why">Why</a></li>
        <li><a class="nav-link" href="#features">Features</a></li>
        <li><a class="nav-link" href="public/login/login.php">Login</a></li>
        <li><a class="nav-link" href="#register">Register</a></li>
        <li><a class="nav-link" href="#team">Team</a></li>
        <li><a class="nav-link" href="#contact">Contact Us</a></li>
      </ul>
    </nav>
  </header>

  <main>
    <section id="hero">
      <div class="grid">
        <div class="column-60">
          <h1>Need doctors at your fingertips ?</h1>
          <p id="description">
            Spend time with your family but not with booking Doctor appointments.
            <b>DocEasy</b> helps you book appointments in 1 minute .
          </p>
          <a href="public/login/login.php">
            <button class="btn">Login</button>
          </a>
        </div>
        <div class="columnx-40">
          <div class="image-div">
            <img id="hero-img" src="assets/images/doceasy/doceasy-home-img.svg" alt="DocEasy mobile app" width="520" height="288" />
          </div>
        </div>
      </div>
    </section>

    <section id="why">
      <h2>Why you should choose DocEasy</h2>
      <div class="container">
        <div class="card">
          <div class="icon">
            <img src="assets/images/easyToUse.svg" alt="easy to use icon" />
          </div>
          <div class="desc">
            <h3>Easy to Use</h3>
            <p>
              Manage your appointments with our user-friendly website. Book
              convenient appointments and stay connected to your caregivers.
            </p>
          </div>
        </div>

        <div class="card">
          <div class="icon">
            <img src="assets/images/dataPrivacy.svg" alt="data privacy icon" />
          </div>
          <div class="desc">
            <h3>Data Privacy</h3>
            <p>
              Let nobody know what you and your doctors know. We don't hand
              over personal data to third parties.
            </p>
          </div>
        </div>

        <div class="card">
          <div class="icon">
            <img src="assets/images/research.svg" alt="data privacy icon" />
          </div>
          <div class="desc">
            <h3>Peace of Mind</h3>
            <p>
              We use our expertise to improve the healthcare system. Book only
              doctors verified by us.
            </p>
          </div>
        </div>
      </div>
    </section>

    <section id="register">
      <h2>Register Yourself at DocEasy</h2>
      <div class="container">
        <!-- Patient Register  -->
        <div class="card" id="patient">
          <div class="product-logo">
            <img class="logo-img" src="assets/images/doceasy/doceasy-patient-logo.svg" alt="DocEasy logo" />
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
          <a href="public/register/PatientRegister.php">
            <button class="btn">Register</button>
          </a>
        </div>
        <!-- Doctor Register  -->
        <div class="card" id="doctor">
          <div class="product-logo">
            <img class="logo-img" src="assets/images/doceasy/doceasy-doctor-logo.svg" alt="DocEasy for doctors logo" />
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
          <a href="public/register/DocRegister.php">
            <button class="btn">Register</button>
          </a>
        </div>
      </div>
    </section>

    <section id="features">
      <h2>Awesome Key Features</h2>
      <div class="grid">
        <div class="column-40">
          <div class="image-div">
            <img src="/assets/images/doceasy/doceasy-feature.png" alt="doceasy-feature" width="330" height="507" />
          </div>
        </div>

        <div class="column-60">
          <ol>
            <li>
              <h3 id="pills">Worried about missing appointments ?</h3>
              <p>
                Never miss your appointments.Get SMS & email notification
                prior to your scheduled appointments booked using DocEasy.
              </p>
            </li>
            <li>
              <h3 id="med-report">Need user-friendly experience ?</h3>
              <p>
                DocEasy provides users with easy to view and accessible
                dashboard for hassleless "One Click" appointment booking. Post
                appointment reports are auto generated for a seamless
                experience.
              </p>
            </li>
            <li>
              <h3 id="family">Confused about whom to trust ?</h3>
              <p>
                Our doctors are well verified and experienced to treat you for
                all your needs. Our clinic's are also well filled with well
                versed doctors from multiple departments.
              </p>
            </li>
            <li>
              <h3 id="doctor-icon">Know your Doctor ?</h3>
              <p>
                Get to know your doctor from your Dashboard before you book
                your appointment. View doctor's education and work background.
                All our doctor's have excellent medical background and
                sufficient experience in their respective fields.
              </p>
            </li>
          </ol>
        </div>
      </div>
    </section>

    <section id="info">
      <div>
        <h2>Medication Adherence</h2>
        <p>
          Medication adherence is the extent to which a person???s behaviour
          (taking medication, following a diet, and/or executing lifestyle
          changes) corresponds with agreed recommendations from a health care
          provider
        </p>
        <p>
          A World Health Organization report on adherence to long-term
          therapies suggests that patients adhere to only 50% of drugs
          prescribed for chronic diseases in developed nations, a figure that
          is even lower in developing countries.
        </p>
      </div>
      <!-- <iframe
          id="video"
          height="315"
          src="https://www.youtube.com/embed/jccBSbyActg?rel=0&amp;controls=0&amp;showinfo=0"
          allowfullscreen
        ></iframe> -->
    </section>

    <!-- Team Member  -->
    <section id="team">
      <h2>Meet our Founders</h2>

      <div class="container">
        <div class="card">
          <div class="icon">
            <img src="/assets/images/Team/ayshik.svg" alt="ayshik-img" />
          </div>
          <div class="desc">
            <h3>Ayshik Halder</h3>
            <p>
              <b>Full Stack</b>
              <br />
            </p>
          </div>
        </div>

        <div class="card">
          <div class="icon">
            <img src="/assets/images/Team/dolon.svg" alt="dolon-img" />
          </div>
          <div class="desc">
            <h3>Dolon Roy</h3>
            <p>
              <b>Database Management</b>
            </p>
          </div>
        </div>

        <div class="card">
          <div class="icon">
            <img src="/assets/images/Team/arif.svg" alt="arif-img" />
          </div>
          <div class="desc">
            <h3>Sk. Arif</h3>
            <p>
              <b>Support Frontend</b>
            </p>
          </div>
        </div>

        <div class="card">
          <div class="icon">
            <img src="/assets/images/Team/sutista.svg" alt="sutista-img" />
          </div>
          <div class="desc">
            <h3>Sutista Guin</h3>
            <p>
              <b>Support Frontend</b>
            </p>
          </div>
        </div>
      </div>
    </section>

    <section id="contact">
      <h2>Contact</h2>
      <div class="grid">
        <div class="column-60">
          <form id="form" action="/public/feedback/doceasyFeedback.php" method="POST">

            <div class="form-group">
              <label id="name-label" for="name">Name</label>
              <input type="text" name="name" class="form-control" id="name" placeholder="Name" value="<?php $name ?>" required />
            </div>

            <div class="form-group">
              <label id="email-label" for="email">Email</label>
              <input name="email" class="form-control" id="email" type="email" placeholder="Email address" value="<?php $email ?>" required />
            </div>

            <div class="form-group">
              <p>Message</p>
              <textarea id="message" class="input-textarea" name="message" placeholder="Enter your message here..." value="<?php $message ?>" required></textarea>
            </div>

            <div class="form-group">
              <label id="submit-label" for="submit"></label>
              <input id="submit" type="submit" value="Submit" class="btn" />
            </div>

          </form>
        </div>

        <div class="column-40">
          <div class="image-div">
            <img src="assets/images/contact.svg" alt="Contact icon" width="472" height="495" />
          </div>
        </div>
      </div>
    </section>

    <footer>
      <div id="footer-logo">
        <img class="logo-img" src="assets/images/doceasy/doceasy-logo-white.svg" alt="Doceasy logo" />
      </div>
      <div id="footer-info">
        <ul>
          <li><a href="/public/login/adminLogin.php">Admin Login</a></li>
          
          <li><a href="#contact">Contact</a></li>
        </ul>
        <div id="copyright"> Copyright &#169; DocEasy 2022</div>
      </div>
    </footer>
  </main>
</body>

</html>