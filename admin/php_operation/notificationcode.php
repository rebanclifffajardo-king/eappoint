<?php

session_start();
require_once("../../db/databaseConnection.php");

 $response=array();

$display=mysqli_real_escape_string($conn,$_POST['display']);



 // $display="admin";

 if($display=="admin") $response = getNotifAdmin();
 if($display=="all") $response = getNotifAll();
 if($display=="delete") $response = deleteNotifCount();
 


 echo json_encode($response);
//functions -------------------------

function deleteNotifCount(){
   
    global $conn;
    $response=array();
    $admin_id = $_SESSION['id'];

    mysqli_query($conn,"DELETE FROM countnotiftbl_admin WHERE user_id='$admin_id'");
   
    $response[]=array(
      "status"=>('success'),
       "error"=>('')
      );
    return $response;



 }
function getNotifAll(){
  $admin_id = $_SESSION['id'];
   date_default_timezone_set('Asia/Manila');
   $date=date('Y-m-d');
  
    global $conn;
    $response=array();

     $sql = "SELECT * FROM notificationtbl_admin WHERE user_id='$admin_id'  ORDER BY id DESC LIMIT 4  ";

     $query = mysqli_query($conn, $sql);
     while($row = mysqli_fetch_assoc($query)){

       $id = $row["id"];
       $transaction = $row["transaction"];
       $date_ = $row["date_"];
       $date_ =  date_format(date_create($date_), 'Y-m-d h:i a');
       $seen = $row["seen"];
       $type = $row["type"];
      
      
     $response[]=array(
   				  "id"=>($id),
             "transaction"=>($transaction),
             "date_"=>($date_), 
             "seen"=>($seen),
             "type"=>($type)
     );

     }

     return $response;



 }
function getNotifAdmin(){
  $admin_id = $_SESSION['id'];
   date_default_timezone_set('Asia/Manila');
   $date=date('Y-m-d');
  
    global $conn;
    $response=array();

     $sql = "SELECT * FROM notificationtbl_admin WHERE user_id='$admin_id'  ORDER BY id DESC LIMIT 4  ";

     $query = mysqli_query($conn, $sql);
     while($row = mysqli_fetch_assoc($query)){

       $id = $row["id"];
       $transaction = $row["transaction"];
       $date_ = $row["date_"];
     
       $seen = $row["seen"];
       $type = $row["type"];
       $timedif=timediff($date_);
      
     $response[]=array(
   				  "id"=>($id),
             "transaction"=>($transaction),
             "date_"=>($date_),
             "timedif"=>($timedif),
             "seen"=>($seen),
             "type"=>($type)
     );

     }
     $response[]=array(
      "countnotif"=>(countnotif($admin_id))
    );

     return $response;



 }
 	function countnotif($admin_id){
		global $conn;
	   $sql=mysqli_query($conn,"SELECT * FROM countnotiftbl_admin WHERE user_id='$admin_id'");
		$numrow = mysqli_num_rows($sql);
		return $numrow;
 
	}
	
function timediff($date_req) {
	date_default_timezone_set('Asia/Manila');
	$date_today=date('Y-m-d H:i:s');
	//$date_old=date("2021-10-24 21:00:00");
	$date_old=date($date_req);
	 
	  
	$date1=strtotime($date_old);
	$date2=strtotime($date_today);
	 
	 
  	$difference = abs($date1 - $date2)/3600; //hours
  	$difference1 = $difference*60; //minutes
	$whole = floor($difference1); 
	$difference2 = ($difference1 - $whole)*60; //seconds
   
	$display="-";
	$c_time =floor($difference);
 	if($c_time>=24 ) $display=  floor($c_time/24). grammar("day",floor($c_time/24))." Ago";
	else if($difference>=1 ) $display=  floor($difference). grammar("hr",floor($difference))." Ago";
    else if($difference1>=1) $display=  floor($difference1). grammar("min",floor($difference1))." Ago";
    else if($difference2>=1) $display=  floor($difference2). grammar("sec",floor($difference2))." Ago";
	else  $display=  floor(diff($date1, $date2)). grammar("day",floor(diff($date1, $date2)))." Ago";	
 
	//echo "<br/> DISPLAY: " .$display;
	
	return $display;
   
	
	
}

function grammar($label,$time){
  if($time==1 && $label=="hr") return " Hr";
  if($time>1 && $label=="hr") return " Hrs";
  if($time==1 && $label=="min") return " Min";
  if($time>1 && $label=="min") return " Mins";
  if($time==1 && $label=="sec") return " Sec";
  if($time>1 && $label=="sec") return " Secs";
  if($time==1 && $label=="day") return " Day";
  if($time>1 && $label=="day") return " Days";
}


function diff($date1, $date2) {
  $diff = abs(strtotime($date2) - strtotime($date1));
  $years = floor($diff / (365*60*60*24));
  $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
  $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24) / (60*60*24));
  
  return $days;
}
?>
