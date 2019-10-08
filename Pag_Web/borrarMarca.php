<?php 
    require_once("conecta.php");
    $id=$_GET["idMarca"];
    mysqli_query($con,"delete from marca where idMarca=".$id);
    header("location:marca.php");
?>