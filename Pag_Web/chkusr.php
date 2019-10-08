<?php
$usuario=$_POST['usuario'];
$pass=$_POST['password'];
if(!isset($_SESSION))
session_start();
require_once("conecta.php");
	$result=mysqli_query($con,"SELECT * FROM usuario WHERE correo='$usuario' AND pwd='$pass' || nombre='$usuario' AND pwd='$pass'");
	$s=$result->num_rows;
	if($s==1){
			while($row=mysqli_fetch_array($result)){
				$_SESSION["idUsuario"]=$row["idUsuario"];
				if($row['tipoUsr']==0){
					$_SESSION['rol']='cliente';
				}
				if($row['tipoUsr']==1){
					$_SESSION['rol']='admin';
				}

			}
		echo"T";
	}
	else{
		echo"F";
	}
?>
