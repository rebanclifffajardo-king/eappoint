<?php
session_start();
require_once("../../db/databaseConnection.php");
include 'image_compressed.php';
include '../../admin/php_operation/classes.php';

 $response=array();

$id=mysqli_real_escape_string($conn,$_POST['id']);
/* Getting file name */
$name = $_FILES['file']['name'];
$fileType = $_FILES['file']['type'];
$temp_name  = $_FILES['file']['tmp_name'];
$allowed = array("image/jpeg", "image/gif", "image/png");
 
$location = "../../images/doctors/";
$file_path = "../../images/doctors/";


$status = "";
$error = "";

 

if($error==""){

  if(!in_array($fileType, $allowed)) {
    $error = 'Only jpg, gif, and png files are allowed.';


  }else{
    /*
  				$name = md5(rand(100, 200));
                  $ext = explode('.', $_FILES['file']['name']);
                  $filename = $name . '.' . $ext[1];
                  $destination = '../../img/faculty_imgs/'.$id.'/'. $filename; //change this directory
                  $final_filename = $id.'/'.$filename;
*/
                  $name = substr(str_shuffle("1234567890abcdefghijklmnopqrstuvwxyz"), 0, 5);
                  $ext = explode('.', $_FILES['file']['name']);
                  $filename_val = 'user-'. $name . '.' . $ext[1];
                  $doctorpic = "users/".$filename_val;
              


    /* Upload file */

    //; // user id, name, temp name, location, width, height //
    //  if(move_uploaded_file($_FILES['file']['tmp_name'],$destination)){
        if(saveImage($filename_val)==""){

  
  $sql = "UPDATE clienttbl SET picture='$doctorpic' WHERE client_id='$id' ";
  $query=mysqli_query($conn,$sql);
	 

  if($query){
    $status = "success";
    $error = "";

     

    $log_message ="You have updated your user profile picture.";
    send_Log_User_Settings($id,$log_message);

    

  }else{
    $status = "error";
    $error = "Error in inserting picture";

  }
      }
  else {
    $status = "error";
    $error = "Error in uploading the file";
  }


}

}
$response[]=array(
        "status"=>($status),
        "error"=>($error)
        );

        
 echo json_encode($response);


 



?>
