<?php require_once("ProteccionAdmin.php"); ?>
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
        <div id="modal1" class="modal">
            <div class="modal-content">
                <br>
                <h4 class="center">Agregar Producto</h4>
                <div class="container">
                    <form id="frmAlta" action="altaproducto.php" method="POST" enctype="multipart/form-data">
                        <div class="input-field">
                            <input type="text" class="text" name="nombreProducto">
                            <label for="nombreProducto">Producto</label>
                        </div>
                        <div class="input-field">
                            <input type="text" class="text" name="precio">
                            <label for="precio">Precio</label>
                        </div>
                        <div class="input-field">
                            <input type="text" class="text" name="existencia">
                            <label for="existencia">Existencia</label>
                        </div>
                        <div class="input-field">
                            <?php
                                require_once("conecta.php");
                                $result=mysqli_query($con, "select * from marca");

                                echo"<select name = 'miselect'>";
                                while($row=mysqli_fetch_array($result)){
                                   $id=$row["idMarca"];
                                    $nombre=$row["nomMarca"];
                                    echo"<option value='$id'>$nombre</option>";
                                }
                                echo"</select>";
                                ?>
                        </div>
                        <div class="file-field input-field">
                            <div class="btn">
                                <span>File</span>
                                <input name="foto" type="file">
                            </div>
                            <div class="file-path-wrapper">
                                <input name="foto" class="file-path validate" type="text">
                            </div>
                        </div>
                        <br>
                        <div id="status"></div>
                        <div class="row">
                            <input type="submit" class="btn blue" id="btnAlta" value="Agregar">
                        </div>
                    </form>
                    <br>
                </div>
            </div>
        </div>
        <div class="card">
            <br>
            <h4 class="center">Gestion de Productos</h4>
            <div class="container">
                <a class="btn modal-trigger" href="#modal1"><i class='fas fa-plus'></i> Agregar</a>
                <table>
                    <tr>
                        <th>Id Producto</th>
                        <th>Producto</th>
                        <th>Precio</th>
                        <th>Existencia</th>
                        <th>Marca</th>
                        <th>Imagen</th>
                        <th>Funciones</th>
                    </tr>
                    <?php 
            require_once("conecta.php");
            $resultado=mysqli_query($con,"select marca.idMarca, marca.nomMarca, producto.idProducto, producto.nombreProducto, producto.precio, producto.existencia, producto.imagen from producto inner join marca on producto.idMarca = marca.idMarca");
            while($fila=mysqli_fetch_array($resultado)){
                $producto=$fila['idProducto'];
                $nombre=$fila['nombreProducto'];
                $precio=$fila['precio'];
                $existencia=$fila['existencia'];
                $marca=$fila['nomMarca'];
                $imagen=$fila['imagen'];
                
                echo"<tr>";
                echo"<td>$producto</td>";
                echo"<td>$nombre</td>";
                echo"<td>$precio</td>";
                echo"<td>$existencia</td>";
                echo"<td>$marca</td>";
                echo"<td>";
                    echo "<img src='".$fila['imagen']."' width='40'>";
                echo"</td>";
               
                echo"<td><a class='btn green' href='editarProducto.php?idProducto=$producto'><i class='fas fa-pen'></i></a> 
                    <a class='btn red' href='borrarproducto.php?idProducto=$producto'><i class='fas fa-trash'></i></a></td>";
                echo"</tr>";
                
            }
        ?>
                </table>
            </div>
        </div>
    </div>
    <?php include("layout/footer.php"); ?>
    <script src="js/jquery-3.1.1.js"></script>
    <script src="js/materialize.js"></script>
    <script src="js/all.min.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script>
        $('select').formSelect();

        $(".dropdown-trigger").dropdown();
        $('.modal').modal();
        $("#btnAlta").on("click", function () {
            $("#frmAlta").validate({
                rules: {
                    nombreProducto: {
                        required: true,

                    },
                    precio: {
                        required: true,
                        number: true
                    },
                    existencia: {
                        required: true,
                        number: true
                    },
                    idMarca: {
                        required: true,
                        number: true
                    }
                },
                messages: {
                    nombreProducto: {
                        required: "No puede ir vacio",

                    },
                    precio: {
                        required: "No puede ir vacio",
                        number: "solo numeros"
                    },
                    existencia: {
                        required: "No puede ir vacio",
                        number: "solo numeros"
                    },
                    idMarca: {
                        required: "No puede ir vacio",
                        number: "solo numeros"
                    }
                },
                errorElement: "div",
                errorClass: "error",
                errorPlacement: function (error, element) {
                    error.insertAfter(element);
                },

            });

        });
    </script>
</body>

</html>