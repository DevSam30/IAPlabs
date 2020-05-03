<?php

include "Crud.php";
include "authenticator.php";
include_once "DBConnector.php";

/**
 * 
 */
class User implements Crud,Authenticator
{
	private $user_id;
	private $first_name;
	private $last_name;
	private $city_name;

	private $username;
	private $password;
	
	// constructor enables us instantiate our values from elsewhere as they are private 
	function __construct($first_name,$last_name,$city_name,$username,$password)
	{
		$this->first_name=$first_name;
		$this->last_name=$last_name;
		$this->city_name=$city_name;
		$this->username=$username;
		$this->password=$password;
	}
	// php does not allow multiple constructors,so we fake one.Because when we login,we do not have all the details.We only have username and pass and we still need to use this same class.We make this method static so that we access it with the class rather than an object 

	// static constructor

	public static function create()
	{
		$instance = new self($first_name,$last_name,$city_name,$username,$password);
		return $instance;
	}

	public function setUsername($username){
		$this->username=$username;
	}

	public function getUsername(){
		return $this->username;
	}

	public function setPassword($password){
		$this->password=$password;
	}

	public function getPassword(){
		return $this->password;
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
		$uname=$this->username;
		$this->hashPassword();
		$pass=$this->password;

		$con=new DBConnector;
		//$con=mysqli_connect('localhost','root','','btc3205')

		$res=mysqli_query($con->conn,"INSERT INTO users(first_name,last_name,user_city,username,password)VALUES('$fn','$ln','$city','$uname','$pass')");
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

	public function validateForm(){
		//returns true if fields are not empty
		$fn=$this->first_name;
		$ln=$this->last_name;
		$city=$this->city_name;
		if ($fn=="" || $ln=="" ||$city=="") {
			return false;
		}
		return true;
	}
	public function createFormErrorSessions(){
		session_start();
		$_SESSION['form_errors']="All fields are required";
	}

	public function hashPassword(){
		//inbuilt function password_hash hashes our password
		$this->password=password_hash($this->password, PASSWORD_DEFAULT);
	}

	public function isPasswordCorrect(){
		$con=new DBConnector;
		$found=false;
		$sql="SELECT * FROM users";
		$res=mysqli_query($con->conn,$sql);

		while ($row=mysqli_fetch_array($res)) {
			if (password_verify($this->getPassword(),$row['password'])&& $this->getUsername()==$row['username']) {
				$found=true;
			}
		}
		//close db connection
		$con->closeDatabase();
		return $found;
		//return true.value of $found if credentials are correct.
	}

	public function login(){
		if ($this->isPasswordCorrect()) {
			
			header("Location:private_page.php");
		}
	}

	public function logout(){
		session_start();
		unset($_SESSION['username']);
		session_destroy();
		header("Location:lab1.php");
	}

	public function createUserSession(){
		session_start();
		$_SESSION['username']=$this->getUsername();
	}

	public function isUserExist(){
		
		$con=new DBConnector;
		$username=$this->getUsername();
		
		$found=false;
		$sql="SELECT username FROM users";
		$res=mysqli_query($con->conn,$sql);
		$num=mysqli_num_rows($res);

		
			if ($num>0) {
				$name_error="Sorry...username already taken";

			echo "$name_error";
			echo "</br>";
			echo "$num";
			echo "</br>";
			$found=true;
			//$con->closeDatabase();
			}
		

		// if (mysqli_num_rows($res)>0) {
			
			
		// }
		//close db connection
		$con->closeDatabase();
		return $found;
		//return true.value of $found if credentials are correct.

	} 
}
?>