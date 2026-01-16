<?php
session_start();
require_once("../../db/databaseConnection.php");

$email=mysqli_real_escape_string($conn,$_POST['email']);
$username=mysqli_real_escape_string($conn,$_POST['username']);
$password=mysqli_real_escape_string($conn,$_POST['password']);
$firstname=mysqli_real_escape_string($conn,$_POST['firstname']);
$lastname=mysqli_real_escape_string($conn,$_POST['lastname']);
$phone=mysqli_real_escape_string($conn,$_POST['phone']);

if($email<>"" && $username<>"" && $password<>"" && $firstname<>"" && $lastname<>"" && $phone<>"" ){
if(checkExist($email,$conn)==false){
$save = "INSERT INTO clienttbl(username,password,firstname,lastname,email,phone,picture)
VALUES
('$username','$password','$firstname','$lastname','$email','$phone','')";
$success=mysqli_query($conn,$save);

$_SESSION['client_username'] = $username;

addPath($username);

echo "success";

}else echo "exist";


}else{
  echo "empty";
}

function checkExist($email,$conn){
$sql=mysqli_query($conn,"SELECT * FROM clienttbl WHERE email='$email'");
$exist= mysqli_num_rows($sql);
if($exist>0)return true;
else return false;
}
function addPath($username){
$newfilepath = '../uploads/'.$username."/";
if (!mkdir($newfilepath, 0755, true)) {
die('Failed to create folders...');
}
}


?>
