<?php
	class Wetter {
		private $url = 'http://samples.openweathermap.org/data/2.5/weather';
		private $key = '439d4b804bc8187953eb36d2a8c26a02';

		public function read($lat, $lon){
			$file = $this->url . "?lat=" . $lat . "&lon=" . $lon . "&appid=" . $this->key;
			echo $file;
			$data = file_get_contents($file);
			$result = json_decode($data, true);
			return $result;
			//test
		}
	}
?>
