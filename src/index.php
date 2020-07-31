<?php
	header('Access-Control-Allow-Origin: *');
	header('Content-Type: application/json');
	include_once 'config/Database.php';
	include_once 'models/Cities.php';
	include_once 'models/Wetter.php';
	$plz = null;
	$methode = $_SERVER['REQUEST_METHOD'];
	$req = explode('/', trim($_SERVER['REQUEST_URI'],'/'));
	switch ($methode) {
	  case 'GET':
		$database = new Database();
		$db = $database->connect();
		$post = new Cities($db);
		$result = null;
		switch($req[1]){
			case 'plz':
				$plz = $req[2];
				$stmt = $post->read_plz($plz);
				$result = $stmt->get_result();
				break;
			case 'ort':
				$ort = $req[2];
				$stmt = $post->read_ort($ort);
				$result = $stmt->get_result();
				break;
		}
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