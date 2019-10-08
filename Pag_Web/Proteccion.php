<?php
	if(!isset($_SESSION))
		session_start();
	if(!($_SESSION['rol']=="admin" OR $_SESSION['rol']=="cliente")){
		header("location:index.php");
		die();
	}		
?>