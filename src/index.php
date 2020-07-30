<?php
echo "test5";
$servername = "10.7.252.12";
$username = "root2";
$password = "test";
$db = "cities";

// Create connection
$conn = new mysqli($servername, $username, $password, $db);

// Check connection
if ($conn->connect_error) {
	echo "failure";
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

$query = 'SELECT * FROM cities ORDER BY name LIMIT 0,10';
$stmt = $conn->prepare($query);
$stmt->execute();
while($row = $statement->fetch()) {
   echo json_encode($row);
}
?> 
