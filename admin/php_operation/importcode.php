<?php

session_start();
require_once("../../db/databaseConnection.php");
include 'classes.php';

 $response=array();

$display=mysqli_real_escape_string($conn,$_POST['display']);

//$display="all";

 if($display=="import") $response = importFile();
 if($display=="all") $response = getImportList();
 if($display=="delete") $response = deleteImportData();
 


 echo json_encode($response);
//functions -------------------------

function deleteImportData(){
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
  
    $sql = "DELETE FROM importtbl WHERE id='$id' ";
    $query = mysqli_query($conn,$sql);
    if($query){
      $status = "success";
      $error = "";
    }
    else {
      $status = "error";
      $error = "Cant delete data! Please try again!";
    }
  
  
  }
  
  
  $response[]=array(
          "status"=>($status),
          "error"=>($error)
          );
  
   return $response;



}

function getImportList(){
  global $conn;
  $response=array();

  $admin_id = $_SESSION['id'];
   $sql = "SELECT i.*,d.doctor_name,t.type_name FROM importtbl i 
   LEFT JOIN doctortbl d ON d.doctor_id=i.doctor_id 
   LEFT JOIN typetbl t ON t.type_id=i.type_id 
   WHERE clinic_id='$admin_id' ";

   $query = mysqli_query($conn, $sql);
   while($row = mysqli_fetch_assoc($query)){

     $id = $row["id"];
     $name = $row["name"];
     $schedule_date = $row["schedule_date"];
     $minutes_done = $row["minutes_done"]; 
     $doctor_name= $row["doctor_name"];
     $doctor_name= ($doctor_name==null || $doctor_name=="")?"-":$doctor_name;
     $type= $row["type_name"];

     
   $response[]=array(
           "id"=>($id),
           "name"=>($name),
           "schedule_date"=>($schedule_date),
           "minutes_done"=>($minutes_done), 
           "doctor"=>($doctor_name),
           "type"=>($type)
           );

   }
   return $response;



}
 
function checkExistEntry($name,$schedule_date,$clinic_id,$doctor_id,$type_id){
  global $conn;
  $sql=mysqli_query($conn,"SELECT * FROM importtbl 
  WHERE name='$name' AND 
  schedule_date='$schedule_date'  AND 
  clinic_id='$clinic_id' AND
  doctor_id='$doctor_id' AND
  type_id='$type_id' ");
  $exist= mysqli_num_rows($sql);
  if($exist>0)return true;
  else return false;
  
  }
function importFile(){
  global $conn;
  $response=array();

  $importArray=$_POST['importArray'];
   
  
  $importArray = json_decode($importArray);

  $status = "";
  $error = "";
 

  if($importArray=="" || $importArray==null){
    $status = "error";
    $error = "Empty Fields";
  }

 

  if($error==""){

    for($x = 0; $x < count($importArray); $x++)
    {
        if(isset($importArray[$x]))
        {
            $name = $importArray[$x]->name;
            $minutes_done = intval($importArray[$x]->minutes_done);
            $clinic_id = $importArray[$x]->clinic_id;
            $doctor_id = $importArray[$x]->doctor_id;
            $type_id = $importArray[$x]->type_id;
            $schedule_date = $importArray[$x]->schedule_date;
            $schedule_date =date_format(date_create($schedule_date), 'Y-m-d');
         
            if(!checkExistEntry($name,$schedule_date,$clinic_id,$doctor_id,$type_id)){
              $sql = "INSERT INTO importtbl(name,schedule_date,minutes_done,clinic_id,doctor_id,type_id)
              VALUES ('$name','$schedule_date','$minutes_done','$clinic_id','$doctor_id','$type_id') ";
              $query = mysqli_query($conn,$sql);

            }
            
        } 
    }

   

    $status = "success";
    $error = "";
  }
   

  $response[]=array(
          "status"=>($status),
          "error"=>($error)
          );


   return $response;
}
?>
