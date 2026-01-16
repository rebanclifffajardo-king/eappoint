<?php

session_start();
require_once("../../db/databaseConnection.php");
include '../../admin/php_operation/classes.php';

 $response=array();

$display=mysqli_real_escape_string($conn,$_POST['display']);



  //=$display="all";

 if($display=="edit_account") $response = editUser(); 
 if($display=="edit_password") $response = editPassword(); 


 echo json_encode($response);
//functions ------------------------- 
 
 function editUser(){

   date_default_timezone_set('Asia/Manila');
   $date=date('Y-m-d');

    global $conn;
    $response=array();
 

  $firstname=mysqli_real_escape_string($conn,$_POST['firstname']);
  $lastname=mysqli_real_escape_string($conn,$_POST['lastname']);
  $email=mysqli_real_escape_string($conn,$_POST['email']);
  $phone=mysqli_real_escape_string($conn,$_POST['phone']);
  $client_id=mysqli_real_escape_string($conn,$_POST['client_id']);
  
  $status = "";
  $error = "";

 

  if($firstname=="" || $lastname=="" || $email=="" || $phone=="" || $client_id==""){
    $status = "error";
    $error = "Empty Fields";
  }

 
  if(checkExistUpdate($email,'email', $client_id)){
    $status = "exist";
    $error = "The email already exist. Please try again";
  }
  if(checkExistUpdateName($firstname,$lastname, $client_id)){
    $status = "exist";
    $error = "The name already exist. Please try again";
  }
   


  if($error==""){

    
    $sql = "UPDATE clienttbl SET
    firstname='$firstname',
    lastname='$lastname',
    email='$email',
    phone='$phone'
    WHERE client_id='$client_id' ";
    $query = mysqli_query($conn,$sql);
 
 
    if($query){
      $status = "success";
      $error = "";

      $log_message ="You have updated your user information";
      send_Log_User_Settings($client_id,$log_message);
  

    }


    else {
      $status = "error";
      $error = "Cant update data! Please try again!";
    }

    
 }

  $response[]=array(
    "status"=>($status),
    "error"=>($error)
    );


  return $response;
 }
 function editPassword(){

  date_default_timezone_set('Asia/Manila');
  $date=date('Y-m-d');

   global $conn;
   $response=array();


   global $conn;
   $response=array();
   $oldpassword=mysqli_real_escape_string($conn,$_POST['oldpassword']);
   $newpassword=mysqli_real_escape_string($conn,$_POST['newpassword']);
   $cnewpassword=mysqli_real_escape_string($conn,$_POST['cnewpassword']);
   $cnewpassword=mysqli_real_escape_string($conn,$_POST['cnewpassword']);
   $setpassword=mysqli_real_escape_string($conn,$_POST['setpassword']);
   $id=mysqli_real_escape_string($conn,$_POST['id']);
   $status = "";
   $error = "";
   
   

   
   if($oldpassword=="" || $newpassword=="" || $cnewpassword=="" ){
     $status = "error";
     $error = "Empty Fields";
   }
   
   
   if($newpassword<>$cnewpassword){
     $status = "error";
     $error = "The passwords must be the same.";
   }
   if($oldpassword<>$setpassword){
    $status = "error";
    $error = "Your old password is incorrect.";
  }
  
   
   if($error==""){
    
     $sql = "UPDATE clienttbl SET
     password='$newpassword'
     WHERE client_id='$id' ";
      $query = mysqli_query($conn,$sql);
    
   
  //$query = true;
     if($query){
       $status = "success";
       $error = "";
       $log_message ="You have updated your password information.";
       send_Log_User_Settings($id,$log_message);
   
   
     }
   
   
     else {
       $status = "error";
       $error = "Cant update password! Please try again!";
     }
   
   
   }
   
   
   $response[]=array(
           "status"=>($status),
           "error"=>($error)
           );
   
   
   return $response;


$response[]=array(
  "status"=>($status),
  "error"=>($error)
  );


return $response;

}


function checkExistUpdate($value,$column,$client_id){
  global $conn;
 $sql=mysqli_query($conn,"SELECT * FROM clienttbl WHERE $column='$value' AND client_id<>'$client_id' ");
 $exist= mysqli_num_rows($sql);
 if($exist>0)return true;
 else return false;
 } 
function checkExistUpdateName($firstname,$lastname, $client_id){
  global $conn;
 $sql=mysqli_query($conn,"SELECT * FROM clienttbl WHERE firstname='$firstname' AND lastname='$lastname'  AND client_id<>'$client_id' ");
 $exist= mysqli_num_rows($sql);
 if($exist>0)return true;
 else return false;
 } 

?>
