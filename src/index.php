<?php
echo "test6";
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

$query = 'SELECT * FROM cities WHERE 1 ORDER BY name LIMIT 0,10';
$stmt = $conn->prepare($query);
$stmt->execute();
$result = $stmt->get_result();
while($row = $result->fetch_assoc()) {
   echo json_encode($row);
}



?> 
