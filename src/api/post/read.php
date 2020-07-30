<?php
	header('Access-Control-Allow-Origin: *');
	header('Content-Type: application/json');

	include_once '../../config/Database.php';
	include_once '../../models/Post.php';

	$database = new Database();
	$db = $database->connect();

	$post = new Post($db);

	$stmt = $post->read();
	$result = $stmt->get_result();
	//$num = $result->rowCount();

	//if($num > 0){
		$posts_arr = array();
		$posts_arr['data'] = array();
		while($row = $result->fetch_assoc()) {
		   $post_item = array( 'id' => $row['ID'], 'geo_point' => $row['geo_point'], 'name' => $row['name'], 'plz' => $row['plz']);
		   array_push($posts_arr['data'], $post_item);
		}
		echo json_encode($posts_arr);
	//}else{
//		echo json_encode(array('message' => 'Nothing Found'));
//	}

?>