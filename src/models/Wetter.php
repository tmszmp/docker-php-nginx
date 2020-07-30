<?php
	class Wetter {
		private $url = 'http://api.openweathermap.org/data/2.5/weather';
		private $key = 'd6c83c7a07d1158c30fb4824c4aa726e';

		public function read($lat, $lon){
			$file = $this->url . "?lat=" . $lat . "&lon=" . $lon . "&appid=" . $this->key;
			$data = file_get_contents($file);
			$result = json_decode($data, true);
			return $result;
			//test
		}
	}
?>
