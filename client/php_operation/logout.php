<?php

session_start();
$_SESSION['client_id']="";
unset($_SESSION['client_id']);
	header("location: ../../index.php");


?>
