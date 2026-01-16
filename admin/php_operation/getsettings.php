<?php

session_start();
require_once("../../db/databaseConnection.php");

 $response=array();



  $sql = "SELECT * FROM categorytbl ";


  $query = mysqli_query($conn, $sql);
  while($row = mysqli_fetch_assoc($query)){

    $id = $row["id"];
    $name = $row["name"];



  $response[]=array(
				  "id"=>($id),
				  "name"=>($name)
				  );

  }



 echo json_encode($response);


?>
