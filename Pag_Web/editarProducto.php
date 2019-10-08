<?php
require_once("Proteccion.php");
isset($_SESSION['log']);

$id=$_GET["idProducto"];
include_once("conecta.php");
$query=mysqli_query($con,"select * from producto where idProducto=".$id);
while($row= mysqli_fetch_array($query)){
$nombre=$row["nombreProducto"];
$precio=$row['precio'];
$existencia=$row['existencia'];
$marca=$row['idMarca'];
}   
?>
<link rel="stylesheet" href="css/materialize.min.css">
<body>
<?php include_once("./layout/navbarAdmin.php");?>
<div class="container">
        <h4 class="center">Editar Producto</h4>
        <form id="formulario" action="updateproducto.php" method="POST">
            <div class="input-field">
                <input type="hidden" class="text" name="idProducto" value="<?php echo$id;?>">
                <input type="text" class="text" name="nombreProducto" value="<?php echo$nombre ?>">
                <label for="">Producto</label>
            </div>
            <div class="input-field">
                <!--<input type="hidden" class="text" name="idMarca" value="<?php //echo$id;?>">-->
                <input type="text" class="text" name="precio" value="<?php echo$precio ?>">
                <label for="">Precio</label>
            </div>
            <div class="input-field">
                <!--<input type="hidden" class="text" name="idMarca" value="<?php //echo$id;?>">-->
                <input type="text" class="text" name="existencia" value="<?php echo$existencia ?>">
                <label for="">Existencia</label>
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
$('select').formSelect();
$("#btn").on("click", function(){
    $("#formulario").validate({
    rules:{
        nombreProducto:{
            required:true
        },
        precio:{
            required:true,
            number:true
        },
        existencia:{
            required:true,
            number:true
        }
    },
    messages:{
        nombreProducto:{
            required:"No puede ir vacio"
        },
        precio:{
            required:"No puede ir vacio",
            number:"solo numeros"
        },
        existencia:{
            required:"No puede ir vacio",
            number:"solo numeros"
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

