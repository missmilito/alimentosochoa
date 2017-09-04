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
				@font-face { font-family: RobotoCondensed-Regular;
							 src: url('../fonts/RobotoCondensed-Regular.ttf');
				     }

				     @font-face { font-family: Oswald-Regular;
				     			 src: url('../fonts/Oswald-Regular.ttf');
				          }
				          body{
				          	 background: url(../images/fondo.png) no-repeat center center fixed;
				            -webkit-background-size: cover;
				            -moz-background-size: cover;
				            -o-background-size: cover;
				            background-size: cover;
				            font-family:'HelveticaNeue','Arial', sans-serif;

				          }
				          .panel{
				            position: absolute;
				            width:360px;
				            height:340px;
				            height:auto;
				            background-color: #fff;
				            margin:auto;
				            border-radius: 5px;
				            padding:20px;
				            left:50%;
				            top:50%;
				            margin-left:-180px;

				          }
				          #email {
				            color:#8a8a8a;
				          	display: block;
				          	width: 90%;
				          	height: 44px;
				          	padding: 10px 10%;
				          	border:1px solid #ccc;
				          	-moz-border-radius: 27px;
				          	-webkit-border-radius: 27px;
				          	border-radius: 27px;
				          	-moz-background-clip: padding;
				          	-webkit-background-clip: padding-box;
				          	background-clip: padding-box;
				          	background-color: #fff;
				          	font-family:'HelveticaNeue','Arial', sans-serif;
				          	font-size: 105%;
				          	letter-spacing: .8px;
				          }

				          div.form-item{position: relative; display: block; margin-top: 15px; margin-bottom: 10px;}
				           input{transition: all .2s ease;}
				           input.form-style{
				            color:#8a8a8a;
				            display: block;
				            width: 90%;
				            height: 44px;
				            padding: 10px 10%;
				            border:1px solid #ccc;
				            -moz-border-radius: 27px;
				            -webkit-border-radius: 27px;
				            border-radius: 27px;
				            -moz-background-clip: padding;
				            -webkit-background-clip: padding-box;
				            background-clip: padding-box;
				            background-color: #fff;
				            font-family:'HelveticaNeue','Arial', sans-serif;
				            font-size: 105%;
				            letter-spacing: .8px;
				          }
				          div.form-item .form-style:focus{outline: none; border:1px solid #58bff6; color:#58bff6; }
				          div.form-item p.formLabel {
				            position: absolute;
				            left:26px;
				            top:10px;
				            transition:all .4s ease;
				            color:#bbb;}
				          .formTop{top:-22px !important; left:26px; background-color: #fff; padding:0 5px; font-size: 14px; color:#58bff6 !important;}
				          .formStatus{color:#8a8a8a !important;}
				          input[type="submit"] {
				            float:right;
				            width: 180px;
				            height: 37px;
				            -moz-border-radius: 19px;
				            -webkit-border-radius: 19px;
				            border-radius: 19px;
				            -moz-background-clip: padding;
				            -webkit-background-clip: padding-box;
				            background-clip: padding-box;
				            background-color: #55b1df;
				            border:1px solid #55b1df;
				            border:none;
				            color: #fff;
				            font-weight: bold;
				          }
				          input[type="submit"]:hover{background-color: #fff; border:1px solid #55b1df; color:#55b1df; cursor:pointer;}
				          input[type="submit"]:focus{outline: none;}

				          .mensaje1 {
				            font-size: 15px;
				            font-family: RobotoCondensed-Regular;
				            text-align: justify;
				          }
				          .recuperar {
				            font-size: 20px;
				            font-family: RobotoCondensed-Regular;
				            font-weight: bold;
				            text-align: center;
				          }
									.recuperar2{
										font-size: 15px;
				            font-family: Oswald-Regular;
				            font-weight: bold;
									}
				          .formboton {
				            text-align: center;
				            font-family: RobotoCondensed-Regular;
				              letter-spacing: .8px;
				              font-size: 20px;
				              font-weight: bold;
				          }
#password1, #password2 {

	 color:#8a8a8a;
	 display: block;
	 width: 90%;
	 height: 44px;
	 padding: 10px 10%;
	 border:1px solid #ccc;
	 -moz-border-radius: 27px;
	 -webkit-border-radius: 27px;
	 border-radius: 27px;
	 -moz-background-clip: padding;
	 -webkit-background-clip: padding-box;
	 background-clip: padding-box;
	 background-color: #fff;
	 font-family:'HelveticaNeue','Arial', sans-serif;
	 font-size: 105%;
	 letter-spacing: .8px;

}
				</style>
  </head>

  <body>
		<div class="header col-md-12 col-sm-12" style="text-align: center">

		<img src="../images/headermini2.png" alt="headermini2.png" width="320px" height="180px">
		<hr>
		</div>

				<div class="container" role="main">
      <div class="col-md-4"></div>
      <div class="col-md-4">
        <form action="cambiarpassword.php" method="post">
          <div class="panel panel-default">
            <div class="panel-body">
              <p class="recuperar">Restaurar contraseña</p>
              <div class="form-group">
								<div class="form-item">

                <label class="recuperar2" for="password"> Nueva contraseña </label>
                <input type="password" class="form-control" id="password1" name="password1" required>
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

              <div class="form-group">
                <label class="recuperar2" for="password2"> Confirmar contraseña </label>
                <input type="password" class="form-control" id="password2"name="password2" required>
								<div class="row">
								<div class="col-sm-12">
								<span id="pwmatch" class="glyphicon glyphicon-remove" style="color:#FF0004;"></span> Las contraseñas coinciden.
								</div>
								</div>
              </div>
              <input type="hidden" name="token" value="<?php echo $token ?>">
              <input type="hidden" name="idusuario" value="<?php echo $idusuario ?>">
              <div class="form-group">
                <input type="submit" conClick="return pswderr();" value="Recuperar contraseña" >
              </div>
            </div>
          </div>
					</div>
        </form>
      </div>

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
