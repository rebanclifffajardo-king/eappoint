<?php

session_start();
require_once("../../db/databaseConnection.php");

 $response=array();

$display=mysqli_real_escape_string($conn,$_POST['display']);

 //$display="log";

 if($display=="log") $response = getActivityLog();


 echo json_encode($response);
//functions -------------------------

 function getActivityLog(){
    global $conn;
    $response=array();
    
    //$id="1";
     $sql = "SELECT * FROM activitylog ORDER BY id DESC";

     $query = mysqli_query($conn, $sql);
     while($row = mysqli_fetch_assoc($query)){

       $id = $row["id"];
       $transaction = $row["transaction"];
       $date_ = $row["date_"];
       $time = $row["time"];

     $response[]=array(
   				   "id"=>($id),
             "transaction"=>($transaction),
             "date_"=>($date_),
             "time"=>($time)
   				  );

     }
     return $response;



 }
?>
