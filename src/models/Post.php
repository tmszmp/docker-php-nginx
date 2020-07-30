<?php
	class Post {
		private $conn;
		private $table = 'cities';

		public $ID;
		public $geo_point;
		public $name;
		public $plz;

		public function __construct($db){
			$this->conn = $db;
		}

		public function read(){
			$query = 'SELECT * FROM ' . $this->table . 'ORDER BY name';
			$stmt = $this->conn->prepare($query);
			$stmt->execute();
			return $stmt;
		}
	}
?>