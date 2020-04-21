<?php

include "Crud.php";
include_once "DBConnector.php";
/**
 * 
 */
class User implements Crud
{
	private $user_id;
	private $first_name;
	private $last_name;
	private $city_name;
	
	
	function __construct($first_name,$last_name,$city_name)
	{
		$this->first_name=$first_name;
		$this->last_name=$last_name;
		$this->city_name=$city_name;
	}
	public function setUserId($user_id){
		$this->user_id=$user_id;
	}
	public function getUserId(){
		return $this->$user_id;
	}
	public function save(){
		$fn=$this->first_name;
		$ln=$this->last_name;
		$city=$this->city_name;

		$con=new DBConnector;
		//$con=mysqli_connect('localhost','root','','btc3205')

		$res=mysqli_query($con->conn,"INSERT INTO users(first_name,last_name,user_city)VALUES('$fn','$ln','$city')");
		return $res;
	}
	public function readAll(){
		$con=new DBConnector;
		$sql = 'SELECT first_name, last_name, user_city FROM users';
   //mysql_select_db('test_db');
   $retval = mysqli_query($con->conn,$sql );
   
   // if(! $retval ) {
   //    die('Could not get data: ' . mysql_error());
   // }
   
   while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC)) {
      echo "First Name :{$row['first_name']}  <br> ".
         "Last Name : {$row['last_name']} <br> ".
         "User City : {$row['user_city']} <br> ".
         "--------------------------------<br>";
   }
   
   //echo "Fetched data successfully\n";
   
   //mysql_close($conn);

	}
	public function readUnique(){
		return null;
	}
	public function search(){
		return null;
	}
	public function update(){
		return null;
	}
	public function removeOne(){
		return null;
	}
	public function removeAll(){
		return null;
	}
}
?>