<?php
require_once("Proteccion.php");
isset($_SESSION['log']);

$id=$_GET["idMarca"];
include_once("conecta.php");
$query=mysqli_query($con,"select * from marca where idMarca=".$id);
while($row= mysqli_fetch_array($query)){
$nombre=$row["nomMarca"];
}   
?>
<link rel="stylesheet" href="css/materialize.min.css">
<body>
<?php include_once("./layout/navbarAdmin.php");?>
<div class="container">
        <h4 class="center">Editar Marca</h4>
        <form id="formulario" action="update.php" method="POST">
            <div class="input-field">
                <input type="hidden" class="text" name="idMarca" value="<?php echo$id;?>">
                <input type="text" class="text" name="nomMarca" value="<?php echo$nombre ?>">
                <label for="">Marca</label>
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
$("#btn").on("click", function(){
    $("#formulario").validate({
    rules:{
        nomMarca:{
            required:true
        }
    },
    messages:{
        nomMarca:{
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

