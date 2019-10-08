<?php require_once("ProteccionAdmin.php"); ?>
<!DOCTYPE html>
<html lang="en">
<?php require_once("ProteccionAdmin.php"); ?>
<?php require_once("layout/head.php"); ?>
<body>
<?php 
if(!isset($_SESSION))
    session_start();
if(isset($_SESSION["rol"]) && $_SESSION["rol"]=="admin" )
    include("layout/navbarAdmin.php"); 
else
    include("layout/navbarCte.php");
?>    <div class="container" id="contenido">
        <div id="modal1" class="modal">
            <div class="modal-content">
                <br>
                <h4 class="center">Agregar Usuario</h4>
                <div class="container">
                    <form id="frmAlta" action="altausuarios.php" method="GET">
                        <div class="input-field">
                            <input type="text" class="text" name="nombreUsuario">
                            <label for="nombreUsuario">Usuario</label>
                        </div>
                        <div class="input-field">
                            <input type="email" class="text" name="correo">
                            <label for="correo">Email</label>
                        </div>
                        <div class="input-field">
                            <input type="password" class="text" name="pwd">
                            <label for="pwd">Password</label>
                        </div>
                        <div class="input-field">
                            <input type="text" class="text" name="tipoUsr">
                            <label for="tipoUsr">Tipo de Usuario</label>
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
            <h4 class="center">Usuarios</h4>
            <div class="container">
                <a class="btn modal-trigger" href="#modal1"><i class='fas fa-plus'></i> Agregar</a>
                <table>
                    <tr>
                        
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Password</th>
                        <th>Rol</th>
                        <th>Funciones</th>
                    </tr>
                    <?php 
            require_once("conecta.php");
            $resultado=mysqli_query($con,"select * from usuario");
            while($fila=mysqli_fetch_array($resultado)){
                $id=$fila['idUsuario'];
                $nombre=$fila['nombre'];
                $correo=$fila['correo'];
                $pwd=$fila['pwd'];
                $tipo=$fila['tipoUsr'];
        
                
                echo"<tr>";
              
                echo"<td>$nombre</td>";
                echo"<td>$correo</td>";
                echo"<td>$pwd</td>";
                echo"<td>$tipo</td>";
               
                echo"<td><a class='btn green' href='editarUsuario.php?idUsuario=$id'><i class='fas fa-pen'></i></a> 
                    <a class='btn red' href='borrarUsuario.php?idUsuario=$id'><i class='fas fa-trash'></i></a></td>";
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
                    nombreUsuario: {
                        required: true,

                    },
                    correo: {
                        required: true,
                    },
                    pwd: {
                        required: true,
                        
                    },
                    tipo: {
                        required: true,
                        
                    }
                },
                messages: {
                    nombreUsuario: {
                        required: "No puede ir vacio",

                    },
                    correo: {
                        required: "No puede ir vacio",
                        email: "falta @ y dominio",
                    },
                    pwd: {
                        required: "No puede ir vacio",
                        
                    },
                    tipo: {
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
                        url: "altausuario.php",
                        data: $("#frmAlta").serialize(),
                        success: function () {
                            document.location.href = "usuarios.php";
                        }
                    });
                },
            });

        });
    </script>
</body>

</html>