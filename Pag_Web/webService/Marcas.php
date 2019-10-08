<?php
require_once("../conecta.php");
$action=$_POST["action"];

if($action=="getMarcas")
    obtenerMarcas($con);
if($action=="setMarca"){
    $nomMarca=$_POST["nomMarca"];
    insertarMarca($con,$nomMarca);
}
if($action=="updateMarca"){
    $idMarca=$_POST["idMarca"];
    $nomMarca=$_POST["nomMarca"];
    actualizarMarca($con,$idMarca,$nomMarca);
}
if($action=="deleteMarca"){
    $idMarca=$_POST["idMarca"];
    borrarMarca($con,$idMarca);
}


function obtenerMarcas($con){
    $resultado=mysqli_query($con,"select * from marca");
    $respuesta=array();
    while($row=mysqli_fetch_assoc($resultado))
        $respuesta[]=$row;
    echo json_encode($respuesta);
}

function insertarMarca($con,$nomMarca){
    if(mysqli_query($con,"INSERT INTO marca(nomMarca) VALUES ('$nomMarca')"))
        echo json_encode("La marca $nomMarca se inserto correctamente"); 
    else
        echo "No se Agrego Correctamente";
}

function actualizarMarca($con,$idMarca,$nomMarca){
    if(mysqli_query($con,"UPDATE marca SET nomMarca='$nomMarca' WHERE idMarca=$idMarca"))
        echo json_encode("La marca $nomMarca se actualizo correctamente"); 
    else
        echo "No se Actualizo Correctamente";
}

function borrarMarca($con,$idMarca){
    if(mysqli_query($con,"DELETE FROM marca WHERE idMarca=$idMarca"))
        echo json_encode("La marca se borro"); 
    else
        echo "La marca NO se borro";
}

?>