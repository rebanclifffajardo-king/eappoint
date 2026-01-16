<?php

session_start();
require_once("../../db/databaseConnection.php");
require_once("../curl/sendsms.php");
include 'classes.php';
 $response=array();

$display=mysqli_real_escape_string($conn,$_POST['display']);

 //$display="all";

 if($display=="all") $response = getQueueList();
 if($display=="completed") $response = getQueueListComplete();
 if($display=="noshow") $response = getQueueListnoshow();
 if($display=="queue") $response = updateQueue();
 if($display=="client") $response = getQueueSpec();



 echo json_encode($response);
//functions -------------------------
function getQueueSpec(){
global $conn;
$response=array();


}
 function updateQueue(){
 global $conn;
 $response=array();

  $id=mysqli_real_escape_string($conn,$_POST['id']);
  $value=mysqli_real_escape_string($conn,$_POST['status']);


  $error = "";


  if($value==""){
    $status = "error";
    $error = "Empty Fields";
  }



if($error==""){

   $sql = "UPDATE queuetbl SET status='$value',priorityno=0 WHERE id='$id' ";
   $query = mysqli_query($conn,$sql);


  if($query){
    $status = "success";
    $error = "";
    getqueue();
    sendSMStothisId($id,$value);
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
 function getQueueList(){
   date_default_timezone_set('Asia/Manila');
   $date=date('Y-m-d');
   $admin_id = $_SESSION['id']; 
    global $conn;
    $response=array();

     $sql = "SELECT q.*, c.*, t.*, d.*  FROM queuetbl q
     LEFT JOIN clienttbl c ON q.client_id= c.client_id
     LEFT JOIN typetbl t ON q.type_id=t.type_id
     LEFT JOIN doctortbl d ON q.doctor_id=d.doctor_id
     WHERE  q.date_sched='$date' AND status NOT IN ('complete','noshow') 
     AND q.clinictype='$admin_id' ";

     $query = mysqli_query($conn, $sql);
     while($row = mysqli_fetch_assoc($query)){

       $id = $row["id"];
       $priorityno = $row["priorityno"];
       $name = $row["lastname"]. ', '.$row["firstname"];
       $date_sched = $row["date_sched"];
       $datetime_sched = $row["datetime_sched"];
       $type_name = $row["type_name"];
       $room = $row["room"];
       $doctor_name = $row["doctor_name"];
       $status = $row["status"];

     $response[]=array(
   				  "id"=>($id),
             "priorityno"=>($priorityno),
             "name"=>($name),
             "date_sched"=>($date_sched),
             "datetime_sched"=>($datetime_sched),
             "type_name"=>($type_name),
             "room"=>($room),
             "doctor_name"=>($doctor_name),
             "status"=>($status)
   				  );

     }
     return $response;



 }
 function getQueueListComplete(){
   date_default_timezone_set('Asia/Manila');
   $date=date('Y-m-d');
   $admin_id = $_SESSION['id']; 
    global $conn;
    $response=array();

     $sql = "SELECT q.*, c.*, t.*, d.*  FROM queuetbl q
     LEFT JOIN clienttbl c ON q.client_id= c.client_id
     LEFT JOIN typetbl t ON q.type_id=t.type_id
     LEFT JOIN doctortbl d ON q.doctor_id=d.doctor_id
     WHERE  q.date_sched='$date' AND status = 'complete' 
     AND q.clinictype='$admin_id' ";

     $query = mysqli_query($conn, $sql);
     while($row = mysqli_fetch_assoc($query)){

       $id = $row["id"];
       $priorityno = $row["priorityno"];
       $name = $row["lastname"]. ', '.$row["firstname"];
       $date_sched = $row["date_sched"];
       $datetime_sched = $row["datetime_sched"];
       $type_name = $row["type_name"];
       $room = $row["room"];
       $doctor_name = $row["doctor_name"];
       $status = $row["status"];

     $response[]=array(
   				  "id"=>($id),
             "priorityno"=>($priorityno),
             "name"=>($name),
             "date_sched"=>($date_sched),
             "datetime_sched"=>($datetime_sched),
             "type_name"=>($type_name),
             "room"=>($room),
             "doctor_name"=>($doctor_name),
             "status"=>($status)
   				  );

     }
     return $response;



 }
 
 function getQueueListnoshow(){
   date_default_timezone_set('Asia/Manila');
   $date=date('Y-m-d');
   $admin_id = $_SESSION['id']; 
    global $conn;
    $response=array();

     $sql = "SELECT q.*, c.*, t.*, d.*  FROM queuetbl q
     LEFT JOIN clienttbl c ON q.client_id= c.client_id
     LEFT JOIN typetbl t ON q.type_id=t.type_id
     LEFT JOIN doctortbl d ON q.doctor_id=d.doctor_id
     WHERE  q.date_sched='$date' AND status = 'noshow' 
     AND q.clinictype='$admin_id' ";

     $query = mysqli_query($conn, $sql);
     while($row = mysqli_fetch_assoc($query)){

       $id = $row["id"];
       $priorityno = $row["priorityno"];
       $name = $row["lastname"]. ', '.$row["firstname"];
       $date_sched = $row["date_sched"];
       $datetime_sched = $row["datetime_sched"];
       $type_name = $row["type_name"];
       $room = $row["room"];
       $doctor_name = $row["doctor_name"];
       $status = $row["status"];

     $response[]=array(
   				  "id"=>($id),
             "priorityno"=>($priorityno),
             "name"=>($name),
             "date_sched"=>($date_sched),
             "datetime_sched"=>($datetime_sched),
             "type_name"=>($type_name),
             "room"=>($room),
             "doctor_name"=>($doctor_name),
             "status"=>($status)
   				  );

     }
     return $response;



 }
 function getqueue(){
   global $conn;
   date_default_timezone_set('Asia/Manila');
   $date=date('Y-m-d');

   $sql = "SELECT q.*, c.phone  FROM queuetbl q  
            LEFT JOIN clienttbl c ON c.client_id=q.client_id
            WHERE q.status NOT IN ('complete','noshow')  AND q.date_sched='$date' ORDER BY q.priorityno ";
   $query = mysqli_query($conn, $sql);
   $no=0;
   while($row = mysqli_fetch_assoc($query)){

     $id = $row["id"];
     $phone = $row["phone"];
     $doctor_id = $row["doctor_id"];
 

     $pn = ++$no;
     reorderqueue($pn,$id);
     if($phone<>"") sendSMS($phone,$pn,$doctor_id,$date);
    

   }

 }

 function sendSMStothisId($id,$value){
  
  $queue_info = class_getQueueData($id);
  $client_info =  class_getClientData($queue_info->client_id);
 
  sendSMStoPhone($client_info->phone,$value,"-",'sms');

 


}

 function sendSMS($phone, $pn,$doctor_id,$date_sched){
  

  $schedule = getConsultationTime($doctor_id,$date_sched,$pn);

  /*
  $response[]=array(
    "remaining time:"=>($remaining),
    "phone:"=>($phone)
    );
*/
    sendSMStoPhone($phone,$schedule,$pn,'sms');

//return $response;


}



function getConsultationTime($doctor_id,$date_sched,$pn){
  global $conn;
	 
	$finaltime = '';
	$day = date('l', strtotime($date_sched));


		$sql = " SELECT * FROM schedtbl WHERE doctor_id='$doctor_id' AND day_='$day' ";

		$query = mysqli_query($conn, $sql);
		while($row = mysqli_fetch_assoc($query)){
		$consultation_time = $row["consultation_time"];
		$consultation_start = $row["consultation_start"];
    $total_time = ($consultation_time )* $pn;
   
    $time = date('H:i:s', strtotime($consultation_start. ' +'.$total_time.' minutes'));
    $finaltime =  date_format(date_create($time), 'h:i a');
  



	 	}


	return $finaltime;

}

 function reorderqueue($no,$id){
   global $conn;
   $sql = "UPDATE queuetbl SET priorityno='$no' WHERE id='$id' ";
    $query = mysqli_query($conn,$sql);

 }

 

?>
