<?php

session_start();

if(!isset($_SESSION['logged'])){
		header("location: login.php");
}


class Admin
{
    public $id;
    public $username;
    public $password;


}

  $response=array();
	$id = $_SESSION['id'];
//$id = "1";
  $admin = getUserData($id);




function getUserData($id){
  global $conn;
	$admin = new Admin();

	$sql = " SELECT *  FROM admintbl WHERE id='$id' ";

	$query = mysqli_query($conn, $sql);
	while($row = mysqli_fetch_assoc($query)){



		$admin->id = $row["id"];
		$admin->username = $row["username"];
		$admin->password = $row["password"];
		$admin->name = $row["name"];

		return $admin;

	}




}



?>
