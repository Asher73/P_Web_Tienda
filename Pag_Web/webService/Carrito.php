<?php
require_once("../conecta.php");
$action=$_POST["action"];

if($action=="getCarrito")
    obtenerCarrito($con);

if($action=="setCarrito"){
    $idProd=$_POST["idProducto"];
    $idUsr=$_POST["idUsuario"];
    $cantidad=$_POST["cantidad"];
    insertarCarrito($con,$idProd,$idUsr,$cantidad);
}
if($action=="updateCarrito"){
    $idUsr=$_POST["idUsuario"];
    $cantidad=$_POST["cantidad"];
    actualizarCarrito($con,$idUsr,$cantidad);
}

if($action=="deleteCarrito"){
    $idUsr=$_POST["idUsuario"];
    borrarCarrito($con,$idUsr);
}


function obtenerCarrito($con){
    $resultado=mysqli_query($con,"select * from carrito");
    $respuesta=array();
    while($row=mysqli_fetch_assoc($resultado))
        $respuesta[]=$row;
    echo json_encode($respuesta);
}

function insertarCarrito($con,$idProd,$idUsr,$cantidad){
    if(mysqli_query($con,"INSERT INTO carrito(idProducto,idUsuario,cantidad) VALUES ($idProd,$idUsr,$cantidad)"))
        echo json_encode("Se inserto correctamente"); 
    else
        echo "No se Agrego Correctamente";
}

function  actualizarCarrito($con,$idUsr,$cantidad){
    if(mysqli_query($con,"UPDATE carrito SET cantidad='$cantidad' WHERE idUsuario=$idUsr"))
        echo json_encode("Se actualizo correctamente"); 
    else
        echo "No se Actualizo Correctamente";
}

function borrarCarrito($con,$idUsr){
    if(mysqli_query($con,"DELETE FROM carrito WHERE idUsuario=$idUsr"))
        echo json_encode("El contenido del carrito se borro"); 
    else
        echo "El contenido del carrito NO se borro";
}
?>