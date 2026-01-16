<?php

 
class Clinic{
  public $id;
  public $clinic_name; 
  public $address;
  public $latitude;
  public $longitude;
}
class Queue{
	public $id;
	public $priorityno;
	public $client_id;
	public $type_id;
	public $doctor_id;
	public $clinictype;
	public $datetime_sched;
	public $date_sched;
	public $status;
  }

class Client{
  public $client_id;
  public $username;
  public $password;
  public $firstname;
  public $lastname;
  public $email;
  public $phone;
  public $picture;
}

class Referral{
	public $id;
	public $client_id;
	public $message;
	public $file_attached;
	public $date_sent;
	public $type;
	public $sender;
	public $receiver;
	public $status;
  }
  class Appointment_{
	public $appointment_id;
	public $schedule_date;
	public $patient_name;
	public $message;
	public $doctor_id;
	public $type_id;
	public $client_id;
	public $clinictype;
	public $date_requested;
	public $status;
  }
  function class_getQueueData($id){
	global $conn;
	  $queue = new Queue();
  
	  $sql = " SELECT *  FROM queuetbl WHERE id='$id' ";
  
	  $query = mysqli_query($conn, $sql);
	  while($row = mysqli_fetch_assoc($query)){
  
		  $queue->id = $row["id"];
		  $queue->priorityno = $row["priorityno"];
		  $queue->client_id = $row["client_id"];
		  $queue->type_id = $row["type_id"];
		  $queue->doctor_id = $row["doctor_id"];
		  $queue->clinictype = $row["clinictype"];
		  $queue->datetime_sched = $row["datetime_sched"];
		  $queue->date_sched = $row["date_sched"];
		  $queue->status = $row["status"];
		 
  
	  
  
	  }
	  return $queue;
  
  }
  function class_getAppointmentData($id){
	global $conn;
	  $appointment = new Appointment();
  
	  $sql = " SELECT *  FROM appointtbl WHERE appointment_id='$id' ";
  
	  $query = mysqli_query($conn, $sql);
	  while($row = mysqli_fetch_assoc($query)){
  
		  $appointment->appointment_id = $row["appointment_id"];
		  $appointment->schedule_date = $row["schedule_date"];
		  $appointment->patient_name = $row["patient_name"];
		  $appointment->message = $row["message"];
		  $appointment->doctor_id = $row["doctor_id"];
		  $appointment->type_id = $row["type_id"];
		  $appointment->client_id = $row["client_id"];
		  $appointment->clinictype = $row["clinictype"];
		  $appointment->date_requested = $row["date_requested"];
		  $appointment->status = $row["status"];
  
	  
  
	  }
	  return $appointment;
  
  }
  function class_getReferralData($id){
	global $conn;
	  $referral = new Referral();
  
	  $sql = " SELECT *  FROM referraltbl WHERE id='$id' ";
  
	  $query = mysqli_query($conn, $sql);
	  while($row = mysqli_fetch_assoc($query)){
  
		  $referral->id = $row["id"];
		  $referral->client_id = $row["client_id"];
		  $referral->message = $row["message"];
		  $referral->file_attached = $row["file_attached"];
		  $referral->date_sent = $row["date_sent"];
		  $referral->type = $row["type"];
		  $referral->sender = $row["sender"];
		  $referral->receiver = $row["receiver"];
		  $referral->status = $row["status"];
  
	  
  
	  }
	  return $referral;
  
  }
function class_getClinicData($id){
  global $conn;
	$clinic = new Clinic();

	$sql = " SELECT *  FROM clinictbl WHERE id='$id' ";

	$query = mysqli_query($conn, $sql);
	while($row = mysqli_fetch_assoc($query)){

		$clinic->id = $row["id"];
		$clinic->clinic_name = $row["clinic_name"]; 
		$clinic->address = $row["address"];
		$clinic->latitude = $row["latitude"];
		$clinic->longitude = $row["longitude"];

	

	}
	return $clinic;

}


function class_getClientData($id){
  global $conn;
	$client = new Client();

	$sql = " SELECT *  FROM clienttbl WHERE client_id='$id' ";

	$query = mysqli_query($conn, $sql);
	while($row = mysqli_fetch_assoc($query)){

		$client->client_id = $row["client_id"];
		$client->username = $row["username"];
		$client->password = $row["password"];
		$client->firstname = $row["firstname"];
		$client->lastname = $row["lastname"];
		$client->email = $row["email"];
		$client->phone = $row["phone"];
		$client->picture = $row["picture"];

	

	}
  
	return $client;
  
}


function sendNotif_Log(Clinic $sender_info,Clinic $receiver_info,$not_message,$log_message,$type) {
	global $conn;
	date_default_timezone_set('Asia/Manila');
	$date_sent=date('Y-m-d h:i:s');
	$time_sent=date('h:i a');
	$date1_sent=date('Y-m-d');
  
	$sql = "INSERT INTO notificationtbl_admin(transaction,date_,user_id,seen,type)
	VALUES
	('$not_message','$date_sent','$receiver_info->id',0,'$type')";
	$query=mysqli_query($conn,$sql);
   
	$sql1 = "INSERT INTO countnotiftbl_admin(user_id)
	VALUES
	('$receiver_info->id')";
	$query1=mysqli_query($conn,$sql1);
  
	 
	$sql2 = "INSERT INTO activitylog(transaction,date_,time,user_id)
	VALUES
	('$log_message','$date1_sent','$time_sent','$sender_info->id')";
	$query2=mysqli_query($conn,$sql2);
  
  
   }
   function sendNotif_Log_User(Client $client_info,Clinic $adminclinic_info,$not_message,$log_message,$type) {
	global $conn;
	date_default_timezone_set('Asia/Manila');
	$date_sent=date('Y-m-d h:i:s');
	$time_sent=date('h:i a');
	$date1_sent=date('Y-m-d');
  
	$sql = "INSERT INTO notificationtbl_user(transaction,date_,user_id,seen,type)
	VALUES
	('$not_message','$date_sent','$client_info->client_id',0,'$type')";
	$query=mysqli_query($conn,$sql);
   
	$sql1 = "INSERT INTO countnotiftbl_user(user_id)
	VALUES
	('$client_info->client_id')";
	$query1=mysqli_query($conn,$sql1);
  
	 
	$sql2 = "INSERT INTO activitylog(transaction,date_,time,user_id)
	VALUES
	('$log_message','$date1_sent','$time_sent','$adminclinic_info->id')";
	$query2=mysqli_query($conn,$sql2);
  
  
   }
   function send_Log_Admin_Settings($admin_id,$log_message){
	global $conn;
	date_default_timezone_set('Asia/Manila');
	$date_sent=date('Y-m-d h:i:s');
	$time_sent=date('h:i a');
	$date1_sent=date('Y-m-d');
  
	 
	$sql2 = "INSERT INTO activitylog(transaction,date_,time,user_id)
	VALUES
	('$log_message','$date1_sent','$time_sent','$admin_id')";
	$query2=mysqli_query($conn,$sql2);
  
  
   }
   function send_Log_User_Settings($id,$log_message){
	global $conn;
	date_default_timezone_set('Asia/Manila');
	$date_sent=date('Y-m-d h:i:s');
	$time_sent=date('h:i a');
	$date1_sent=date('Y-m-d');
  
	 
	$sql2 = "INSERT INTO activitylog_user(transaction,date_,time,user_id)
	VALUES
	('$log_message','$date1_sent','$time_sent','$id')";
	$query2=mysqli_query($conn,$sql2);
  
  
   }
   function sendNotiftoAdmin($id,$not_message,$type){
	global $conn;
	date_default_timezone_set('Asia/Manila');
	$date_sent=date('Y-m-d h:i:s');
	$time_sent=date('h:i a');
	$date1_sent=date('Y-m-d');
  
	$sql = "INSERT INTO notificationtbl_admin(transaction,date_,user_id,seen,type)
	VALUES
	('$not_message','$date_sent','$id',0,'$type')";
	$query=mysqli_query($conn,$sql);
   
	$sql1 = "INSERT INTO countnotiftbl_admin(user_id)
	VALUES
	('$id')";
	$query1=mysqli_query($conn,$sql1);
  
   }
?>
