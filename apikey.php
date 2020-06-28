<?php
	include_once 'DBConnector.php';

	class ApiKey{
		public $returnkey;
		function urlCheck(){
	if ($_SERVER['REQUEST_METHOD']!=='POST') {

		//We do not allow users to visit this page via a url!
		header('HTTP/1.0. 403 Forbidden');
		echo "You are forbidden!";
	}else{
		$api_key=null;
		$api_key=generateApiKey(64);
		header('Content-type: application/json');
	}
}

	/*function generateApiKey($str_length){
		//base 62 map
		$chars='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

		//get enough random bits for base 64 encoding and prevent '=' padding
		$bytes=openssl_random_pseudo_bytes(3*$str_length/4+1);
		//convert base 64 to base 62 mapping + and / to something from base 62 map
		//use the first 2 random bytes for the new characters
		$repl=unpack('C2', $bytes);
		$first=$chars[$repl[1]%62];
		$second=$chars[$repl[2]%62];
		$returnkey=strtr(substr(base64_encode($bytes), 0,$str_length), '+/',"$first$second");

		return $returnkey;

	}*/
	function saveApiKey(){


	}
	function generateResponse($api_key){
		if (saveApiKey()) {
			$res=['success'=>1,'message'=>$api_key];

		}else{
			$res=['success'=>0,'message'=>'Something went wrong. Please regenerate the API Key'];
		}
		return json_encode($res);
	}

}
?>