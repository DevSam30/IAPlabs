<?php
include_once 'apikey.php';
include_once 'DBConnector.php';

	session_start();
	if (!isset($_SESSION['username'])) {
		header("Location:login.php");
	}

	function generateApiKey($str_length){
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

		
	}
	function saveApiKey(){
		$con=new DBConnector;
		//$con=mysqli_connect('localhost','root','','btc3205')

		$res=mysqli_query($con->conn,"INSERT INTO api_keys(id,user_id,api_key)VALUES(1,1,$returnkey)");
		return $res;

	}

	
?>

<!DOCTYPE html>
<html>
<head>
	<title>Private Page</title>
	<script type="text/javascript" src="validate.js"></script>
	<script src="jquery-3.1.1.min.js"></script>
	<script type="text/javascript" src="apikey.js"></script>
	<link rel="stylesheet" type="text/css" href="validate.css">
	<script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>
	<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
	<p>This is a private page</p>
	<p>We want to protect it</p>
	<p align="right"><a href="logout.php">Logout</a></p>
	<hr>
	<h3>Here, we will create an API that will allow Users/Developer to order items from external systems</h3>
	<hr>
	<h4>We now put this feature of allowing users to generate an API key. Click the button to generate the API key</h4>
	<button id="api-key-btn">Generate API key</button><br><br>
	<button id="save" onclick="saveApiKey()">Save API key</button><br><br>

	<!--Text area to hold the API key-->
	<strong>Your API key:</strong>(Note that if your API key is already in use by already running applications, generating a new key will stop the application from functioning)<br>
	<textarea cols="100" rows="2" id="api_key" readonly><?php echo generateApiKey(64);?></textarea>
	<h3>Service description</h3>
	We have a service/API that allows external applications to order food and also pull all order status by using order id. Let's do it.

	<hr>
	
	

</body>
</html>