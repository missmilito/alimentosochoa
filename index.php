<?php
require_once ("config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
require_once ("config/conexion.php");//Contiene funcion que conecta a la base de datos

session_start();
header("Content-Type: text/html;charset=utf-8");
if(!empty($_SESSION['idnivel'])){
if($_SESSION['idnivel']==2 && $_SESSION["autentificado"]= "SI"){
   header("location: cliente/perfilusuario.php");
}
if ($_SESSION['idnivel']==1 && $_SESSION["autentificado"]= "SI"){
  header("location: admin/perfilusuario.php");
}
}

if(!empty($_POST))
{
  $idusuario = mysqli_real_escape_string($con, $_POST['idusuario']);
  $password = mysqli_real_escape_string($con, $_POST['password']);
  $passcifrado = sha1($password);
  $error= '';
  $sql ="SELECT id, idnivel, idstatus, password from tblusuario where id = '$idusuario' AND password ='$passcifrado'" ;
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

         header("location: cliente/perfilusuario.php");
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

       header("location: admin/cclientes.php");
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
<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
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
* {
    box-sizing: border-box;
}

body {
    background-color: black;
    background: url(images/fabric.png) repeat ;
     background-repeat: repeat-y cover;
}

.row::after {
    content: "";
    clear: both;
    display: table;
}
[class*="col-"] {
    float: left;
    padding: 15px;
}
.col-1 {width: 8.33%;}
.col-2 {width: 16.66%;}
.col-3 {width: 25%;}
.col-4 {width: 33.33%;}
.col-5 {width: 41.66%;}
.col-6 {width: 50%;}
.col-7 {width: 58.33%;}
.col-8 {width: 66.66%;}
.col-9 {width: 75%;}
.col-10 {width: 83.33%;}
.col-11 {width: 91.66%;}
.col-12 {width: 100%;}
html {
    font-family: "Lucida Sans", sans-serif;
}
@media (max-width: 480px) {
  .contenido {
        top: 50%; /* IMPORTANT */
        left: 50%; /* IMPORTANT */
        display: block;
        position: absolute;

        width: 200px;
        height: 200px;
        border-radius: 25px;
        margin-top: -208.5px; /* HALF OF THE HEIGHT */
        margin-left: -375px; /* HALF OF THE WIDTH */
    }
}
.contenido {
  background: rgba(255, 255, 255, 0.4);
  top: 50%; /* IMPORTANT */
  left: 50%; /* IMPORTANT */
  display: block;
  position: absolute;
  width: 800px;
  height: 350px;
  border-radius: 25px;
  margin-top: -80.5px; /* HALF OF THE HEIGHT */
  margin-left: -400px; /* HALF OF THE WIDTH */
}



  img {
width: 350px;
    margin-left: 470px; /* HALF OF THE WIDTH */
  }
.header {
width: 100%;
}

.bienvenido {
padding-left: 20px;
padding-right: 10px;
text-align: center;
  font-size: 30px;
  color: #000;
font-family:RobotoCondensed-Regular ;
}
.m {
  font-size: 15px;
  font-family:Oswald-Regular;
}
.botones {
   background-color: #4040B3;
   border: 0px;
}
  .modaledit {
     margin-top: 150px;

   }
.modal-header{
  background-color: #4040B3;
}
.modalinput{
  margin-top: 30px;
  margin-left: 170px;

}
#idusuario, #password {
  width: 150px;
border-top: 0px;
border-left: 0px;
border-right: 0px;
  border-color: black;
  text-size: 15px;
  text-align: center;
}
input:focus{
    outline: none;
}
#text-login-msg{
  margin-left: 50px;
    font-family:Oswald-Regular;
    font-size: 20px;
}


#login {
  margin-top:40px;
  margin-left: 45px;
  width: 150px;
  height: 40px;
  font-family: Oswald-Regular;
  font-size: 20px;
  color: #FFFFFF;
  background-color: #4040B3;
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
<div class="header col-12">

<img src="images/headermini.png" alt="headermini.png">
<hr>
</div>

<div class="contenido col-9 col-sm-12">
  <div class="bienvenido"><p><b>BIENVENIDO,</p>
  <p>INICIA SESIÓN A TU PERFIL DE CLIENTE.</b></p>
  <p><div class="m">De no ser cliente de la empresa, te invitamos a visitar nuestro sitio web.</div></p>
</div>


<p class="text-center"><a href="#" class="btn btn-primary btn-lg botones" role="button" data-toggle="modal" data-target="#login-modal">Iniciar sesión.</a></p>

<p class="text-center"><a href="#" class="btn btn-primary btn-lg botones" role="button">Accede a nuestro sitio web</a></p>

<div class="errorshow"><?php echo isset($error) ?  utf8_encode(utf8_decode($error)): '' ; ?></div>
<div class="errorshow"><?php echo isset($error1) ?  utf8_encode(utf8_decode($error1)): '' ; ?></div>
</div>

  <!--MODAL DE INICIO DE SESION-->

  <div class="modal fade modaledit" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
        <div class="modal-content ">
          <div class="modal-header" align="center">

            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <i class="fa fa-window-close fa-inverse fa-2x" aria-hidden="true"></i>
            </button>

          </div>
                  <!-- Begin # DIV Form -->
                  <div id="div-forms">
                      <!-- Begin # Login Form -->
  <div class="modal-body">
<div id="div-login-msg">
              <span id="text-login-msg">Escriba su Cédula de Identidad y su Contraseña.</span>
          </div>

          <form id="login-form" action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
            <div class="modalinput">
            <i class="fa fa-user-circle-o fa-4x" id="iconuser" aria-hidden="true"></i><input id="idusuario" name="idusuario" type="text" placeholder:"Ingrese su Cédula de Identidad">
            <br />
            <i class="fa fa-key fa-4x" aria-hidden="true"></i><input id="password"name="password" type="password">
            <br />
            <div class="btnlogin"><input id="login" name="login" type="submit" value="INGRESAR"></div>

          </div>
          </form>

          <br />




<div class="checkbox">
    <label>
      <input type="checkbox"> Remember me
        </label>
        </div>
  </div>

              <!--MODAL DE INICIO DE SESION-->

            </div>
            <!-- End # DIV Form -->



</div>
</div>
</div>

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



</html>
