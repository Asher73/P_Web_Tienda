<?php
	if(!isset($_SESSION))
		session_start();
	if(isset($_SESSION['rol'])){
		header("location:index.php");
		die();
	}		
?>
<!DOCTYPE html>
<html lang="en">
<?php include("layout/head.php"); ?>
<body>
<?php 
  if(isset($_SESSION["rol"]) && $_SESSION["rol"]=="admin" )
    include("layout/navbarAdmin.php"); 
  else
    include("layout/navbarCte.php");
?>
  <br>
  <div class="container">
    <div class="card">
      <br>
      <h4 class="center"> Acceso </h4>
      <div class="container" id="contenido">
        <form id="loginForm" class="formulario">
          <div class="input-field">
            <input class="text" type="text" name="usuario" />
            <label for="usuario">usuario:</label>
          </div>
          <div class="input-field">
            <input class="text" type="password" name="password" />
            <label for="password">contraseña</label>
          </div>
          <br>
          <div class="status" id="status"></div>
          <br>
          <input type="submit" class="btn" id="acceso" value="Enviar">
          <div class="status" id="status"></div>
        </form>
        <br>
      </div>
    </div>
  </div>
  <?php 
    include("layout/footer.php");
  ?>
  <script src="js/jquery-3.1.1.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/all.min.js"></script>
  <script src="js/jquery.validate.min.js"></script>
  <script>
      $(".btn").on("click", function () {
        $(".formulario").validate({
          rules: {
            usuario: {
              required: true,
            },
            password: {
              required: true,
            }
          },
          messages: {
            usuario: {
              required: "No puede ir vacio",
            },
            password: {
              required: "No puede ir vacio",
            }
          },
          errorElement: "div",
          errorClass: "error",
          errorPlacement: function (error, element) {
            error.insertAfter(element);
          },
          submitHandler: function () {
            $("#acceso").on("click", function () {
              var parametros = $("#loginForm").serialize();
              $.ajax({
                url: "chkusr.php",
                type: 'POST',
                data: parametros,
                success: function (respuesta) {
                  if ($.trim(respuesta) == "T") {
                    document.location.href = "marca.php";
                  }
                  else {
                    $("#status").html("<span style='color:red'>Usuario y/o Contraseña invalida</span>")
                  }
                }
              });
            });
          }
        });
      });
  </script>
</body>

</html>