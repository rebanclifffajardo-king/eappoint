<?php
require_once("../../db/databaseConnection.php");

$display=mysqli_real_escape_string($conn,$_POST['display']);

if($display=="sms"){
$ch = curl_init();

$url = "https://semaphore.co/api/v4/messages";

$parameters = array(
    'apikey' => '4d3ec21e1b6dba8191501aa5b300547e',
    'number' => '09554827928',
    'message' => 'Please be informed of your QN# 15. You still have 03:50 mins remaining time before your set appointment',
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
    print_r($encoded);

}

curl_close($ch);

}else{
    $response[]=array(
    "status"=>('error'),
    "error"=>('empty display'), 
    );
    echo json_encode($response);
}

?>