<?php
echo "test";
$servername = "10.7.252.12";
$username = "root";
$password = "test";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
?> 
