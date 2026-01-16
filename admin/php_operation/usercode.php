<?php

session_start();
require_once("../../db/databaseConnection.php");

 $response=array();

$display=mysqli_real_escape_string($conn,$_POST['display']);



  //$display="all";

 if($display=="all") $response = getUserList(); 


 echo json_encode($response);
//functions ------------------------- 


 function getUserList(){

   date_default_timezone_set('Asia/Manila');
   $date=date('Y-m-d');

    global $conn;
    $response=array();
    $admin_id = $_SESSION['id'];

     $sql = "SELECT *  FROM clienttbl c INNER JOIN appointtbl a ON c.client_id=a.client_id WHERE a.clinictype='$admin_id'  ";

     $query = mysqli_query($conn, $sql);
     while($row = mysqli_fetch_assoc($query)){

       $client_id = $row["client_id"];
       $username = $row["username"];
       $name = $row["lastname"]. ', '.$row["firstname"];
       $email = $row["email"];
       $phone = $row["phone"]; 

     $response[]=array(
   				  "client_id"=>($client_id),
             "username"=>($username),
             "name"=>($name),
             "email"=>($email),
             "phone"=>($phone)
   				  );

     }
     return $response;



 }


?>
