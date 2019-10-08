<?php 
    require_once("conecta.php");
    $id=$_GET["idProducto"];
    mysqli_query($con,"delete from producto where idProducto=".$id);
    header("location:productos.php");
?>