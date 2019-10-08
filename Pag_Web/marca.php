<?php require_once("ProteccionAdmin.php"); ?>
<!DOCTYPE html>
<html lang="en">
<?php include_once("layout/head.php"); ?>
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
                <h4 class="center">Agregar Marca</h4>
                <div class="container">
                    <form id="frmAlta">
                        <div class="input-field">
                            <input type="text" class="text" name="nomMarca">
                            <label for="nomMarca">Ingrese la Marca</label>
                        </div>
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
            <h4 class="center">Gestion de Marcas</h4>
            <div class="container">
                <a class="btn modal-trigger" href="#modal1"><i class='fas fa-plus'></i> Agregar</a>
                <table>
                    <tr>
                        <th>Id Marca</th>
                        <th>Marca</th>
                        <th>Funciones</th>
                    </tr>
                    <?php 
            require_once("conecta.php");
            $resultado=mysqli_query($con,"select * from marca");
            while($fila=mysqli_fetch_array($resultado)){
                $marca=$fila['idMarca'];
                $nombre=$fila['nomMarca'];
                echo"<tr>";
                echo"<td>$marca</td>";
                echo"<td>$nombre</td>";
                echo"<td><a class='btn green' href='editarMarca.php?idMarca=$marca'><i class='fas fa-pen'></i></a> 
                    <a class='btn red' href='borrarMarca.php?idMarca=$marca'><i class='fas fa-trash'></i></a></td>";
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
        $(".dropdown-trigger").dropdown();
        $('.modal').modal();
        $("#btnAlta").on("click", function () {
            $("#frmAlta").validate({
                rules: {
                    nomMarca: {
                        required: true,
                    }
                },
                messages: {
                    nomMarca: {
                        required: "No puede ir vacio",
                    }
                },
                errorElement: "div",
                errorClass: "error",
                errorPlacement: function (error, element) {
                    error.insertAfter(element);
                },
                submitHandler: function () {
                    $.ajax({
                        type: "get",
                        url: "altaMarca.php",
                        data: $("#frmAlta").serialize(),
                        success: function () {
                            document.location.href = "marca.php";
                        }
                    });
                },
            });

        });
    </script>
</body>

</html>