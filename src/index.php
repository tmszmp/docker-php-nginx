<?php
echo "test8";
$methode = $_SERVER['REQUEST_METHOD'];
$req = explode('/', trim($_SERVER['REQUEST_URI'],'/'));
echo var_dump($req);
/*
$servername = "10.7.252.12";
$username = "root2";
$password = getenv('MYSQL_ROOT_PASSWORD');
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
*/


?> 
