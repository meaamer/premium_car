<?php
class Uni{
	
	public function GetDistance($from_city,$to_city){
		$url = 'http://maps.googleapis.com/maps/api/distancematrix/json?origins='.urlencode($from_city).'&destinations='.urlencode($to_city).'&language=en-EN&sensor=false';
		//$url = 'http://maps.googleapis.com/maps/api/distancematrix/json?origins='.$from_city.'&destinations='.$to_city.'&sensor=false';
		$json = file_get_contents($url); // get the data from Google Maps API
		$result = json_decode($json, true); // convert it from JSON to php array//['duration']['text'];
		$res=$result['rows'][0]['elements'][0];

		$distancex = $result['rows'][0]['elements'][0]['distance']['text'];
		$distance = str_replace(',', '',$distancex);
		$res['distance']['text']=$distance;
		//return $result['rows'][0]['elements'][0];
		return $res;
	}

	public function httpGet($url){
	   $ch = curl_init();  

	   curl_setopt($ch,CURLOPT_URL,$url);
	   curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
	//  curl_setopt($ch,CURLOPT_HEADER, false); 

	   $output=curl_exec($ch);

	   curl_close($ch);
	   return $output;
	}
}

?>