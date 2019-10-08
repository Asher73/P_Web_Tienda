<?php
    require_once("Proteccion.php");
	$id=$_POST["idProducto"];
	$cant=$_POST["cantidad"];
	$con=mysqli_connect("localhost","root","","tienda");
	if(mysqli_query($con,"update carrito set cantidad='".$cant."'  where idProducto=".$id)){
		echo"Se actualizo exitosamente";
		header("location:carrito.php");
	}
else
{
	echo"No se pudo actualizar";
}
?>