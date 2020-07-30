<?php
	header('Access-Control-Allow-Origin: *');
	header('Content-Type: application/json');
	$plz =  "04435";//$_POST['plz'];
	include_once '../../config/Database.php';
	include_once '../../models/Post.php';
	//include_once '../../models/Wetter.php';

	$database = new Database();
	$db = $database->connect();
	$post = new Post($db);
	$stmt = $post->read($plz);
	$result = $stmt->get_result();
	$posts_arr = array();
	$posts_arr['city-data'] = array();
	$posts_arr['wetter-data'] = array();
	echo "test0";
	while($row = $result->fetch_assoc()) {
	   $post_item = array( 'id' => $row['ID'], 'geo_point' => $row['geo_point'], 'name' => $row['name'], 'plz' => $row['plz']);
	array_push($posts_arr['city-data'], $post_item);
	}
	echo "test1";
	/*$wetter = new Wetter();
	$arr = explode(',', $posts_arr["city-data"]["geo_point"]);
	$lat = $arr[0];
	$lon = $arr[1];
	echo "test2";
	$wetter_arr = $wetter->read($lat,$lon);
	array_push($posts_arr['wetter-data'], $wetter_arr);
*/
	echo json_encode($posts_arr);

?>