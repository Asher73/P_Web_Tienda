<?php 
    require_once("conecta.php");
    $nombre=$_GET["nomMarca"];
    mysqli_query($con,"insert into marca (nomMarca) values(\"$nombre\")");
?>