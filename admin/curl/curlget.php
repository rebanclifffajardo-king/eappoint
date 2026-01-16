<?php


$url = "https://reqres.in/api/users/2";

$data_array = array(
    'name' => 'John Doe',
    'job' => 'Web Developer'
);
$data = http_build_query($data_array);

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($ch);

if($e = curl_error($ch)){
    echo $e;
}else{

    $decoded = json_decode($response);
    foreach($decoded as $key=> $val){
        echo $key. ': '. $val . '<br/>';
    }
}

curl_close($ch);


?>