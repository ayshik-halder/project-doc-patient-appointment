<?php

 $dbhost = "localhost";
 $dbuser = "user1";
 $dbpass = "user1";
 $db = "doceasy";

$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

?>