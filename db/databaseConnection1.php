
<?php

$servername = "localhost";
$username = "eappointuser";
$password = "Rebancliff3$";
$dbname = "ipointdb";

/*
$username = "eappointuser";
$password = "Rebancliff3$";
$dbname = "ipointdb";

$username = "root";
$password = "";
$dbname = "ipointdb";

*/
 

$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}



?>

