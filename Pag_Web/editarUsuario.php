<?php
require_once("Proteccion.php");
isset($_SESSION['log']);

$id=$_GET["idUsuario"];
include_once("conecta.php");
$query=mysqli_query($con,"select * from usuario where idUsuario=".$id);
while($row= mysqli_fetch_array($query)){
$nombre=$row["nombre"];
$correo=$row['correo'];
$pwd=$row['pwd'];
$tipo=$row['tipoUsr'];
}   
?>
<link rel="stylesheet" href="css/materialize.min.css">
<body>
<?php include_once("./layout/navbarAdmin.php");?>
<div class="container">
        <h4 class="center">Editar Usuario</h4>
        <form id="formulario" action="updateusuario.php" method="POST">
            <div class="input-field">
                <input type="hidden" class="text" name="idUsuario" value="<?php echo$id;?>">
                <input type="text" class="text" name="nombre" value="<?php echo$nombre ?>">
                <label for="">Nombre</label>
            </div>
            <div class="input-field">
                <!--<input type="hidden" class="text" name="idMarca" value="<?php //echo$id;?>">-->
                <input type="text" class="email" name="correo" value="<?php echo$correo ?>">
                <label for="">Correo</label>
            </div>
            <div class="input-field">
                <!--<input type="hidden" class="text" name="idMarca" value="<?php //echo$id;?>">-->
                <input type="text" class="password" name="pwd" value="<?php echo$pwd ?>">
                <label for="">Contraseña</label>
            </div>
            <div class="input-field">
                <!--<input type="hidden" class="text" name="idMarca" value="<?php //echo$id;?>">-->
                <input type="text" class="text" name="tipoUsr" value="<?php echo$tipo ?>">
                <label for="">Rol</label>
            </div>
            <div class="row">
                <input id="btn" type="submit" value="Actualizar" class="btn">
            </div>
        </form>        
    </div>
    <div class="container" id="contenido">
        
    </div>    
    <script src="js/jquery-3.1.1.js"></script>
    <script src="js/materialize.js"></script>
    <script src="js/all.min.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script>
        $(".dropdown-trigger").dropdown();
    </script>

<script src="js/jquery-3.1.1.js"></script>
<script src="js/materialize.js"></script>
<script src="js/all.min.js"></script>
<script src="js/jquery.validate.min.js"></script>
<script>
$("#btn").on("click", function(){
    $("#formulario").validate({
    rules:{
        nombre:{
            required:true
          
        },
        correo:{
            required:true,
            email:true
        },
        pwd:{
            required:true
        },
        tipoUsr:{
            required:true
        }
    },
    messages:{
        nombre:{
            required:"No puede ir vacio"
          
        },
        correo:{
            required:"No puede ir vacio",
            email: "Falta @ y dominio"
        },
        pwd:{
            required:"No puede ir vacio"
        },
        tipoUsr:{
            required:"No puede ir vacio"
        }
    },
    errorElement:"div",
    errorClass:"error",
    errorPlacement: function(error, element){
        error.insertAfter(element);
    }
    });
});
</script>
</body>

