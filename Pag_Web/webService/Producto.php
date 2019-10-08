<?php
require_once("../conecta.php");
$action=$_POST["action"];

if($action=="getProductos")
    obtenerProductos($con);

if($action=="setProducto"){
    $nombre=$_POST["nombreProducto"];
    $precio=$_POST["precio"];
    $existencia=$_POST["existencia"];
    $marca=$_POST["idMarca"];
    insertarProducto($con,$nombre,$precio,$existencia,$marca);
}
if($action=="updateProducto"){
    $id=$_POST["idProducto"];
    $nombre=$_POST["nombreProducto"];
    $precio=$_POST["precio"];
    $existencia=$_POST["existencia"];
    $marca=$_POST["idMarca"];
    actualizarProducto($con,$id,$nombre,$precio,$existencia,$marca);
}
if($action=="deleteProducto"){
    $id=$_POST["idProducto"];
    borrarProducto($con,$id);
}


function obtenerProductos($con){
    $resultado=mysqli_query($con,"select * from producto");
    $respuesta=array();
    while($row=mysqli_fetch_assoc($resultado))
        $respuesta[]=$row;
    echo json_encode($respuesta);
}

function insertarProducto($con,$nombre,$precio,$existencia,$marca){
    if(mysqli_query($con,"insert into producto (nombreProducto, precio, existencia, idMarca) values(\"$nombre\", \"$precio\", \"$existencia\", \"$marca\")"))
        echo json_encode("El producto $nombre se inserto correctamente"); 
    else
        echo "No se Agrego Correctamente";
}

function actualizarProducto($con,$id,$nombre,$precio,$existencia,$marca){
    if(mysqli_query($con,"update producto set nombreProducto='$nombre', precio='$precio',existencia='$existencia',idMarca='$marca' where idProducto=$id"))
        echo json_encode("El producto $nombre se actualizo correctamente"); 
    else
        echo "No se Actualizo Correctamente";
}

function borrarProducto($con,$id){
    if(mysqli_query($con,"DELETE FROM producto WHERE idProducto=$id"))
        echo json_encode("El producto se borro"); 
    else
        echo "El prodcuto NO se borro";
}

?>