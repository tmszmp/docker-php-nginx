<?php
	header('Access-Control-Allow-Origin: *');
	header('Content-Type: application/json');
	include_once 'api/config/Database.php';
	include_once 'api/models/Cities.php';
	include_once 'api/models/Wetter.php';

	$methode = $_SERVER['REQUEST_METHOD'];
	$req = explode('/', trim($_SERVER['REQUEST_URI'],'/'));
	echo var_dump($req);
	switch($req[1]){
		case 'plz':
			$plz = $req[2];
			break;
	}
	switch ($methode) {
	  case 'GET':
		$database = new Database();
		$db = $database->connect();
		$post = new Cities($db);
		$stmt = $post->read($plz);
		$result = $stmt->get_result();
		$posts_arr = array();
		$posts_arr['city-data'] = array();
		$posts_arr['wetter-data'] = array();
		while($row = $result->fetch_assoc()) {
			$arr = explode(',', $row['geo_point']);
			$lat = $arr[0];
			$lon = $arr[1];
		   	$post_item = array( 'id' => $row['ID'], 'lon' => $lon, 'lat' => $lat,'name' => $row['name'], 'plz' => $row['plz']);
			array_push($posts_arr['city-data'], $post_item);
		}
		$wetter = new Wetter();
		$city = $posts_arr["city-data"];
		$wetter_arr = $wetter->read($city[0]["lat"],$city[0]["lon"]);
		array_push($posts_arr['wetter-data'], $wetter_arr);
		echo json_encode($posts_arr);
	    break;
	  case 'POST':
	    break;
	  case 'PUT':
	    break;
	  case 'DELETE':
	    break;
	}	


	

?>