<?php
include("../config.php");
?>
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
    <main>
        <?php

        $flag = true;

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $clinic_name = $_POST['clinic_name'];
            $user_type = $_POST['user_type'];
            $name = $_POST['name'];
            $email = $_POST['email'];
            $message_type = $_POST['message_type'];
            $message = $_POST['message'];
            $attach_file = $_POST['attach_file'];

            date_default_timezone_set('Asia/Kolkata');
            $date = date('d-m-Y H:i:s');

            // submit form if validated successfully
            if ($flag) {

                $query = "INSERT INTO clinic_feedback(user_type, name, email, message_type, message, attach_file, date_time)
                VALUES('$user_type', '$name', '$email', '$message_type', '$message', '$attach_file', '$date')";

                if ($conn->query($query)) {

                    $query_id = "UPDATE clinic_feedback
                     SET clinic_id = (SELECT id
                                      FROM clinic
                                      WHERE clinic.clinic_name = '$clinic_name')
                     WHERE clinic_id IS NULL;";

                    if ($conn->query($query_id)) {
                    } else {
                        echo "failed" . $conn->error;
                    }
                } else {
                    echo "failed" . $conn->error;
                }
            }
        }


        ?>
        <section id="contact">
            <h2>Contact Clinic</h2>
            <div class="grid">
                <div class="column-60">
                    <form id="form" action=" " method="POST">

                        <div class="form-group">
                            <label id="cname-label" for="clinic-name"><strong>Clinic Name</strong></label>
                            <select name="clinic_name" id="clinic-name" class="form-control">
                                <option selected>Choose Clinic</option>
                                <?php
                                $query_clinic = "SELECT * FROM clinic";
                                $result_clinic = $conn->query($query_clinic);
                                while ($row = $result_clinic->fetch_array()) {
                                    $clinic_name = $row['clinic_name'];
                                ?>
                                    <option><?php echo $clinic_name ?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label id="user-type-label" for="user-type">User Type</label>
                            <select name="user_type" id="user-type" class="form-control">
                                <option selected>Choose User Type</option>
                                <?php
                                $user_type = array('PATIENT', 'DOCTOR');
                                sort($user_type, SORT_STRING);

                                foreach ($user_type as $items) { ?>
                                    <option> <?php echo $items ?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label id="name-label" for="name">Name</label>
                            <input type="text" name="name" class="form-control" id="name" placeholder="Name" value="<?php $name ?>" />
                        </div>

                        <div class="form-group">
                            <label id="email-label" for="email">Email</label>
                            <input type="email" name="email" class="form-control" id="email" placeholder="Email address" value="<?php $email ?>" />
                        </div>

                        <div class="form-group">
                            <label id="message-type-label" for="message-type">Message Type</label>
                            <select name="message_type" id="message-type" class="form-control">
                                <option selected>Choose your message Type</option>
                                <?php
                                $message_type = array('Query', 'Complain', 'Feedback');
                                sort($message_type, SORT_STRING);

                                foreach ($message_type as $items) { ?>
                                    <option> <?php echo $items ?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <p>Message</p>
                            <textarea id="message" class="input-textarea" name="message" placeholder="Enter your message here..." value="<?php $message ?>"></textarea>
                        </div>

                        <div class="form-group">
                            <label id="document-label" for="document-type">Attach Document</label>
                            <input type="file" name="attach_file" class="form-control" id="document" value="<?php $attach_file ?>" />
                        </div>

                        <div class="form-group">
                            <label id="submit-label" for="submit"></label>
                            <input id="submit" type="submit" value="Submit" class="btn" />
                        </div>

                    </form>
                </div>

                <div class="column-40">
                    <div class="image-div">
                        <img src="/assets/images/contact.svg" alt="Contact icon" width="472" height="495" />
                    </div>
                </div>
            </div>
        </section>
    </main>
</body>

</html>