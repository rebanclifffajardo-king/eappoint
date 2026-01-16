<?php

session_start();
$_SESSION['id']="";
unset($_SESSION['id']);
unset($_SESSION['logged']);
	header("location: ../login.php");


?>
