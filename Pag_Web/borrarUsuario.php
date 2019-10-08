<?php 
    require_once("conecta.php");
    $id=$_GET["idUsuario"];
    mysqli_query($con,"delete from usuario where idUsuario=".$id);
    header("location:usuarios.php");
?>