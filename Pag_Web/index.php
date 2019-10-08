<!DOCTYPE html>
<html lang="en">

<?php include("layout/head.php"); ?>
<body>
<?php 
if(!isset($_SESSION))
    session_start();
if(isset($_SESSION["rol"]) && $_SESSION["rol"]=="admin" )
    include("layout/navbarAdmin.php"); 
else
    include("layout/navbarCte.php");
?>
    <div class="container" id="contenido">
            <div class="row">
                <?php
                
                require_once("conecta.php");
                $resultado=mysqli_query($con,"select marca.idMarca, marca.nomMarca, producto.idProducto, producto.nombreProducto, producto.precio, producto.existencia from producto inner join marca on producto.idMarca = marca.idMarca");
                
                while($fila=mysqli_fetch_array($resultado)){
                    $id=$fila['idProducto'];
                    echo'<div class="col s12 m3">';
                    echo'<div class="card">';
                            echo'<div class="card-image">';
                                echo'<img src="images/i.png">';
                                if(isset($_SESSION["rol"])){
                                echo'<a class="btn center agregar" data-id='.$id.'><i class="fas fa-plus"></i></a>';
                                }
                            echo'</div>';
                            echo'<div class="card-content">';
                                echo'<p>';
                                echo $fila['nombreProducto'].'<br>';
                                echo'$'.$fila['precio'].'<br>';
                                echo $fila['nomMarca'].'<br>';
                                echo 'Existencia: '.$fila['existencia'].'<br>';
                               
                                echo'</p>';
                            echo'</div>';
                        echo'</div>';
                    echo'</div>';
                    }
                ?>
            </div>
        </div>    
    <?php include("layout/footer.php"); ?>
    <script src="js/jquery-3.1.1.js"></script>
    <script src="js/materialize.js"></script>
    <script src="js/all.min.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script>
        $(".dropdown-trigger").dropdown();
        $(".agregar").on("click",function(){
            var producto={
                idProducto:$(this).data("id"),
            };
            $.ajax({
                method: "POST",
                url: "altaCarrito.php",
                data: producto,
                success: function(){
                    M.toast({html: 'Producto Agregado'});
                    $(".totalP").load("totalProductos.php");
                }
            });
        });
    </script>
</body>

</html>