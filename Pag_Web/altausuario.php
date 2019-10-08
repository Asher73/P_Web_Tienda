<?php 
    require_once("conecta.php");
                $nombre=$_GET["nombreUsuario"];
                $correo=$_GET["correo"];
                $pwd=$_GET["pwd"];
                $tipo=$_GET["tipoUsr"];
               
    mysqli_query($con,"insert into usuario (nombre, correo, pwd, tipoUsr) values(\"$nombre\", \"$correo\", \"$pwd\", \"$tipo\")");
?>