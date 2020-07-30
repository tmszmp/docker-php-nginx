<?php
	class Database{
		private $host = '10.7.252.12';
		private $db_name = 'cities';
		private $username = 'root2';
		private $password = 'test';
		private $conn;

		public function connect(){
			$this->conn = null;
			$this->conn = new mysqli($this->host, $this->username, $this->password, $this->db_name);
			if ($conn->connect_error) {
				echo "failure";
  			die("Connection failed: " . $conn->connect_error);
			}
			return $this->conn;
		}
	}
?>

