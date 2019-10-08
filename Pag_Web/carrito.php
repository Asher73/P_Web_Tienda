<?php require_once("Proteccion.php"); ?>
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
        <div class="card">
            <br>
            <h4 class="center">Carrito de Compras</h4>
            <div class="container">
                <table>
                    <form action="detalleVenta.php" action="POST">
                    <tr>
                        <th>Producto</th>
                        <th>Cantidad</th>
                        <th>Funciones</th>
                    </tr>
                    <tr>
                        <?php
                        require_once("conecta.php");
                        $resultado=mysqli_query($con,"select producto.idProducto, producto.nombreProducto, carrito.idProducto, carrito.cantidad from carrito inner join producto on carrito.idProducto = producto.idProducto");
                        while($fila=mysqli_fetch_array($resultado)){
                            $id=$fila['idProducto'];
                            $nombre=$fila['nombreProducto'];
                            $cantidad=$fila['cantidad'];
                            
                            echo"<tr>";
                            echo"<td>$nombre</td>";
                            echo"<td>$cantidad</td>";
                           
                            echo"<td><a class='btn green' href='editarCarrito.php?idProducto=$id'><i class='fas fa-pen'></i></a> 
                                <a class='btn red' href='borrarCarrito.php?idProducto=$id'><i class='fas fa-trash'></i></a></td>";
                            echo"</tr>";
                        }
                        ?>
                    </tr>
                    <tr>
                        <td>
                            <!--<a class="btn blue" href="detalleVenta.php?idProducto=$id" >Comprar</a>-->
                            <input type="submit" class="btn blue" id="btnAlta" value="Comprar">
                        </td>                       
                    </tr>
                    </form>
                </table>
            </div>
        </div>
    </div>
    <?php include("layout/footer.php"); ?>
    <script src="js/jquery-3.1.1.js"></script>
    <script src="js/materialize.js"></script>
    <script src="js/all.min.js"></script>
    <script src="js/jquery.validate.min.js"></script>
</body>

</html>