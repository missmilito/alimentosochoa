<?PHP
require_once ("config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
require_once ("config/conexion.php");//Contiene funcion que conecta a la base de datos

session_start();
$iduser= $_SESSION['idusuario'];
header("Content-Type: text/html;charset=utf-8");
if(!empty($_POST))
{
  $newpass = mysqli_real_escape_string($con, $_POST['password1']);
  $password = sha1($newpass);
  $insert_value=mysqli_query($con, "UPDATE tblusuario set password='$password' where id='$iduser'");
header('Location:perfilusuario.php?psw=sipsw');
}
?>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">

		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="dist/bootstrap.min.css" type="text/css" media="all">

    <script src="dist/jquery-1.11.1.min.js"></script>
    <script src="dist/bootstrap.min.js"></script>

    <!-- BOOTSTRAP CORE CSS-->
		<link href="vendor/bootstrap/bootstrap.min.css" rel="stylesheet">

    <!-- CUSTOM BOOTSTRAP CSS-->

    <link href="theme/styles.css" rel="stylesheet">
    <link rel="stylesheet" href="fonts/font-awesome/css/font-awesome.min.css">
    <script src="vendor/bootstrap/bootstrap.min.js"></script>
    <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
    <script src="js/perfilusuario/scripts.js"></script>
    <script src="theme/scripts.js"></script>
    <link rel="stylesheet" href="theme/styles2.css">
  </head>
  <body>
<div><?php include('theme/theme.php') ?></div>
<div id="wrapper">

  <!-- Sidebar -->
  <div id="sidebar-wrapper">

      <ul class="sidebar-nav">

          <li class="sidebar-brand" >
              <a style="text-align: center">
                  MODULOS
              </a>
          </li>

         <li class="dropdown">
           <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-pencil 2x"> REGISTRO</i><span class="caret"></span></a>
           <ul class="dropdown-menu2 dropdown" >
             <li><a href="#">Nuevo Pedido.</a></li>
           </ul>
         </li>
         <li class="dropdown">
           <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-ok 2x"> CONSULTAR</i><span class="caret"></span></a>
           <ul class="dropdown-menu2 dropdown" >
             <li><a href="#">Estado Actual.</a></li>
             <li><a href="#">Pedidos.</a></li>
             <li><a href="pagos.php">Pagos.</a></li>
           </ul>
         </li>
         <li class="dropdown">
           <a href="herramientas.php" class="dropdown-toggle" ><i class="glyphicon glyphicon-cog 2x"> HERRAMIENTAS</i></a>
         </li>
      </ul>
  </div>
  <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper" style="margin-top:90px">
            <div class="container">


<div class="row">
<div class="container" style="text-align: center">
<h1>Cambio de contraseña.</h1>
</div>
</div>
<div class="row">
<div class="col-sm-6 col-sm-offset-3">
<p class="text-center">Considera las reglas que se mencionan para crear una contraseña segura.</p>
  <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>" id="passwordForm">
<input type="password" class="input-lg form-control" name="password1" id="password1" placeholder="Nueva contraseña." autocomplete="off" required>
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
<input type="password" class="input-lg form-control" name="password2" id="password2" placeholder="Repetir contraseña." autocomplete="off" required>
<div class="row">
<div class="col-sm-12">
<span id="pwmatch" class="glyphicon glyphicon-remove" style="color:#FF0004;"></span> Las contraseñas coinciden.
</div>
</div>
<input type="submit" class="col-xs-12 btn btn-primary btn-load btn-lg" onClick="return pswderr();" data-loading-text="Changing Password..." value="Cambiar contraseña.">
</form>
</div><!--/col-sm-6-->
</div><!--/row-->
</div>
                </div>
            </div>

        <!-- /#page-content-wrapper -->




  </body>

  <!-- script references -->

<script type="text/javascript">

$("#menu-toggle").click(function(e) {
    e.preventDefault();
    $("#wrapper").toggleClass("toggled");
});


$(document).ready(function() {
    $('.navbar a.dropdown-toggle').on('click', function(e) {
        var $el = $(this);
        var $parent = $(this).offsetParent(".dropdown-menu");
        $(this).parent("li").toggleClass('open');

        if(!$parent.parent().hasClass('nav')) {
            $el.next().css({"top": $el[0].offsetTop, "left": $parent.outerWidth() - 4});
        }

        $('.nav li.open').not($(this).parents("li")).removeClass("open");

        return false;
    });
});

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
  }

  if(ucase.test($("#password1").val())){
    $("#ucase").removeClass("glyphicon-remove");
    $("#ucase").addClass("glyphicon-ok");
    $("#ucase").css("color","#00A41E");
  }else{
alert('Su contraseña debe tener al menos una letra mayúscula.');
  }

  if(lcase.test($("#password1").val())){
    $("#lcase").removeClass("glyphicon-remove");
    $("#lcase").addClass("glyphicon-ok");
    $("#lcase").css("color","#00A41E");
  }else{
    alert('Su contraseña debe tener al menos una letra minúscula.');

  }

  if(num.test($("#password1").val())){
    $("#num").removeClass("glyphicon-remove");
    $("#num").addClass("glyphicon-ok");
    $("#num").css("color","#00A41E");
  }else{
alert('Su contraseña debe tener al menos un número.');
  }

  if($("#password1").val() == $("#password2").val()){
    $("#pwmatch").removeClass("glyphicon-remove");
    $("#pwmatch").addClass("glyphicon-ok");
    $("#pwmatch").css("color","#00A41E");
  }else{
alert('Las contraseñas debe coincidir.');
  }
}
</script>
</html>
