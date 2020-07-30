<?php
/*echo "test5";
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
}*/
	$file = "https://samples.openweathermap.org/data/2.5/weather?lat=35&lon=139&appid=439d4b804bc8187953eb36d2a8c26a02";
	$data = file_get_contents($file);
	$data = mb_substr($data, strpos($data, '{'));
	$data = mb_substr($data, 0, -1);
	$result = json_decode($data, true);
	echo $result;
?> 
