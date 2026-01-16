<?php

session_start();
require_once("../../db/databaseConnection.php");

 $response=array();

$username=mysqli_real_escape_string($conn,$_POST['username']);
$password=mysqli_real_escape_string($conn,$_POST['password']);

$error = "";

if($username=="" || $password=="")$error = "empty";


if(!checkExist($username,$password)) $error = "invalid";

if($error==""){
	$error = "success";
  $_SESSION['client_id'] = getUserId($username,$password);
}

 echo $error;


 function getUserId($username,$password){
  $client_id="";
  global $conn;
 $sql="SELECT * FROM clienttbl WHERE username='$username' AND password='$password' ";
 $query = mysqli_query($conn, $sql);
 while($row = mysqli_fetch_assoc($query)){
   $client_id = $row["client_id"];
 }
 return $client_id;

 }
 function checkExist($username,$password){
   global $conn;
  $sql=mysqli_query($conn,"SELECT * FROM clienttbl WHERE username='$username' AND password='$password' ");
  $exist= mysqli_num_rows($sql);
  if($exist>0)return true;
  else return false;
  }



?>
