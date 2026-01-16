<?php
 
 sendSMStoPhone('09554827928','complete','1001','sms');
function sendSMStoPhone($phone,$time,$pn,$display){


if($display=="sms"){
$ch = curl_init();

$message='Please be informed of your QN# '.$pn.'. Please be in the clinic on or before '.$time.' for your appointment.';

if($time=="noshow")
$message='Please be informed that your appointment has been cancelled due to not being present during the set schedule. Thank you for using E-appoint.';

if($time=="complete")
$message='Please be informed that your appointment has been completed. Thank you for using E-appoint. See you again!';


if($time=="approved")
$message=$pn.". Please check your app for more details.";


if($time=="denied")
$message=$pn.". Please check your app for more details.";


$url = "https://semaphore.co/api/v4/messages";

$parameters = array(
    'apikey' => '4d3ec21e1b6dba8191501aa5b300547e',
    'number' => $phone,
    'message' => $message,
    'sendername' => 'eAPPOINT',
);
$data = http_build_query($parameters);


curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($ch);

if($e = curl_error($ch)){
    echo $e;
}else{

    $decoded = json_decode($response);
    $encoded = json_encode($decoded);
  //  print_r($decoded);
  //  print_r($encoded);
    return ($decoded);

}

curl_close($ch);

}else{
    $response[]=array(
    "status"=>('error'),
    "error"=>('empty display'), 
    );
   // echo json_encode($response);
    return ($response);
}


}

?>