<?php
$servername = "localhost:3307"; # sdshd
$username = "root";
$password = "";
$dbname = "test_project1";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
// echo "Connected successfully";
?>