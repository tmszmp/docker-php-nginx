<?php
	header('Access-Control-Allow-Origin: *');
	header('Content-Type: application/json');
	$plz = $_POST['plz'];
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
	   $post_item = array( 'id' => $row['ID'], 'geo_point' => $row['geo_point'], 'name' => $row['name'], 'plz' => $row['plz']);
	array_push($posts_arr['city-data'], $post_item);
	}
	$wetter = new Wetter();
	$wetter_arr = $wetter->read($posts_arr["data"]["coord"]["lat"],$posts_arr["data"]["coord"]["lon"]);
	array_push($posts_arr['wetter-data'], $wetter_arr);

	echo json_encode($posts_arr);

?>