<?php
	header('Access-Control-Allow-Origin: *');
	header('Content-Type: application/json');
	$plz =  "04435";//$_POST['plz'];
	include_once '../../config/Database.php';
	include_once '../../models/Post.php';
	include_once '../../models/Wetter.php';

	$database = new Database();
	$db = $database->connect();
	$post = new Post($db);
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

?>