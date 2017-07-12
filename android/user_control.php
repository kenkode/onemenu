<?php
require_once 'connection.php';
header('Content-Type: application/json');

class User {

	private $db;
	private $connection;

	function __construct(){
		$this->db = new DB_Connection();
		$this->connection = $this->db->get_connection();
	}
}

public function does_user_exist($username,$password){
	$query = "Select * from users where username='$username' and password='$password'";
    $result = mysqli_query($this->connection,$query);
    if(mysqli_num_rows($result)>0){
       $json['success'] = 'Welcome '.$username
       echo json_encode($json);
       mysqli_close($this->connection);
    }else{
    	$query = "Insert into users values('$username','$password','2','0')";
    	$is_inserted = mysqli_query($this->connection,$query);
    	if($is_inserted == 1){
           $json['success'] = ' Account created, welcome '.$username;
    	}else{
           $json['error'] = ' Wrong password! ';
    	}
    	echo json_encode($json);
    	mysqli_close($this->connection);
    }
}

$user =  new User();

if(isset($_POST['username'],$_POST['password'])){
	$username = $_POST['username'];
	$password = $_POST['password'];

	if(!empty($username) && !empty($password)){
       $encrypt_password = md5($password);
       $user->does_user_exist($username,$encrypt_password);
	}else{
         echo json_encode(" You must fill all fields! ")
	}
}
?>