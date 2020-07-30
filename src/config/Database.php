<?php
	class Database{
		private $host = '10.7.252.12';
		private $db_name = 'cities';
		private $password = 'test';
		private $conn;

		public function connect(){
			$this->conn = null;
			try{
				$this->conn = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->db_name, $this->username, $this->password);
				$this->conn-> setAttribute(PDO::ATTR_ERRMODE, PDO::EEMODE_EXEPTION);
			}catch(PDOExeption $e){
				echo 'Failure:' . $e->getMessage();
			}

			return $this->conn;
		}
	}
?>