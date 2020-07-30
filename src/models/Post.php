<?php
	class Post {
		private $conn;
		private $table = 'cities';

		public function __construct($db){
			$this->conn = $db;
		}

		public function read($plz){
			$query = 'SELECT * FROM cities WHERE plz LIKE ? ORDER BY name LIMIT 0,10';
			$stmt = $this->conn->prepare($query);
			$stmt->bind_param('s', $plz);
			$stmt->execute();
			return $stmt;
		}
	}
?>