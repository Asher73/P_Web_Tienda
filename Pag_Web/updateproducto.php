<?php
	$id=$_POST["idProducto"];
    $nom=$_POST["nombreProducto"];
    $precio=$_POST['precio'];
    $existencia=$_POST['existencia'];
    $marca=$_POST['miselect'];
	$con=mysqli_connect("localhost","root","","tienda");
	if(mysqli_query($con,"update producto set nombreProducto='".$nom."', precio='".$precio."',existencia='".$existencia."',idMarca='".$marca."' where idProducto=".$id)){
		echo"Se actualizo exitosamente";
		header("location:productos.php");
	}
else
{
	echo"No se pudo actualizar";
}
?>