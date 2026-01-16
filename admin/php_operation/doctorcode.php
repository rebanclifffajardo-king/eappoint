<?php

session_start();
require_once("../../db/databaseConnection.php");

 $response=array();

$display=mysqli_real_escape_string($conn,$_POST['display']);


  // $display="update_doctor";

 if($display=="all") $response = getDoctorlist1(); 
 if($display=="doctorsched") $response = getDoctorSched(); 
 if($display=="daysched") $response = getDoctorDay(); 
 if($display=="changeschedule") $response = changeschedule(); 
 if($display=="update_doctor") $response = updateDoctor(); 
 if($display=="type") $response = getType_Doc();
 
 echo json_encode($response);
//functions ------------------------- 
function updateDoctor(){
  global $conn;
  $response=array();
  $doctorname=mysqli_real_escape_string($conn,$_POST['doctorname']);
  $seltype=mysqli_real_escape_string($conn,$_POST['seltype']);
  $phone=mysqli_real_escape_string($conn,$_POST['phone']);
  $email=mysqli_real_escape_string($conn,$_POST['email']);
  $doctorid=mysqli_real_escape_string($conn,$_POST['doctorid']);

  $status = "";
  $error = "";


  if($doctorid==""){
    $status = "error";
    $error = "Empty Fields";
  }

  if($error==""){
  $sql = "UPDATE doctortbl SET 
   doctor_name='$doctorname',
   type_id='$seltype',
   phone='$phone',
   email='$email'
    WHERE doctor_id='$doctorid'  ";
  $query = mysqli_query($conn,$sql);
      if($query){
        $status = "success";
        $error = "";

      }
  }
  
  $response[]=array(
    "status"=>($status),
     "error"=>($error)
    );
return $response;


 }
function getDoctorDay(){
 

  global $conn;
  $response=array();
  $doctor_id=mysqli_real_escape_string($conn,$_POST['id']);
  $mon = getDaysched($doctor_id,'Monday');
  $tue = getDaysched($doctor_id,'Tuesday');
  $wed = getDaysched($doctor_id,'Wednesday');
  $thu = getDaysched($doctor_id,'Thursday');
  $fri = getDaysched($doctor_id,'Friday');
  $sat = getDaysched($doctor_id,'Saturday');
  $sun = getDaysched($doctor_id,'Sunday');

$response[]=array(
        "mon"=>($mon),
        "tue"=>($tue),
        "wed"=>($wed),
        "thu"=>($thu),
        "fri"=>($fri),
        "sat"=>($sat),
        "sun"=>($sun)
        );
   return $response;



}

function getType_Doc(){
  global $conn;
  $response=array();

 $response=array(
         "types"=>(getTypes())
         );


 return $response;
}
function getTypes(){
  global $conn;
  $types=array();
  $admin_id = $_SESSION['id'];
  $sql = "SELECT * FROM typetbl WHERE clinictype='$admin_id' ";
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
 function changeschedule(){
  global $conn;
  $response=array();
  $id=mysqli_real_escape_string($conn,$_POST['id']);
  $monday_start=mysqli_real_escape_string($conn,$_POST['monday_start']);
  $tuesday_start=mysqli_real_escape_string($conn,$_POST['tuesday_start']);
  $wednesday_start=mysqli_real_escape_string($conn,$_POST['wednesday_start']);
  $thursday_start=mysqli_real_escape_string($conn,$_POST['thursday_start']);
  $friday_start=mysqli_real_escape_string($conn,$_POST['friday_start']);
  $saturday_start=mysqli_real_escape_string($conn,$_POST['saturday_start']);
  $sunday_start=mysqli_real_escape_string($conn,$_POST['sunday_start']);
  
  $monday_end=mysqli_real_escape_string($conn,$_POST['monday_end']);
  $tuesday_end=mysqli_real_escape_string($conn,$_POST['tuesday_end']);
  $wednesday_end=mysqli_real_escape_string($conn,$_POST['wednesday_end']);
  $thursday_end=mysqli_real_escape_string($conn,$_POST['thursday_end']);
  $friday_end=mysqli_real_escape_string($conn,$_POST['friday_end']);
  $saturday_end=mysqli_real_escape_string($conn,$_POST['saturday_end']);
  $sunday_end=mysqli_real_escape_string($conn,$_POST['sunday_end']);
   
 
  
  $mon_consultation_time=mysqli_real_escape_string($conn,$_POST['mon_consultation_time']);
  $mon_max_client=mysqli_real_escape_string($conn,$_POST['mon_max_client']);
  $tue_consultation_time=mysqli_real_escape_string($conn,$_POST['tue_consultation_time']);
  $tue_max_client=mysqli_real_escape_string($conn,$_POST['tue_max_client']);
  $wed_consultation_time=mysqli_real_escape_string($conn,$_POST['wed_consultation_time']);
  $wed_max_client=mysqli_real_escape_string($conn,$_POST['wed_max_client']);
  $thu_consultation_time=mysqli_real_escape_string($conn,$_POST['thu_consultation_time']);
  $thu_max_client=mysqli_real_escape_string($conn,$_POST['thu_max_client']);
  $fri_consultation_time=mysqli_real_escape_string($conn,$_POST['fri_consultation_time']);
  $fri_max_client=mysqli_real_escape_string($conn,$_POST['fri_max_client']);
  $sat_consultation_time=mysqli_real_escape_string($conn,$_POST['sat_consultation_time']);
  $sat_max_client=mysqli_real_escape_string($conn,$_POST['sat_max_client']);
  $sun_consultation_time=mysqli_real_escape_string($conn,$_POST['sun_consultation_time']);
  $sun_max_client=mysqli_real_escape_string($conn,$_POST['sun_max_client']);
  
  
  $status = "";
  $error = "";


  if($id==""){
    
 

    
    $status = "error";
    $error = "No doctor selected";
  }


if($error==""){
 
  


  processSched("Monday",$mon_consultation_time, $monday_start, $monday_end, $mon_max_client, $id );
  processSched("Tuesday",$tue_consultation_time, $tuesday_start, $tuesday_end, $tue_max_client, $id);
  processSched("Wednesday",$wed_consultation_time, $wednesday_start, $wednesday_end, $wed_max_client, $id );
  processSched("Thursday",$thu_consultation_time, $thursday_start, $thursday_end, $thu_max_client, $id );
  processSched("Friday",$fri_consultation_time, $friday_start, $friday_end, $fri_max_client, $id);
  processSched("Saturday",$sat_consultation_time, $saturday_start, $saturday_end, $sat_max_client , $id);
  processSched("Sunday",$sun_consultation_time, $sunday_start, $sunday_end,$sun_max_client, $id);
   
  $status = "success";
}
$response[]=array(
       "status"=>($status),
        "error"=>($error)
       );
return $response;

 }
 function processSched($day_,$consultation_time, $consultation_start, $consultation_end, $max_client, $doctor_id){
  /*
  if(checkExistSched($doctor_id,$day_)==0)
    insertSchedDay($day_,$consultation_time, $consultation_start, $consultation_end, $max_client, $doctor_id);
  else
    updateSchedDay($consultation_time,$max_client, $consultation_start, $consultation_end, $day_, $doctor_id);
    
    */
    updateSchedDay($consultation_time,$max_client, $consultation_start, $consultation_end, $day_, $doctor_id);

 }
 function updateSchedDay($time,$max, $start, $end, $day_, $doctor_id){
  global $conn;
  $concat ="";
  if($start<>"" && $end<>"")   $concat =", consultation_start='$start', consultation_end='$end'";
  if($time=="") $time= "0";
  if($max=="") $max= "0";

  $sql = "UPDATE schedtbl SET consultation_time='$time', max_client='$max' $concat WHERE doctor_id='$doctor_id' AND day_='$day_' ";
  $query = mysqli_query($conn,$sql);

 }

 function insertSchedDay($day_,$consultation_time, $consultation_start, $consultation_end, $max_client, $doctor_id){
  global $conn;
  $sql = "INSERT INTO schedtbl(day_,consultation_time,consultation_start,consultation_end,max_client,doctor_id)
                VALUES('$day_','$consultation_time','$consultation_start','$consultation_end','$max_client','$doctor_id') ";
  $query = mysqli_query($conn,$sql);

 }

 function getDoctorSched(){
  global $conn;
  $id=mysqli_real_escape_string($conn,$_POST['id']);
  //$id="1";

    $response=array();

     $sql = "SELECT * FROM schedtbl WHERE doctor_id='$id' ";

     $query = mysqli_query($conn, $sql);
     while($row = mysqli_fetch_assoc($query)){

       $id = $row["id"];
       $day_ = $row["day_"];
       $consultation_time = $row["consultation_time"];
       $consultation_start = $row["consultation_start"];
       $consultation_end = $row["consultation_end"];
       $max_client = $row["max_client"];
       $doctor_id = $row["doctor_id"]; 
   
     $response[]=array(
   				   "id"=>($id),
             "day_"=>($day_),
             "consultation_time"=>($consultation_time),
             "consultation_start"=>($consultation_start),
             "consultation_end"=>($consultation_end),
             "max_client"=>($max_client),
             "doctor_id"=>($doctor_id)
   				  );

     }
     return $response;



 }

 function getDoctorlist1(){
 

  global $conn;
  $response=array();
  $admin_id = $_SESSION['id']; 
   $sql = "SELECT d.*, s.*, t.* FROM doctortbl d
   LEFT JOIN typetbl t ON d.type_id=t.type_id
   INNER JOIN schedtbl s ON d.doctor_id=s.doctor_id 
   WHERE d.clinictype='$admin_id'
   GROUP BY s.doctor_id";

   $query = mysqli_query($conn, $sql);
   while($row = mysqli_fetch_assoc($query)){

     $doctor_id = $row["doctor_id"];
     $doctor_name = $row["doctor_name"];
     $doctor_status = $row["doctor_status"];
     $doctor_pic = $row["doctor_pic"];
     $type_name = $row["type_name"];
     $type_id = $row["type_id"];
     $room = $row["room"];
     $phone = $row["phone"];
     $email = $row["email"];
     $max_client = $row["max_client"]; 

     /*
    
     $mon = getDaysched($doctor_id,'Monday');
     $tue = getDaysched($doctor_id,'Tuesday');
     $wed = getDaysched($doctor_id,'Wednesday');
     $thu = getDaysched($doctor_id,'Thursday');
     $fri = getDaysched($doctor_id,'Friday');
     $sat = getDaysched($doctor_id,'Saturday');
     $sun = getDaysched($doctor_id,'Sunday');
*/
   $response[]=array(
           "doctor_id"=>($doctor_id),
           "doctor_name"=>($doctor_name),
           "doctor_status"=>($doctor_status),
           "doctor_pic"=>($doctor_pic),
           "type_id"=>($type_id),
           "type_name"=>($type_name),
           "room"=>($room),
           "phone"=>($phone),
           "email"=>($email),
           "max_client"=>($max_client)
           /*
           "mon"=>($mon),
           "tue"=>($tue),
           "wed"=>($wed),
           "thu"=>($thu),
           "fri"=>($fri),
           "sat"=>($sat),
           "sun"=>($sun)
           */
           );

   }
   return $response;



}
 function getDoctorlist(){
 

    global $conn;
    $response=array();

     $sql = "SELECT d.*, s.*, t.* FROM doctortbl d
     LEFT JOIN typetbl t ON d.type_id=t.type_id
     INNER JOIN schedtbl s ON d.doctor_id=s.doctor_id GROUP BY s.doctor_id";

     $query = mysqli_query($conn, $sql);
     while($row = mysqli_fetch_assoc($query)){

       $doctor_id = $row["doctor_id"];
       $doctor_name = $row["doctor_name"];
       $doctor_status = $row["doctor_status"];
       $doctor_pic = $row["doctor_pic"];
       $type_name = $row["type_name"];
       $room = $row["room"];
       $max_client = $row["max_client"]; 
  
      
       $mon = getDaysched($doctor_id,'Monday');
       $tue = getDaysched($doctor_id,'Tuesday');
       $wed = getDaysched($doctor_id,'Wednesday');
       $thu = getDaysched($doctor_id,'Thursday');
       $fri = getDaysched($doctor_id,'Friday');
       $sat = getDaysched($doctor_id,'Saturday');
       $sun = getDaysched($doctor_id,'Sunday');

     $response[]=array(
   				  "doctor_id"=>($doctor_id),
             "doctor_name"=>($doctor_name),
             "doctor_status"=>($doctor_status),
             "doctor_pic"=>($doctor_pic),
             "type_name"=>($type_name),
             "room"=>($room),
             "max_client"=>($max_client),
             "mon"=>($mon),
             "tue"=>($tue),
             "wed"=>($wed),
             "thu"=>($thu),
             "fri"=>($fri),
             "sat"=>($sat),
             "sun"=>($sun)
   				  );

     }
     return $response;



 }
 function checkExistSched($doctor_id,$day){
    global $conn;
    $sql = " SELECT * FROM schedtbl WHERE doctor_id='$doctor_id' AND day_='$day' ";
		$query = mysqli_query($conn, $sql);
		$exist = mysqli_num_rows($query);
    return $exist;
 }

 function getDaysched($doctor_id,$day){
  global $conn;
  $schedule=array();
  $sql = " SELECT * FROM schedtbl WHERE doctor_id='$doctor_id' AND day_='$day' ";

		$query = mysqli_query($conn, $sql);
		while($row = mysqli_fetch_assoc($query)){
		
		$id = $row["id"];
		$consultation_time = $row["consultation_time"];
		$consultation_start = $row["consultation_start"];
		$consultation_start_or = $row["consultation_start"];
		$consultation_end = $row["consultation_end"];
		$consultation_end_or = $row["consultation_end"];
		$max_client = $row["max_client"];
		$consultation_start =	date_format(date_create($consultation_start), 'h:i a');
		$consultation_end =	date_format(date_create($consultation_end), 'h:i a');
	
    $schedule[]=array(
      "id"=>($id),
      "day_"=>($day),
      "consultation_time"=>($consultation_time),
      "consultation_start"=>($consultation_start),
      "consultation_start_or"=>($consultation_start_or),
      "consultation_end"=>($consultation_end),
      "consultation_end_or"=>($consultation_end_or),
      "max_client"=>($max_client)
      );
  }
  return $schedule;
 }

 

?>
