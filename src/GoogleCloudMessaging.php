<?php

namespace KongKannika;

/**
 * Google Cloud Messaging for Android
 *
 * @author Coca
 * @copyright (c) 2012, Kannika Kong
 */
class GoogleCloudMessaging {
	
	private $server = "https://android.googleapis.com/gcm/send";
	private $key = "";
	
	/**
	 * Start contructor of push message with the server api key
	 * 
	 * @param string $api_key
	 */
	public function GoogleCloudMessaging($api_key) {
		$this->key = $api_key;
	}
	
	/**
	 * Push a message to one or many device(s)
	 * 
	 * Example $data = array("msg"=>"Hello world! This is a notification","ttl"=>"My Application Name","id"=>"100");
	 * Example $registration_ids = array("id1","id2","id3");
	 * 
	 * @param array $registration_ids
	 * @param array $data
	 * 
	 * @return string json
	 */
	public function pushMessageToManyDevices($registration_ids = array(), $data = array()) {
		$_headers = array(
			"Content-Type:application/json",
			"Authorization:key=".$this->key
		);
		
		$_data = array(
			"registration_ids" => $registration_ids,
			"data" => $data
		);
		
		return $this->send($_headers, json_encode($_data));
	}
	
	/**
	 * Push a message to one device
	 * 
	 * Example $data = array("message"=>"Hello world! This is a notification","title"=>"My Application Name","id"=>"100");
	 * Example $registration_id = "id1";
	 * 
	 * @param string $registration_id
	 * @param array $data
	 * 
	 * @return string
	 */
	public function pushMessageToOneDevice($registration_id, $data) {
		$_headers = array(
			"Content-Type:application/x-www-form-urlencoded;charset=UTF-8",
			"Authorization:key=".$this->key
		);
		
		$_data = "";
		foreach( $data as $key => $val ) {
			$_data .= "data." . $key . "=" . $val . "&";
		}
		$_data .= "registration_id=" . $registration_id;
		
		return $this->send($_headers, $_data);
	}
	
	/**
	 * Send POST request to server google
	 * 
	 * @return string JSON or String
	 */
	public function send($headers, $data) {
		$ch = curl_init();
		
		curl_setopt($ch, CURLOPT_URL, $this->server);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		
		$response = curl_exec($ch);
		
		curl_close($ch);
		
		return $response;
	}
}

?>
