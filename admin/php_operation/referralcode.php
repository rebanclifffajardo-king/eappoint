<?php

session_start();
require_once("../../db/databaseConnection.php");
include 'classes.php';


 $response=array();

$display=mysqli_real_escape_string($conn,$_POST['display']);



//$display="types";

 if($display=="all") $response = getReferralList();
 if($display=="sent") $response = getReferralSentList();
 if($display=="approved") $response = updateReferral("approved");
 if($display=="denied") $response = updateReferral("denied");
 if($display=="add") $response = addReferral();
 if($display=="types") $response = fetchTypes();
 if($display=="doctors") $response = fetchDocTypes();
 


 echo json_encode($response);
//functions -------------------------
function fetchDocTypes(){
 
    global $conn;
    $response=array();
    $type=mysqli_real_escape_string($conn,$_POST['type']);
     $sql = "SELECT * FROM doctortbl  WHERE type_id='$type' ";

     $query = mysqli_query($conn, $sql);
     while($row = mysqli_fetch_assoc($query)){

       $doctor_id = $row["doctor_id"];
       $doctor_name = $row["doctor_name"];
      

     $response[]=array(
   				  "doctor_id"=>($doctor_id),
             "doctor_name"=>($doctor_name) 
     );

     }
     return $response;



 }
function fetchTypes(){
 
    global $conn;
    $response=array();
    $clinic=mysqli_real_escape_string($conn,$_POST['clinic']);
   // $clinic="1";
     $sql = "SELECT * FROM typetbl  WHERE clinictype='$clinic' ";

     $query = mysqli_query($conn, $sql);
     while($row = mysqli_fetch_assoc($query)){

       $type_id = $row["type_id"];
       $type_name = $row["type_name"];
      

     $response[]=array(
   				  "type_id"=>($type_id),
             "type_name"=>($type_name) 
     );

     }
     return $response;



 }
function addReferral(){
  global $conn;
  $response=array();
  date_default_timezone_set('Asia/Manila');
  $date_sent=date('Y-m-d h:i:s');

  $clinictype=mysqli_real_escape_string($conn,$_POST['clinictype']);
  $seltype=mysqli_real_escape_string($conn,$_POST['seltype']);
  $message=mysqli_real_escape_string($conn,$_POST['message']);
  $patient=mysqli_real_escape_string($conn,$_POST['patient']);
  $admin_id = $_SESSION['id']; 
  $file_attached = uploadFile($admin_id);

  $status = "";
  $error = "";


  if($clinictype=="" || $seltype=="" || $message=="" || $patient==""){
    $status = "error";
    $error = "Empty Fields";
  }

if($error==""){
 
 

  $sql = "INSERT INTO referraltbl(client_id,message,file_attached,date_sent,type,sender,receiver,status)
  VALUES
  ('$patient','$message','$file_attached','$date_sent','$seltype','$admin_id','$clinictype','')";
  $query=mysqli_query($conn,$sql);


  if($query){
    $status = "success";
    $error = "";

  $clinic = class_getClinicData($admin_id);
  $receiver_info = class_getClinicData($clinictype);

  //$message = getClinicName($admin_id). " sent a referral to you";
  $message = $clinic->clinic_name. " sent a referral to you";
   addNotifAdmin($receiver_info,$message,$clinictype,'referral', $admin_id);



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

function getClinicName($id){
  global $conn;
  $name="";
  
  $sql = " SELECT *  FROM clinictbl WHERE id='$id' ";

	$query = mysqli_query($conn, $sql);
	while($row = mysqli_fetch_assoc($query)){
		return $row["clinic_name"];
		 
	}
  return $name;
 }

 
function updateReferral($newstat){
  global $conn;
  $response=array();

  $id=mysqli_real_escape_string($conn,$_POST['id']);
 


  $status = "";
  $error = "";


  if($id==""){
    $status = "error";
    $error = "Empty Fields";
  }

if($error==""){
 
  $admin_id = $_SESSION['id']; 
  $sql = "UPDATE referraltbl SET status='$newstat' WHERE id='$id'  ";
  $query = mysqli_query($conn,$sql);



  if($query){
    $status = "success";
    $error = "";

    $referral_info = class_getReferralData($id);
    $sender_info = class_getClinicData($admin_id);
    $receiver_info = class_getClinicData($referral_info->sender);
  
    $not_message = "Your referral request has been ".$newstat." by ". $sender_info->clinic_name;
    $log_message =" You have ".$newstat." the referral request of ". $receiver_info->clinic_name;

     sendNotif_Log($sender_info,$receiver_info,$not_message,$log_message, 'referral');
  

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
 function getReferralList(){
  $admin_id = $_SESSION['id'];
   date_default_timezone_set('Asia/Manila');
   $date=date('Y-m-d');

    global $conn;
    $response=array();

     $sql = "SELECT r.*, c.clinic_name, c.address, c.latitude, c.longitude, cl.firstname, cl.lastname FROM referraltbl r
     LEFT JOIN clinictbl c ON c.id= r.sender 
     LEFT JOIN clienttbl cl ON cl.client_id =r.client_id
     WHERE   r.receiver='$admin_id' ";

     $query = mysqli_query($conn, $sql);
     while($row = mysqli_fetch_assoc($query)){

       $id = $row["id"];
       $message = $row["message"];
       $name = $row["lastname"] . ", " . $row["firstname"] ;
       $file_attached = "uploads/" . $row["file_attached"];
       $date_sent = $row["date_sent"];
       $date_sent =  date_format(date_create($date_sent), 'Y-m-d h:i a');
       $type = $row["type"];
       $sender = $row["sender"];
       $status = $row["status"];
       $clinic_name = $row["clinic_name"];
       $address = $row["address"];
       $latitude = $row["latitude"];
       $longitude = $row["longitude"]; 

     $response[]=array(
   				  "id"=>($id),
             "message"=>($message),
             "name"=>($name),
             "file_attached"=>($file_attached),
             "date_sent"=>($date_sent),
             "type"=>($type),
             "sender"=>($sender),
             "status"=>($status),
             "clinic_name"=>($clinic_name),
             "address"=>($address),
             "latitude"=>($latitude),
             "longitude"=>($longitude)
     );

     }
     return $response;



 }

 function getReferralSentList(){
  $admin_id = $_SESSION['id'];
   date_default_timezone_set('Asia/Manila');
   $date=date('Y-m-d');

    global $conn;
    $response=array();

     $sql = "SELECT r.*, c.clinic_name, c.address, c.latitude, c.longitude, cl.firstname, cl.lastname FROM referraltbl r
     LEFT JOIN clinictbl c ON c.id= r.receiver 
     LEFT JOIN clienttbl cl ON cl.client_id =r.client_id
     WHERE r.sender='$admin_id' ";

     $query = mysqli_query($conn, $sql);
     while($row = mysqli_fetch_assoc($query)){

       $id = $row["id"];
       $message = $row["message"];
       $name = $row["lastname"] . ", " . $row["firstname"] ;
       $file_attached = "uploads/" . $row["file_attached"];
       $date_sent = $row["date_sent"];
       $date_sent =  date_format(date_create($date_sent), 'Y-m-d h:i a');
       $type = $row["type"];
       $sender = $row["sender"];
       $status = $row["status"];
       $clinic_name = $row["clinic_name"];
       $address = $row["address"];
       $latitude = $row["latitude"];
       $longitude = $row["longitude"]; 

     $response[]=array(
   				  "id"=>($id),
             "message"=>($message),
             "name"=>($name),
             "file_attached"=>($file_attached),
             "date_sent"=>($date_sent),
             "type"=>($type),
             "sender"=>($sender),
             "status"=>($status),
             "clinic_name"=>($clinic_name),
             "address"=>($address),
             "latitude"=>($latitude),
             "longitude"=>($longitude)
     );

     }
     return $response;



 }

 function uploadFile($admin_id){

 
  if (!$_FILES['file']['error']) {
    $name = md5(rand(100, 200));
    $ext = explode('.', $_FILES['file']['name']);
    $filename = $name . '.' . $ext[1];
    $destination = '../uploads/' .$admin_id. '/' . $filename; //change this directory
    $dest_for_db = $admin_id. '/' . $filename; //change this directory
    $location = $_FILES["file"]["tmp_name"];
    move_uploaded_file($location, $destination);
    return $dest_for_db;
}
else
{
  return "0"; }



 

 }



 function addNotifAdmin(Clinic $receiver_info,$transaction,$user_id,$type,$admin_id){
  global $conn;
  date_default_timezone_set('Asia/Manila');
  $date_sent=date('Y-m-d h:i:s');
  $time_sent=date('h:i a');
  $date1_sent=date('Y-m-d');

  $sql = "INSERT INTO notificationtbl_admin(transaction,date_,user_id,seen,type)
  VALUES
  ('$transaction','$date_sent','$user_id',0,'$type')";
  $query=mysqli_query($conn,$sql);
 
  $sql1 = "INSERT INTO countnotiftbl_admin(user_id)
  VALUES
  ('$user_id')";
  $query1=mysqli_query($conn,$sql1);

  $message = 'You have sent a referral request to '. $receiver_info->clinic_name;
  $sql2 = "INSERT INTO activitylog(transaction,date_,time,user_id)
  VALUES
  ('$message','$date1_sent','$time_sent','$admin_id')";
  $query2=mysqli_query($conn,$sql2);


 }


?>
