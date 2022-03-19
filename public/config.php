<?php

$dbhost = "localhost";
$dbuser = "user1";
$dbpass = "user1";
$db = "doceasy";

$conn = new mysqli($dbhost, $dbuser, $dbpass, $db);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->error);
} else {
  echo "Connected successfully";
}

?>