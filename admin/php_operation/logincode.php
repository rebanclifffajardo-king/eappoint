<?php

session_start();
require_once("../../db/databaseConnection.php");

 $response=array();

$username=mysqli_real_escape_string($conn,$_POST['username']);
$password=mysqli_real_escape_string($conn,$_POST['password']);

$status = "";
$error = "";


if($username=="" || $password==""){
	$status = "error";
	$error = "Empty Fields";
}


if(!checkExist($username,$password)){
	$status = "error";
	$error = "The Account Details doesn't exist. Please try again";

	$_SESSION['logged'] = '';
	unset($_SESSION['logged']);
}

if($error==""){



	$status = "success";
	$error = "";

  $_SESSION['logged'] = 'logged';
  $_SESSION['id'] = getUserId($username,$password);

}


$response[]=array(
				"status"=>($status),
				"error"=>($error)
				);


 echo json_encode($response);

 function checkExist($username,$password){
   global $conn;
  $sql=mysqli_query($conn,"SELECT * FROM admintbl WHERE username='$username' AND password='$password' ");
  $exist= mysqli_num_rows($sql);
  if($exist>0)return true;
  else return false;
  }

    function getUserId($username,$password){
      global $conn;
      $id="";

    	$sql = "SELECT * FROM admintbl WHERE username='$username' AND password='$password'  ";

    	$query = mysqli_query($conn, $sql);
    	while($row = mysqli_fetch_assoc($query)){
    		$id = $row["id"];

    	}
      return $id;

    }

?>
