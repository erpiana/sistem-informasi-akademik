<?php
$servername = "localhost";
$username = "user_pia";  
$password = "pia123";     
$dbname = "ap_akademik"; 

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>
