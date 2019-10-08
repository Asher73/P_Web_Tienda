<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <title>login</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <link rel="stylesheet" href="css/animate.min.css">
  <link rel="shortcut icon" href="favicon.ico" />
  <link rel="icon" href="/favicon.ico" type="image/x-icon">
  <script src="js/jquery-3.3.1.min.js"></script>
</head>

<body class="bodyLogin">
  <div class="container">
    <div class="row">
      <div class="Absolute-Center is-Responsive wow rubberBand">
        <div class="col-6 offset-3"><img src="images/logo.jpg" class="img-fluid">
        </div>
          <form id="loginForm" method="get">
            <br>
            <div class="form-group input-group">
              <span class="input-group-addon"><i class="fa fa-user-circle fa-2x"></i></span>
              <input class="form-control" type="text" name="usuario" placeholder="usuario" />
            </div>
            <div class="form-group input-group">
              <span class="input-group-addon"><i class="fa fa-key fa-2x"></i></span>
              <input class="form-control" type="password" name="password" placeholder="password" />
            </div>
            <hr>
            <div class="form-group">
              <button type="button" class="btn btn-success btn-block" id="acceso">Entrar</button>
            </div>
            <div class="status" id="status"></div>
            <p>Error En Contraseña</p>
          </form>
      </div>
    </div>
  </div>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script>
    $("#acceso").on("click",function(){
    	var parametros=$("#loginForm").serialize();
  	  $.ajax({
  	    url:"chkusr.php",
        type: 'POST',
  		  data:parametros,
  	    success: function(respuesta){
  			  if($.trim(respuesta)=="T"){
  	        document.location.href="pagos.php";
  	        }
  	      if($.trim(respuesta)=="F"){
  	        $("#status").html("<p>usuario o contraseña incorrecta</p>");
  	        setTimeout(function(){$("#status").fadeIn(800);},800);
  	        setTimeout(function(){$("#status").fadeOut(800);},800);
  	      }
  	    }
  	   });
    });
  </script>
</body>

</html>
