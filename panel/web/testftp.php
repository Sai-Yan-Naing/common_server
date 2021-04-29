<?php
$servername = "db.ethicaldigit.com";
$username = "nph";
$password = "welcome123";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
?>

<!--b name : nph
username: nph
password: welcome123
host name: vm.ethicaldigit.com or 18.140.17.185 -->