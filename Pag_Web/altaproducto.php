<?php 
	require_once("conecta.php");  
				$nombre=$_POST['nombreProducto'];
                $precio=$_POST['precio'];
                $existencia=$_POST['existencia'];
                $marca=$_POST['miselect'];
				$nombreimg=$_FILES['foto']['name'];
	           	$archivo=$_FILES['foto']['tmp_name'];
				$ruta="images";
				$ruta=$ruta."/".$nombreimg;

				move_uploaded_file($archivo, $ruta);

                $query=mysqli_query($con,"insert into producto (nombreProducto, precio, existencia, idMarca, imagen) values(\"$nombre\", \"$precio\", \"$existencia\", \"$marca\", \"$ruta\")");
				if($query){
                    echo "bien";
				}else{
                    echo "error";
				}
    
    header("location:productos.php");
?>