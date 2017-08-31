<?php
session_start();
	$token = $_GET['token'];
	$idusuario = $_GET['idusuario'];
	$idusuario2= $_SESSION['intentar'];
	 echo $idusuario;

	$conexion = new mysqli('localhost', 'root', '', 'bd_distribuidora');

	$sql = "SELECT * FROM tblreseteopass WHERE token = '$token'";
	$resultado = $conexion->query($sql);

	if( $resultado->num_rows > 0 ){
		$usuario = $resultado->fetch_assoc();

		if( sha1($usuario['idusuario']) == $idusuario ){
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta name="author" content="denker">
    <title> Restablecer contraseña </title>
		<script src="dist/jquery-1.11.1.min.js"></script>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-theme.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
		    <script src="vendor/bootstrap/bootstrap.min.js"></script>
		    <script src="vendor/jquery/jquery-3.2.1.min.js"></script>

		<style media="screen">
		body {
		    background-color: black;
		    background: url(../images/fabric.png) repeat ;
		     background-repeat: repeat-y cover;
		}

		.containertotal{

		}
		</style>
  </head>

  <body>
		<div class="header col-md-12 col-sm-12" style="text-align: center">

		<img src="../images/headermini.png" alt="headermini.png" width="320px" height="180px">
		<hr>
		</div>

				<div class="container" role="main">
      <div class="col-md-4"></div>
      <div class="col-md-4">
        <form action="cambiarpassword.php" method="post">
          <div class="panel panel-default">
            <div class="panel-heading"> Restaurar contraseña </div>
            <div class="panel-body">
              <p></p>
              <div class="form-group">
                <label for="password"> Nueva contraseña </label>
                <input type="password" class="form-control" name="password1" required>
								<div class="row">
								<div class="col-sm-6">
								<span id="8char" class="glyphicon glyphicon-remove" style="color:#FF0004;"></span> 8 carácteres. <br>
								<span id="ucase" class="glyphicon glyphicon-remove" style="color:#FF0004;"></span> Una letra mayúscula.
								</div>
								<div class="col-sm-6">
								<span id="lcase" class="glyphicon glyphicon-remove" style="color:#FF0004;"></span> Una letra minuscula.<br>
								<span id="num" class="glyphicon glyphicon-remove" style="color:#FF0004;"></span> Un número.
								</div>
								</div>
              </div>
              <div class="form-group">
                <label for="password2"> Confirmar contraseña </label>
                <input type="password" class="form-control" name="password2" required>
								<div class="row">
								<div class="col-sm-12">
								<span id="pwmatch" class="glyphicon glyphicon-remove" style="color:#FF0004;"></span> Las contraseñas coinciden.
								</div>
								</div>
              </div>
              <input type="hidden" name="token" value="<?php echo $token ?>">
              <input type="hidden" name="idusuario" value="<?php echo $idusuario ?>">
              <div class="form-group">
                <input type="submit" conClick="return pswderr();" lass="btn btn-primary" value="Recuperar contraseña" >
              </div>
            </div>
          </div>
        </form>
      </div>
      <div class="col-md-4"></div>

    </div> <!-- /container -->
				<div id="mensaje">

				</div>
			</div>
			<div class="col-md-4"></div>

		</div> <!-- /container -->

  </body>

	</script>

	<script type="text/javascript">
	$("input[type=password]").keyup(function(){
	    var ucase = new RegExp("[A-Z]+");
		var lcase = new RegExp("[a-z]+");
		var num = new RegExp("[0-9]+");

		if($("#password1").val().length >= 8){
			$("#8char").removeClass("glyphicon-remove");
			$("#8char").addClass("glyphicon-ok");
			$("#8char").css("color","#00A41E");
		}else{
			$("#8char").removeClass("glyphicon-ok");
			$("#8char").addClass("glyphicon-remove");
			$("#8char").css("color","#FF0004");
		}

		if(ucase.test($("#password1").val())){
			$("#ucase").removeClass("glyphicon-remove");
			$("#ucase").addClass("glyphicon-ok");
			$("#ucase").css("color","#00A41E");
		}else{
			$("#ucase").removeClass("glyphicon-ok");
			$("#ucase").addClass("glyphicon-remove");
			$("#ucase").css("color","#FF0004");
		}

		if(lcase.test($("#password1").val())){
			$("#lcase").removeClass("glyphicon-remove");
			$("#lcase").addClass("glyphicon-ok");
			$("#lcase").css("color","#00A41E");
		}else{
			$("#lcase").removeClass("glyphicon-ok");
			$("#lcase").addClass("glyphicon-remove");
			$("#lcase").css("color","#FF0004");
		}

		if(num.test($("#password1").val())){
			$("#num").removeClass("glyphicon-remove");
			$("#num").addClass("glyphicon-ok");
			$("#num").css("color","#00A41E");
		}else{
			$("#num").removeClass("glyphicon-ok");
			$("#num").addClass("glyphicon-remove");
			$("#num").css("color","#FF0004");
		}

		if($("#password1").val() == $("#password2").val()){
			$("#pwmatch").removeClass("glyphicon-remove");
			$("#pwmatch").addClass("glyphicon-ok");
			$("#pwmatch").css("color","#00A41E");
		}else{
			$("#pwmatch").removeClass("glyphicon-ok");
			$("#pwmatch").addClass("glyphicon-remove");
			$("#pwmatch").css("color","#FF0004");
		}
	});
	</script>

	<script type="text/javascript">
	function pswderr(){
	    var ucase = new RegExp("[A-Z]+");
	  var lcase = new RegExp("[a-z]+");
	  var num = new RegExp("[0-9]+");

	  if($("#password1").val().length >= 8){
	    $("#8char").removeClass("glyphicon-remove");
	    $("#8char").addClass("glyphicon-ok");
	    $("#8char").css("color","#00A41E");
	  }else{
	alert('Parece que su contraseña es menor a ocho dígitos');
	return false;
	  }

	  if(ucase.test($("#password1").val())){
	    $("#ucase").removeClass("glyphicon-remove");
	    $("#ucase").addClass("glyphicon-ok");
	    $("#ucase").css("color","#00A41E");
	  }else{
	alert('Su contraseña debe tener al menos una letra mayúscula.');
	return false;
	  }

	  if(lcase.test($("#password1").val())){
	    $("#lcase").removeClass("glyphicon-remove");
	    $("#lcase").addClass("glyphicon-ok");
	    $("#lcase").css("color","#00A41E");
	  }else{
	    alert('Su contraseña debe tener al menos una letra minúscula.');
	return false;
	  }

	  if(num.test($("#password1").val())){
	    $("#num").removeClass("glyphicon-remove");
	    $("#num").addClass("glyphicon-ok");
	    $("#num").css("color","#00A41E");
	  }else{
	alert('Su contraseña debe tener al menos un número.');
	return false;
	  }

	  if($("#password1").val() == $("#password2").val()){
	    $("#pwmatch").removeClass("glyphicon-remove");
	    $("#pwmatch").addClass("glyphicon-ok");
	    $("#pwmatch").css("color","#00A41E");
	  }else{
	alert('Las contraseñas debe coincidir.');
	return false;
	  }
	}
	</script>
</html>
<?php
		}
		else{
			header('Location:../index.php');
		}
	}
	else{
		header('Location:../index.php');
	}
?>
