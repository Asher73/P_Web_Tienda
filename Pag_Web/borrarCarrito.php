<?php 
    require_once("conecta.php");
    $id=$_GET["idProducto"];
    mysqli_query($con,"delete from carrito where idProducto=".$id);
    header("location:carrito.php");
?>