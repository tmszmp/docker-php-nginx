<?php
$pdo = new PDO('mysql:host=10.7.252.12;dbname=cities', 'root', 'test');
 
$sql = "SELECT * FROM cities LIMIT 0,10";
foreach ($pdo->query($sql) as $row) {
   echo $row['ID']."<br />";
   echo $row['geo_point']."<br />";
   echo $row['name']."<br />";
   echo $row['plz']."<br /><br />";
}

/*echo "test4";
$servername = "10.7.252.12";
$username = "root";
$password = "test";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
	echo "failure";
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
*/
?> 
