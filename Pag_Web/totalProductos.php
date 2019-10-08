<?php 
 require_once("conecta.php");
 if(!isset($_SESSION))
    session_start();
 $usr=$_SESSION["idUsuario"];
 $result=mysqli_query($con,"SELECT SUM(cantidad) as total FROM carrito WHERE idUsuario=".$usr);
 $row = mysqli_fetch_array($result);
    echo $row["total"];
?>