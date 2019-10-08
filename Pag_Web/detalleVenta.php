<?php

if(!isset($_SESSION))
    session_start();
    $idUsuario=$_SESSION["idUsuario"];
    require_once("conecta.php");   
    mysqli_query($con,"INSERT venta (fecha,idUsuario) values(now(),$idUsuario)");
    $resVta=mysqli_query($con,"SELECT * FROM venta WHERE idUsuario=$idUsuario ORDER BY fecha DESC LIMIT 1"); 
    while($file=mysqli_fetch_array($resVta)){
        $idVenta=$file["idVenta"];
    }
    $resultado=mysqli_query($con,"SELECT * FROM carrito WHERE idUsuario=$idUsuario");
    while($row=mysqli_fetch_array($resultado)){
        $idProd=$row['idProducto'];
        $cantidad=$row['cantidad'];
        mysqli_query($con,"INSERT INTO detalleventa (idVenta,idProducto,cantidad) values($idVenta,$idProd,$cantidad)");
        mysqli_query($con,"UPDATE producto SET existencia=(existencia-$cantidad) WHERE idProducto=$idProd");

    }
    $limpiar=mysqli_query($con,"DELETE FROM carrito WHERE idUsuario='$idUsuario'");
    header("location:carrito.php");

?>