<?php

session_start();
require_once("../../db/databaseConnection.php");
require_once("../curl/sendsms.php");
include 'classes.php';

 $response=array();

$display=mysqli_real_escape_string($conn,$_POST['display']);



 //$display="approved";

 if($display=="all") $response = getAppointmentList();
 if($display=="approved") $response = updateAppointment("approved");
 if($display=="denied") $response = updateAppointment("denied");
 if($display=="set") $response = updateAppointmentSetToday();
 if($display=="approvedate") $response = countQueue();
 if($display=="walkin") $response = addWalkin();

 echo json_encode($response);
 
//functions -------------------------
function countQueue(){
  global $conn;
  $response=array();

  $seldate=mysqli_real_escape_string($conn,$_POST['seldate']);
  $doctor_id=mysqli_real_escape_string($conn,$_POST['doctor_id']);
  //$seldate ='2022-09-20';
  //$doctor_id="1";
  $today = date('l', strtotime($seldate));


  $sql = "SELECT * FROM queuetbl
     WHERE doctor_id='$doctor_id' AND date_sched='$seldate' ";

  $query = mysqli_query($conn, $sql);
  $count = mysqli_num_rows($query);
  $maxclient = getMaxClient($doctor_id,$today);
 
  $response[]=array(
    "totqueue"=>($count),
    "maxqueue"=>($maxclient)
    );

    return $response;

}
 function getMaxClient($doctor_id,$today){
  global $conn;
  $response=array();
  $max_client="";
  $sql = "SELECT max_client FROM schedtbl WHERE doctor_id='$doctor_id' AND day_='$today'";

  $query = mysqli_query($conn, $sql);
  while($row = mysqli_fetch_assoc($query)){
    $max_client = $row["max_client"]; 
  }
    return $max_client;

 }
 function updateAppointmentSetToday(){
   global $conn;
   $response=array();

   $approvedate=mysqli_real_escape_string($conn,$_POST['date_sched']);
   $client_id=mysqli_real_escape_string($conn,$_POST['client_id']);
   $doctor_id=mysqli_real_escape_string($conn,$_POST['doctor_id']);
   $type_id=mysqli_real_escape_string($conn,$_POST['type_id']);
   $id=mysqli_real_escape_string($conn,$_POST['id']);

   date_default_timezone_set('Asia/Manila');
   $date=date('Y-m-d');


   $status = "";
   $error = "";


   if($id==""){
     $status = "error";
     $error = "Empty Fields";
   }


 if($error==""){
 

   $sql = "UPDATE appointtbl SET schedule_date='$date' WHERE appointment_id='$id'   ";
   $query = mysqli_query($conn, $sql);

   $sql1 = "UPDATE queuetbl SET date_sched='$date',status='' WHERE doctor_id='$doctor_id' AND type_id='$type_id' AND date_sched='$approvedate' ";
   $query1 = mysqli_query($conn, $sql1);

   if($query && $query1){
     $status = "success";
     $error = "";
      setQueueDate($doctor_id,$type_id,$date);


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
 
 function updateAppointment($newstat){
   global $conn;
   $response=array();

   $id=mysqli_real_escape_string($conn,$_POST['id']);
   //$id ='1001';
   $client_id=mysqli_real_escape_string($conn,$_POST['client_id']);
   $date_sched=mysqli_real_escape_string($conn,$_POST['date_sched']);
   $doctor_id=mysqli_real_escape_string($conn,$_POST['doctor_id']);


   $status = "";
   $error = "";


   if($id==""){
     $status = "error";
     $error = "Empty Fields";
   }


 if($error==""){
 

   $sql = "UPDATE appointtbl SET status='$newstat',schedule_date='$date_sched'  WHERE appointment_id='$id' AND status<>'ongoing' ";
   $query = mysqli_query($conn,$sql);



   if($query){
     $status = "success";
     $error = "";
 
     if($newstat=="approved"){
      

      if(checkExist($client_id,$date_sched,$doctor_id)){
        $status = "error";
        $error = "This appointment date is already set to this client.";
      }else{
       processQueue($id,$date_sched);

        
    
      }
    
     } 
 
     $admin_id = $_SESSION['id'];
     $client_info = class_getClientData($client_id);
     $adminclinic_info = class_getClinicData($admin_id);

     $not_message = "";
     if($newstat=="approved") $not_message = "Your appointment request has been ".$newstat." by ". $adminclinic_info->clinic_name." for schedule on ".$date_sched;
     if($newstat=="denied") $not_message = "Your appointment request has been ".$newstat." by ". $adminclinic_info->clinic_name;
     
     sendSMStothis($client_info->phone,$not_message,$newstat);

     $log_message =" You have ".$newstat." the appointment request of " .$client_info->lastname. ", ". $client_info->firstname ;
 
      sendNotif_Log_User($client_info,$adminclinic_info,$not_message,$log_message, 'appointment');
     
    

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

function sendSMStothis($phone,$not_message,$status){
   
 
  sendSMStoPhone($phone,$status,$not_message,'sms');

 


}

function addWalkin(){
  global $conn;
  $response=array();

  $error = "";
  $status = "";

  date_default_timezone_set('Asia/Manila');
  $date=date('Y-m-d');
  $datetime=date('Y-m-d H:i:s');

  $appointment_date=mysqli_real_escape_string($conn,$_POST['appointment_date']);
  $patientname=mysqli_real_escape_string($conn,$_POST['patientname']);
  $seltype=mysqli_real_escape_string($conn,$_POST['seltype']);
  $seldoctor=mysqli_real_escape_string($conn,$_POST['seldoctor']);
  $message=mysqli_real_escape_string($conn,$_POST['message']);
  $clinictype=mysqli_real_escape_string($conn,$_POST['clinictype']);
  

  $client_id = addClient($patientname);

   $sql = "INSERT INTO appointtbl(schedule_date,patient_name,message,doctor_id,type_id,client_id,clinictype,date_requested,status)
   VALUES
   ('$appointment_date','$patientname','$message','$seldoctor','$seltype','$client_id','$clinictype','$datetime','approved')";
   $query=mysqli_query($conn,$sql);
   $newid =mysqli_insert_id($conn);
   processQueue($newid, $appointment_date);
   if($query){
     $status = "success";
     $error = "";
    // setQueueDate($seldoctor,$seltype,$appointment_date);
    
   }

   else {
     $status = "error";
     $error = "Cant add your request! Please try again!";
   }

   
  $status = "success";
$response[]=array(
       "status"=>($status),
        "error"=>($error)
       );


     return $response;


}

function addClient($patientname){
  global $conn;
  $sql = "INSERT INTO clienttbl(username,password,firstname,lastname,email,phone,picture)
  VALUES
  ('$patientname','$patientname','$patientname','','','','')";
  $query=mysqli_query($conn,$sql);
  return mysqli_insert_id($conn);
 
}

function setQueueDate($doctor_id,$type_id,$date){
  global $conn;
 
    $sql = "SELECT * FROM queuetbl WHERE doctor_id='$doctor_id' AND type_id='$type_id' AND date_sched='$date'  ";
    $num=0;
    $query = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($query)){

      $id = $row["id"];
      updateQueue($id,++$num);
      


    }


}
function processQueue($appointment_id,$appointment_date){
  global $conn;
  date_default_timezone_set('Asia/Manila');
  $date=date('Y-m-d');
  $schedule_date = $appointment_date;
 // $schedule_date = "2022-12-09";
    $sql = "SELECT * FROM appointtbl WHERE appointment_id='$appointment_id' ";

    $query = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($query)){

      $appointment_id = $row["appointment_id"];
      $client_id = $row["client_id"];
   
      $type_id = $row["type_id"];
      $doctor_id = $row["doctor_id"];
        addQueue($appointment_id,$client_id,$schedule_date,$type_id,$doctor_id);


    }


}
function  updateQueue($id,$num){
  global $conn;
  $sql = "UPDATE queuetbl SET priorityno=$num WHERE id='$id'   ";
  $query = mysqli_query($conn, $sql);

}
function addQueue($appointment_id,$client_id,$schedule_date,$type_id,$doctor_id){
  global $conn;
  date_default_timezone_set('Asia/Manila');
  $admin_id = $_SESSION['id'];
  //$date_sched=date('Y-m-d');
  $priorityno = getMaxQueue($schedule_date,$type_id,$doctor_id);
  $datetime_sched=getConsultationTime($doctor_id,$priorityno,$schedule_date);
  $date_sched=$schedule_date;
  //$date_sched="2022-12-09";
   //echo "priorityno: ".$priorityno;

  $sql = "INSERT INTO queuetbl(priorityno,client_id,type_id,doctor_id,clinictype,datetime_sched,date_sched,status)
  VALUES
  ('$priorityno','$client_id','$type_id','$doctor_id','$admin_id','$datetime_sched','$date_sched','')";
  $query=mysqli_query($conn,$sql);



}
function checkExist($client_id,$date_sched,$doctor_id){
  global $conn;
  $sql=mysqli_query($conn,"SELECT * FROM queuetbl 
      WHERE client_id='$client_id' AND doctor_id='$doctor_id' AND date_sched='$date_sched' ");
  $exist= mysqli_num_rows($sql);
  if($exist>0)return true;
  else return false;

}
function getConsultationTime($doctor_id,$priorityno,$schedule_date){
  global $conn;
  $date_sched=date('Y-m-d');
  $f_datetime_sched="";
  $date_sched=$schedule_date;
  $day_ =  date('l', strtotime($date_sched));
  $sql = "SELECT * FROM schedtbl WHERE doctor_id='$doctor_id' AND day_='$day_' ";

  $query = mysqli_query($conn, $sql);
  while($row = mysqli_fetch_assoc($query)){
    $consultation_start = $row["consultation_start"];
    $consultation_end = $row["consultation_end"];
    $consultation_time = $row["consultation_time"];
    $toadd = " + " . ($consultation_time*($priorityno-1)). " minutes";
    $datetime_sched = $date_sched . " " .$consultation_start;
    $f_datetime_sched = date('Y-m-d H:i:s', strtotime($datetime_sched . $toadd));
  }
    return $f_datetime_sched;

}

function getMaxQueue($schedule_date,$type_id,$doctor_id){
  global $conn;
  $priorityno=0;
  /*
  $sql = "SELECT MAX(priorityno) as 'num'  FROM queuetbl
   WHERE date_sched='$schedule_date'
     AND type_id='$type_id'
     AND doctor_id='$doctor_id'";
*/
$sql = "SELECT *  FROM queuetbl
   WHERE date_sched='$schedule_date'
     AND type_id='$type_id'
     AND doctor_id='$doctor_id'";
  $query = mysqli_query($conn, $sql);
  $priorityno=mysqli_num_rows($query);
  /*
  while($row = mysqli_fetch_assoc($query)){
    $num = $row["num"];
    $priorityno = ($num<>'' || $num<>NULL)? $num :0;
  }
  */
  //echo "priorityno :".$priorityno;
 // return ($priorityno>0) ? $priorityno+1 : $priorityno;
 return $priorityno+1;
 
}


 function getAppointmentList(){

   date_default_timezone_set('Asia/Manila');
   $date=date('Y-m-d');

    global $conn;
    $response=array();
    $admin_id = $_SESSION['id']; 

     $sql = "SELECT a.*, c.*, t.*, d.*  FROM appointtbl a
     LEFT JOIN clienttbl c ON a.client_id= c.client_id
     LEFT JOIN typetbl t ON a.type_id=t.type_id
     LEFT JOIN doctortbl d ON a.doctor_id=d.doctor_id 
     WHERE a.clinictype='$admin_id' ";

     $query = mysqli_query($conn, $sql);
     while($row = mysqli_fetch_assoc($query)){

       $appointment_id = $row["appointment_id"];
       $schedule_date = $row["schedule_date"];
       $name = $row["lastname"]. ', '.$row["firstname"];
       $date_requested = $row["date_requested"];
       $schedule_date = $row["schedule_date"];
       $type_id = $row["type_id"];
       $type_name = $row["type_name"];
       $room = $row["room"];
       $client_id = $row["client_id"];
       $doctor_id = $row["doctor_id"];
       $doctor_name = $row["doctor_name"];
       $status = $row["status"];
       $message = $row["message"];

     $response[]=array(
   				  "appointment_id"=>($appointment_id),
             "schedule_date"=>($schedule_date),
             "client_id"=>($client_id),
             "client_name"=>($name),
             "date_requested"=>($date_requested),
             "schedule_date"=>($schedule_date),
             "type_id"=>($type_id),
             "type_name"=>($type_name),
             "room"=>($room),
             "doctor_id"=>($doctor_id),
             "doctor_name"=>($doctor_name),
             "message"=>($message),
             "status"=>($status)
   				  );

     }
     return $response;



 }


?>
