<?php
require_once ("config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
require_once ("config/conexion.php");//Contiene funcion que conecta a la base de datos

session_start();
header("Content-Type: text/html;charset=utf-8");
if(!empty($_SESSION['idnivel'])){
if($_SESSION['idnivel']==2 && $_SESSION["autentificado"]= "SI"){
   header("location: cliente/herramientas.php");
}
if ($_SESSION['idnivel']==1 && $_SESSION["autentificado"]= "SI"){
  header("location: admin/estados.php");
}
}

if(!empty($_POST))
{
  $idusuario = mysqli_real_escape_string($con, $_POST['idusuario']);
  $password = mysqli_real_escape_string($con, $_POST['password']);
  //$passcifrado = sha1($password);
  $error= '';
  $sql ="SELECT id, idnivel, idstatus, password from tblusuario where id = '$idusuario' AND password ='$password'" ;
  $result =$con -> query($sql);
  $counter=mysqli_num_rows($result);
  $datos = $result->fetch_row();
  $idnivel =$datos[1];
  $idstatus=$datos[2];
$_SESSION['status']=$idstatus;
$_SESSION['idnivel']=$idnivel;
//var_dump($_SESSION);
//die();
if ($counter==1){
  $_SESSION['idusuario']=$idusuario;
  $_SESSION["autentificado"]= "SI";
  if($idnivel==2 && $idstatus==1) {
   $sql2 =("SELECT a.nomcliente, a.emailcli, a.apellidocli, b.nomEmp, b.diremp, a.telefcli FROM tblcliente a, tblemprecli b where a.id='$idusuario' and b.idcliente='$idusuario'");
    $result2 =$con -> query($sql2);
     $valida=$result2->num_rows;
     if($valida !=0){
         $datosUsu = $result2->fetch_row();
         $_SESSION['nombreusu'] = $datosUsu[0];
         $_SESSION['emailusu'] = $datosUsu[1];
         $_SESSION['apeusu'] = $datosUsu[2];
         $_SESSION['empusu'] = $datosUsu[3];
         $_SESSION['empdir'] = $datosUsu[4];
         $_SESSION['telefusu'] = $datosUsu[5];

         header("location: cliente/herramientas.php");
     }
   }
   else if ($idnivel==2 && $idstatus==2){
     $error1="El usuario: ".'"'.$_SESSION['idusuario'].'"'. "no tiene permisos para ingresar.";
   }

/*usuario admin*/
if($idnivel==1 && $idstatus==1) {
 $sql3 =("SELECT  id, puesto FROM tbladmin where id='$idusuario' ");
  $result3 =$con -> query($sql3);
   $valida2=$result3->num_rows;

   if($valida2 !=0){
       $datosadmin = $result3->fetch_row();
       $_SESSION['id'] = $datosadmin[0];
       $_SESSION['puesto'] = $datosadmin[1];

       header("location: admin/estados.php");
   }
 }
 else if ($idnivel==1 && $idstatus==2){
   $error1="El usuario: ".$_SESSION['idusuario']."no tiene permisos para ingresar.";
 }

 if($idnivel==3 && $idstatus==1) {
  $sql4 =("SELECT  id, puesto FROM tbladmin where id='$idusuario' ");
   $result4 =$con -> query($sql4);
    $valida3=$result4->num_rows;

    if($valida3 !=0){
        $datosadmin = $result4->fetch_row();
        $_SESSION['id'] = $datosadmin[0];
        $_SESSION['puesto'] = $datosadmin[1];

        header("location: admin/entregados.php");
    }
  }
  else if ($idnivel==3 && $idstatus==2){
    $error1="El usuario: ".$_SESSION['idusuario']."no tiene permisos para ingresar.";
  }



 }

 else {
   $error="¡Ay Caramba!, ¿Se te han olvidado tus datos? ¡Verifica!";



}




}
 ?>

<!DOCTYPE html>
<html>
<head>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="login/jquery-1.11.1.min.js"></script>
<script src="login/bootstrap.min.js"></script>
<link rel="stylesheet" href="login/styles.css">
<link rel="stylesheet" href="fonts/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="login/bootstrap.min.css">
<style>

@font-face { font-family: RobotoCondensed-Regular;
			 src: url('fonts/RobotoCondensed-Regular.ttf');
     }

     @font-face { font-family: Oswald-Regular;
     			 src: url('fonts/Oswald-Regular.ttf');
          }
          body{
          	 background: url(images/fondo.png) no-repeat center center fixed;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
            font-family:'HelveticaNeue','Arial', sans-serif;

          }
          a{color:#58bff6;text-decoration: none;}
          a:hover{color:#aaa; }
          .pull-right{float: right;}
          .pull-left{float: left;}
          .clear-fix{clear:both;}
          div.logo{text-align: center; margin: 20px 20px 30px 20px; fill: #566375;}
          div.logo svg{
          	width:180px;
          	height:100px;
          }
          .logo-active{fill: #44aacc !important;}
          #formWrapper{
          	background: rgba(0,0,0,.2);
          	width:100%;
          	height:100%;
          	position: absolute;
          	top:0;
          	left:0;
          	transition:all .3s ease;}
          .darken-bg{background: rgba(0,0,0,.5) !important; transition:all .3s ease;}

          div#form{
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
          div.form-item{position: relative; display: block; margin-top: 10px; margin-bottom: 20px;}
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
          input[type="submit"].login{
          	float:right;
          	width: 112px;
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
          input[type="submit"].login:hover{background-color: #fff; border:1px solid #55b1df; color:#55b1df; cursor:pointer;}
          input[type="submit"].login:focus{outline: none;}



  img {
  }
.header {
width: 100%;
text-align: center;
}

.errorshow{
  margin-top:40px;
  margin-left: 30px;
  font-family: Oswald-Regular;
  font-size: 20px;
  color: #F71515;
  text-align: center;
}

</style>
</head>
<body>
<div class=" container header col-md-12 col-sm-12">
<img src="images/headermini2.png" alt="headermini2.png">
<hr>
</div>
<div id="formWrapper">

<div id="form">
  <form id="login-form" action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">

		<div class="form-item">
			<p class="formLabel">Cédula</p>
			<input type="number" id="idusuario" name="idusuario"  class="form-style" autocomplete="off"/>
		</div>
		<div class="form-item">
			<p class="formLabel">Contraseña</p>
			<input type="password" name="password" id="password" class="form-style" />

			<p><a href="recuperar/searchemail.html" ><small>¿Has olvdado tu contraseña? Por favor, haz clic aquí.</small></a></p>
		</div>
		<div class="form-item">
		<input type="submit" class="login pull-right" value="Iniciar sesión">
		<div class="clear-fix"></div>
		</div>
  </form>
</div>
</div>
<div class="errorshow"><?php echo isset($error) ?  utf8_encode(utf8_decode($error)): '' ; ?></div>
<div class="errorshow"><?php echo isset($error1) ?  utf8_encode(utf8_decode($error1)): '' ; ?></div>
</body>


<script type="text/javascript">

$(function() {

    var $formLogin = $('#login-form');
    var $formLost = $('#lost-form');
    var $formRegister = $('#register-form');
    var $divForms = $('#div-forms');
    var $modalAnimateTime = 300;
    var $msgAnimateTime = 150;
    var $msgShowTime = 2000;



    $('#login_register_btn').click( function () { modalAnimate($formLogin, $formRegister) });
    $('#login_lost_btn').click( function () { modalAnimate($formLogin, $formLost); });
    $('#lost_login_btn').click( function () { modalAnimate($formLost, $formLogin); });




  });

</script>


<script type="text/javascript">
$(document).ready(function(){
var formInputs = $('input[type="number"],input[type="password"]');
formInputs.focus(function() {
     $(this).parent().children('p.formLabel').addClass('formTop');
     $('div#formWrapper').addClass('darken-bg');
     $('div.logo').addClass('logo-active');
});
formInputs.focusout(function() {
  if ($.trim($(this).val()).length == 0){
  $(this).parent().children('p.formLabel').removeClass('formTop');
  }
  $('div#formWrapper').removeClass('darken-bg');
  $('div.logo').removeClass('logo-active');
});
$('p.formLabel').click(function(){
   $(this).parent().children('.form-style').focus();
});
});
</script>
</html>
