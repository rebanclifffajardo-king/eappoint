<?php

session_start();
require_once("../../db/databaseConnection.php");


class Appointment
{
	public $appointment_id;
	public $total;
	public $room;
	public $consultation_time;
	public $consultation_start;
	public $consultation_start_or;
	public $consultation_end;
	public $consultation_end_or;
	public $date_sched;
	public $datetime_sched;
	public $doctor_id;
	public $doctor_name;
	public $type_id;
	public $type_name;
	public $doctor_pic;
	public $priorityno;
	public $status;

}
class Consultation
{

	public $consultation_start;
	public $consultation_end;
	public $consultation_time;


}
 $response=array();

$display=mysqli_real_escape_string($conn,$_POST['display']);

  //$display="client";

 if($display=="client") $response = getQueueSpec();



 echo json_encode($response);
//functions -------------------------
function getQueueSpec(){
global $conn;
$response=array();
$client_id = $_SESSION['client_id'];

 $appointment = new Appointment();
 $consultation = new Consultation();

 $sql = " SELECT q.*,t.*,d.*  FROM queuetbl q
    			LEFT JOIN typetbl t ON q.type_id=t.type_id
					INNER JOIN doctortbl d ON q.doctor_id=d.doctor_id
          WHERE q.client_id='$client_id' ";

 $query = mysqli_query($conn, $sql);
 while($row = mysqli_fetch_assoc($query)){

	 $appointment->total = mysqli_num_rows($query);
	 $appointment->appointment_id = $row["id"];
	 $appointment->room = $row["room"];
	 $appointment->date_sched = $row["date_sched"];
	 $appointment->datetime_sched = $row["datetime_sched"];
	 $appointment->doctor_name = $row["doctor_name"];
	 $appointment->type_id = $row["type_id"];
	 $appointment->type_name = $row["type_name"];
	 $appointment->doctor_id = $row["doctor_id"];
	 $appointment->doctor_pic = $row["doctor_pic"];
	 $appointment->priorityno = $row["priorityno"];
	 $appointment->status = $row["status"];

	 $consultation = getConsultationTime($appointment->doctor_id,$appointment->date_sched);
	 $appointment->consultation_time =$consultation->consultation_time;
	 $appointment->consultation_start =$consultation->consultation_start;
	 $appointment->consultation_start_or =$consultation->consultation_start_or;
	 $appointment->consultation_end =$consultation->consultation_end;
	 $appointment->consultation_end_or =$consultation->consultation_end_or;



	 $response[]=array(
					 "appointment_id"=>($appointment->appointment_id),
					 "total"=>($appointment->total),
					 "room"=>($appointment->room),
					 "consultation_time"=>($appointment->consultation_time),
					 "consultation_start"=>($appointment->consultation_start),
					 "consultation_start_or"=>($appointment->consultation_start_or),
					 "consultation_end"=>($appointment->consultation_end),
					 "consultation_end_or"=>($appointment->consultation_end_or),
					 "date_sched"=>($appointment->date_sched),
					 "datetime_sched"=>($appointment->datetime_sched),
					 "doctor_name"=>($appointment->doctor_name),
					 "type_id"=>($appointment->type_id),
					 "type_name"=>($appointment->type_name),
					 "doctor_pic"=>($appointment->doctor_pic),
					 "priorityno"=>($appointment->priorityno),
					 "status"=>($appointment->status)
					 );


 		}
return $response;
}

function getConsultationTime($doctor_id,$date_sched){
  global $conn;
	$consultation = new Consultation();
	$day = date('l', strtotime($date_sched));


		$sql = " SELECT * FROM schedtbl WHERE doctor_id='$doctor_id' AND day_='$day' ";

		$query = mysqli_query($conn, $sql);
		while($row = mysqli_fetch_assoc($query)){
		$consultation->consultation_time = $row["consultation_time"];

		$consultation->consultation_start = $row["consultation_start"];
		$consultation->consultation_start_or = $row["consultation_start"];
		$consultation->consultation_end = $row["consultation_end"];
		$consultation->consultation_end_or = $row["consultation_end"];

		$consultation->consultation_start =	date_format(date_create($consultation->consultation_start), 'h:i a');
		$consultation->consultation_end =	date_format(date_create($consultation->consultation_end), 'h:i a');
		}


	return $consultation;

}
?>
