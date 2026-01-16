<?php

session_start();
require_once("../../db/databaseConnection.php");

 $response=array();

$display=mysqli_real_escape_string($conn,$_POST['display']);



  //=$display="all";

 if($display=="type") $response = displayTypes(); 
 if($display=="insert") $response = addType(); 
 if($display=="update") $response = updateType(); 
 if($display=="edit_account") $response = editUser(); 
 if($display=="edit_password") $response = editPassword(); 


 echo json_encode($response);
//functions ------------------------- 

function displayTypes(){
  global $conn;
  $response=array();
  
  $admin_id = $_SESSION['id']; 
   $sql = "SELECT * FROM typetbl WHERE clinictype='$admin_id' ";

   $query = mysqli_query($conn, $sql);
   while($row = mysqli_fetch_assoc($query)){

     $type_id = $row["type_id"];
     $type_name = $row["type_name"];
     $room = $row["room"];
     $room_status = $row["room_status"];

   $response[]=array(
           "type_id"=>($type_id),
           "type_name"=>($type_name),
           "room"=>($room),
           "room_status"=>($room_status)
           );

   }
   return $response;



}

 function addType(){

   date_default_timezone_set('Asia/Manila');
   $date=date('Y-m-d');

    global $conn;
    $response=array();
 

  $typename=mysqli_real_escape_string($conn,$_POST['typename']);
  $roomname=mysqli_real_escape_string($conn,$_POST['roomname']);
  $status = "";
  $error = "";

 

  if($typename=="" || $roomname==""){
    $status = "error";
    $error = "Empty Fields";
  }

    
  if(checkExistType($typename)){
    $status = "exist";
    $error = "The Type Name already exist. Please try again";
  }


  if($error==""){
    $admin_id = $_SESSION['id']; 
    $sql = "INSERT INTO typetbl(type_name,room,room_status,clinictype)
    VALUES('$typename','$roomname','open','$admin_id') ";
    $query = mysqli_query($conn,$sql);



    if($query){
      $status = "success";
      $error = "";

    }


    else {
      $status = "error";
      $error = "Cant insert data! Please try again!";
    }

    
 }

  $response[]=array(
    "status"=>($status),
    "error"=>($error)
    );


  return $response;
 }

 function updateType(){

   date_default_timezone_set('Asia/Manila');
   $date=date('Y-m-d');

    global $conn;
    $response=array();
 

  $type_id=mysqli_real_escape_string($conn,$_POST['type_id']);
  $typename=mysqli_real_escape_string($conn,$_POST['typename']);
  $roomname=mysqli_real_escape_string($conn,$_POST['roomname']);
  $status = "";
  $error = "";

 

  if($typename=="" || $roomname==""){
    $status = "error";
    $error = "Empty Fields";
  }


    
  if(checkExistTypeUpdate($typename,$type_id)){
    $status = "exist";
    $error = "The Type Name already exist. Please try again";
  }


  if($error==""){

    $sql = "UPDATE typetbl SET type_name='$typename',room='$roomname' WHERE type_id='$type_id'";
    $query = mysqli_query($conn,$sql);



    if($query){
      $status = "success";
      $error = "";

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

 function editUser(){

   date_default_timezone_set('Asia/Manila');
   $date=date('Y-m-d');

    global $conn;
    $response=array();
 

  $name=mysqli_real_escape_string($conn,$_POST['name']);
  $id=mysqli_real_escape_string($conn,$_POST['id']);
  $status = "";
  $error = "";

 

  if($name=="" || $id==""){
    $status = "error";
    $error = "Empty Fields";
  }


    
  if(checkExistUpdate($name,'name', $id)){
    $status = "exist";
    $error = "The Administrator Name already exist. Please try again";
  }


  if($error==""){

    $sql = "UPDATE admintbl SET
    name='$name'
    WHERE id='$id' ";
    $query = mysqli_query($conn,$sql);



    if($query){
      $status = "success";
      $error = "";

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
   
     $sql = "UPDATE admintbl SET
     password='$newpassword'
     WHERE id='$id' ";
      $query = mysqli_query($conn,$sql);
   
   
   
     if($query){
       $status = "success";
       $error = "";
   
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


function checkExistUpdate($value,$column,$id){
  global $conn;
 $sql=mysqli_query($conn,"SELECT * FROM admintbl WHERE $column='$value' AND id<>'$id' ");
 $exist= mysqli_num_rows($sql);
 if($exist>0)return true;
 else return false;
 }
function checkExistType($typename){
  $admin_id = $_SESSION['id']; 
  global $conn;
 $sql=mysqli_query($conn,"SELECT * FROM typetbl WHERE type_name='$typename' AND clinictype='$admin_id'  ");
 $exist= mysqli_num_rows($sql);
 if($exist>0)return true;
 else return false;
 }
function checkExistTypeUpdate($typename,$type_id){
  global $conn;
 $sql=mysqli_query($conn,"SELECT * FROM typetbl WHERE type_name='$typename' AND type_id<>'$type_id'  ");
 $exist= mysqli_num_rows($sql);
 if($exist>0)return true;
 else return false;
 }


?>
