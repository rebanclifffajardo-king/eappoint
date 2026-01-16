<?php

session_start();
require_once("../../db/databaseConnection.php");
include '../../admin/php_operation/classes.php';

 $response=array();

$display=mysqli_real_escape_string($conn,$_POST['display']);


   //$display="request";

 if($display=="all") $response = getAppointmentList();
 if($display=="request") $response = sendappointment();
 if($display=="selection") $response = getType_Doc();



 echo json_encode($response);
//functions -------------------------

 function getType_Doc(){
   global $conn;
   $response=array();

  $response=array(
          "types"=>(getTypes()),
				  "doctors"=>(getDoctors())
				  );


  return $response;
 }
 function getTypes(){
   global $conn;
   $types=array();
   $sql = "SELECT * FROM typetbl ";
   $query = mysqli_query($conn, $sql);
   while($row = mysqli_fetch_assoc($query)){

     $type_id = $row["type_id"];
     $type_name = $row["type_name"];
     $room = $row["room"];
     $room_status = $row["room_status"];

     $types[]=array(
             "type_id"=>($type_id),
             "type_name"=>($type_name),
             "room"=>($room),
             "room_status"=>($room_status)
             );

   }
   return $types;

 }
 function getDoctors(){
   global $conn;
   $doctors=array();
   $sql = "SELECT * FROM doctortbl ";
   $query = mysqli_query($conn, $sql);
   while($row = mysqli_fetch_assoc($query)){

     $doctor_id = $row["doctor_id"];
     $doctor_name = $row["doctor_name"];
     $type_id = $row["type_id"];
     $doctor_status = $row["doctor_status"];

     $doctors[]=array(
             "doctor_id"=>($doctor_id),
             "doctor_name"=>($doctor_name),
             "type_id"=>($type_id),
             "doctor_status"=>($doctor_status)
             );

   }
   return $doctors;

 }


 function sendappointment(){
    date_default_timezone_set('Asia/Manila');
    $date=date('Y-m-d');
    $datetime=date('Y-m-d H:i:s');

    global $conn;
    $response=array();


    $error = "";
    $status = "";

   $appointment_date=mysqli_real_escape_string($conn,$_POST['appointment_date']);
   $patientname=mysqli_real_escape_string($conn,$_POST['patientname']);
   $seltype=mysqli_real_escape_string($conn,$_POST['seltype']);
   $seldoctor=mysqli_real_escape_string($conn,$_POST['seldoctor']);
   $message=mysqli_real_escape_string($conn,$_POST['message']);
   $clinictype=mysqli_real_escape_string($conn,$_POST['clinictype']);
   if(!isset($_SESSION['client_id'])){
     $status= "error";
     $error = "Client ID not found";
   }

   $client_id=$_SESSION['client_id'];

   if(checkExist($appointment_date,$client_id,$conn)){
     $status = "exist";
     $error = "You already have an existing appointment request for that date";

   }



if($error==""){
   $sql = "INSERT INTO appointtbl(schedule_date,patient_name,message,doctor_id,type_id,client_id,clinictype,date_requested,status)
   VALUES
   ('$appointment_date','$patientname','$message','$seldoctor','$seltype','$client_id','$clinictype','$datetime','')";
   $query=mysqli_query($conn,$sql);

   if($query){
     $status = "success";
     $error = "";


 
    $sender_info = class_getClientData($client_id);
    $receiver_info = class_getClinicData($clinictype);
  
    $not_message ="An appointment request has been sent by ". $sender_info->lastname. ", " . $sender_info->firstname . ".";
    $log_message= "Your have sent an appointment request to ". $receiver_info->clinic_name. ".";
    
     sendNotiftoAdmin($clinictype,$not_message, 'appointment');
     send_Log_User_Settings($client_id, $log_message);

   }

   else {
     $status = "error";
     $error = "Cant save your request! Please try again!";
   }


}
$response[]=array(
       "status"=>($status),
        "error"=>($error)
       );
     return $response;
 }
 function getAppointmentList(){
   if(!isset($_SESSION['client_id'])) return "error";
   $client_id=$_SESSION['client_id'];

   date_default_timezone_set('Asia/Manila');
   $date=date('Y-m-d');

    global $conn;
    $response=array();

     $sql = "SELECT a.*, c.*, t.*, d.*  FROM appointtbl a
     LEFT JOIN clienttbl c ON a.client_id= c.client_id
     LEFT JOIN typetbl t ON a.type_id=t.type_id
     LEFT JOIN doctortbl d ON a.doctor_id=d.doctor_id
      WHERE a.client_id='$client_id'";

     $query = mysqli_query($conn, $sql);
     while($row = mysqli_fetch_assoc($query)){

       $appointment_id = $row["appointment_id"];
       $schedule_date = $row["schedule_date"];
       $name = $row["lastname"]. ', '.$row["firstname"];
       $date_requested = $row["date_requested"];
       $schedule_date = $row["schedule_date"];
       $type_name = $row["type_name"];
       $room = $row["room"];
       $doctor_name = $row["doctor_name"];
       $status = $row["status"];

     $response[]=array(
   				  "appointment_id"=>($appointment_id),
             "schedule_date"=>($schedule_date),
             "client_name"=>($name),
             "date_requested"=>($date_requested),
             "schedule_date"=>($schedule_date),
             "type_name"=>($type_name),
             "room"=>($room),
             "doctor_name"=>($doctor_name),
             "status"=>($status)
   				  );

     }
     return $response;



 }

 function checkExist($appointment_date,$client_id,$conn){
 $sql=mysqli_query($conn,"SELECT * FROM appointtbl
   WHERE schedule_date='$appointment_date'
        AND client_id='$client_id' ");
 $exist= mysqli_num_rows($sql);
 if($exist>0)return true;
 else return false;
 }

?>
