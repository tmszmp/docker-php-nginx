<?php
	class Post {
		private $conn;
		private $table = 'cities';

		public function __construct($db){
			$this->conn = $db;
		}

		public function read(){
			echo 'test';
			$query = 'SELECT * FROM cities WHERE 1 ORDER BY name LIMIT 0,10';
			$stmt = $this->conn->prepare($query);
			$stmt->execute();
			echo 'test3';
			return $stmt;
		}
	}
?>