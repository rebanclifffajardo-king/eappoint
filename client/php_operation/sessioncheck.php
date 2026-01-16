<?php

session_start();

if(!isset($_SESSION['client_id'])){
		header("location: ../index.php");
}


class User
{
    public $id;
    public $username;
    public $password;
    public $firstname;
    public $lastname;
    public $name;
    public $email;
    public $phone;
    public $picture;


}

  $response=array();
	$id = $_SESSION['client_id'];
//$id = "1";
  $user = getUserData($id);




function getUserData($id){
  global $conn;
	$user = new User();

	$sql = " SELECT *  FROM clienttbl WHERE client_id='$id' ";

	$query = mysqli_query($conn, $sql);
	while($row = mysqli_fetch_assoc($query)){



		$user->client_id = $row["client_id"];
		$user->username = $row["username"];
		$user->password = $row["password"];
		$user->firstname = $row["firstname"];
		$user->lastname = $row["lastname"];
		$user->name = $user->firstname. " ". $user->lastname;
		$user->email = $row["email"];
		$user->phone = $row["phone"];
		$user->picture =checkImg($row["picture"]);

		return $user;

	}




}
function checkImg($picture){
	return $picture==""?"avatar1.png":$picture;
}


?>
