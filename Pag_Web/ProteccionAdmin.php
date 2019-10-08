<?php
	if(!isset($_SESSION))
		session_start();
	if($_SESSION['rol']!="admin"){
		header("location:index.php");
		die();
	}		
?>