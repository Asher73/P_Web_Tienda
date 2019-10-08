<?php
	$id=$_POST["idUsuario"];
    $nombre=$_POST["nombre"];
    $correo=$_POST['correo'];
    $pwd=$_POST['pwd'];
    $tipo=$_POST['tipoUsr'];
    //$marca=$_POST['idMarca'];
	$con=mysqli_connect("localhost","root","","tienda");
	if(mysqli_query($con,"update usuario set nombre='".$nombre."', correo='".$correo."',pwd='".$pwd."',tipoUsr='".$tipo."' where idUsuario=".$id)){
		echo"Se actualizo exitosamente";
		header("location:usuarios.php");
	}
else
{
	echo"No se pudo actualizar";
}
?>