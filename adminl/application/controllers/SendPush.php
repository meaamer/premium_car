<?php 
class SendPush extends CI_Controller{
	public function Index(){
		define( 'API_ACCESS_KEY', 'AIzaSyDRXekEhl0yZmHlyedFHkA81iYi2dnzb_g' );

		$data = array("to" => "fh1WL6AR-6k:APA91bH2A7o1fZ95dJtdR75mqlNIrUe6NONEXnaKdLOplR1rq55IdGMflQnHM3xJb5W_Ri9e5l5_5xGSnLZo2w4xPtDYAtkZw3A223-ZEWLKm8Od4Pc9ADy3BG7StQc_FXuRehHJm11f",
		              "notification" => array( "title" => "Shareurcodes.com", "body" => "A Code Sharing Blog!","icon" => "icon.png", "click_action" => "http://shareurcodes.com"));                                                                    
		$data_string = json_encode($data); 

		echo "The Json Data : ".$data_string; 

		$headers = array
		(
		     'Authorization: key=' . API_ACCESS_KEY, 
		     'Content-Type: application/json'
		);                                                                                 
		                                                                                                                     
		$ch = curl_init();  

		curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );                                                                  
		curl_setopt( $ch,CURLOPT_POST, true );  
		curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
		curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
		curl_setopt( $ch,CURLOPT_POSTFIELDS, $data_string);                                                                  
		                                                                                                                     
		$result = curl_exec($ch);

		curl_close ($ch);

		echo "<p>&nbsp;</p>";
		echo "The Result : ".$result."#";
	}
}