<?php
	$id=$_POST["idMarca"];
	$nom=$_POST["nomMarca"];
	$con=mysqli_connect("localhost","root","","tienda");
	if(mysqli_query($con,"update marca set nomMarca='".$nom."'  where idMarca=".$id)){
		echo"Se actualizo exitosamente";
		header("location:marca.php");
	}
else
{
	echo"No se pudo actualizar";
}
?>