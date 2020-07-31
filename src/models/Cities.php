<?php
	class Cities {
		private $conn;
		private $table = 'cities';

		public function __construct($db){
			$this->conn = $db;
		}

		public function read_plz($plz){
			$query = 'SELECT * FROM cities WHERE plz LIKE ? ORDER BY name LIMIT 0,10';
			$stmt = $this->conn->prepare($query);
			$stmt->bind_param('s', $plz);
			$stmt->execute();
			return $stmt;
		}

		public function read_ort($ort){
			$query = 'SELECT * FROM cities WHERE name LIKE ? ORDER BY plz LIMIT 0,10';
			$stmt = $this->conn->prepare($query);
			$stmt->bind_param('s', $ort);
			$stmt->execute();
			return $stmt;
		}
	}
?>