<?php
session_start();
require_once("../../db/databaseConnection.php");
include 'image_compressed.php';
include 'classes.php';

 $response=array();
 
$display=mysqli_real_escape_string($conn,$_POST['display']);
if($display=="add") $response = addDoctorImg('add');
if($display=="update") $response = addDoctorImg('update');
 
echo json_encode($response);

function addDoctorImg($displaytype){
  global $conn;
  $response=array();

$doctorname=mysqli_real_escape_string($conn,$_POST['doctorname']);
$seltype=mysqli_real_escape_string($conn,$_POST['seltype']);
$phone=mysqli_real_escape_string($conn,$_POST['phone']);
$email=mysqli_real_escape_string($conn,$_POST['email']);
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
                  $filename_val = 'doctor-'. $name . '.' . $ext[1];
                  $doctorpic = "doctors/".$filename_val;
              


    /* Upload file */

    //; // user id, name, temp name, location, width, height //
    //  if(move_uploaded_file($_FILES['file']['tmp_name'],$destination)){
        if(saveImage($filename_val)==""){

            if($displaytype=='add'){
                  $admin_id = $_SESSION['id']; 
                  $sql = "INSERT INTO doctortbl(doctor_name,type_id,doctor_status,doctor_pic,phone,email,clinictype)
                  VALUES
                  ('$doctorname','$seltype','available','$doctorpic','$phone','$email','$admin_id')";
                  $query=mysqli_query($conn,$sql);
                  $query_id=mysqli_insert_id($conn);
                  addSchedule($query_id);

                  if($query){
                  $status = "success";
                  $error = "";

                  $admin_id = $_SESSION['id'];
                  $log_message =" You have added a new doctor named " . $doctorname;
                  send_Log_Admin_Settings($admin_id,$log_message);



                  }else{
                  $status = "error";
                  $error = "Error in inserting picture";

                  }

            }
            if($displaytype=='update'){
               
              $doctorid=mysqli_real_escape_string($conn,$_POST['doctorid']);

              $sql = "UPDATE doctortbl SET 
              doctor_name='$doctorname',
              type_id='$seltype',
              phone='$phone',
              email='$email',
              doctor_pic='$doctorpic'
               WHERE doctor_id='$doctorid'  ";
             $query = mysqli_query($conn,$sql);
                 if($query){
                   $status = "success";
                   $error = "";

                   $admin_id = $_SESSION['id'];
                   $log_message =" You have updated the details of " . $doctorname;
                   send_Log_Admin_Settings($admin_id,$log_message);
           
                 }


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

        
return $response;

      }

 function addSchedule($id){
  global $conn;
  $days = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday");

  foreach ($days as $day_) {
    $sql = "INSERT INTO schedtbl(day_,consultation_time,consultation_start,consultation_end,max_client,doctor_id)
    VALUES
    ('$day_','0','09:00:00','15:00:00', '0', '$id')";
    $query=mysqli_query($conn,$sql);

  }



 }



?>
