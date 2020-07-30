<?php
	class Wetter {
		private $url = 'api.openweathermap.org/data/2.5/weather';
		private $key = '00c76f42834a33627260d58d29bebdf4';

		public function read($lat, $lon){
			$file = $url . "?lat=" . $lat . "&lon=" . $lon . "&appid"=$key;
			$data = file_get_contents($file);
			$result = json_decode($data, true);
			return $result;
		}
	}
?>