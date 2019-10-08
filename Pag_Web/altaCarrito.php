<?php 
    require_once("Proteccion.php");
    require_once("conecta.php");
    $idProducto=$_POST["idProducto"];
    $idUsuario=$_SESSION["idUsuario"];
    mysqli_query($con,"UPDATE carrito SET cantidad=(cantidad+1) WHERE idUsuario=$idUsuario AND idProducto=$idProducto");
    mysqli_query($con,"INSERT carrito(idProducto, idUsuario,cantidad) values($idProducto,$idUsuario,1)");
?>