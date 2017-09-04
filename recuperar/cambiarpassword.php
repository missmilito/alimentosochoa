<?php
session_start();
if(isset($_POST['password1'])){$password1 = $_POST['password1'];}
if(isset($_POST['password2'])){$password2 = $_POST['password2'];}
if(isset($_SESSION['intentar'])){$idusuario = $_SESSION['intentar'];}
if(isset($_POST['token'])){$token = $_POST['token'];}


?>

<?php
if(isset($_POST['password1'])){
if( $password1 != "" && $password2 != "" && $idusuario != "" && $token != "" ){
$conexion = new mysqli('localhost', 'root', '', 'bd_distribuidora');
$sql = " SELECT * FROM tblcliente WHERE id = '$idusuario' ";

$resultado = $conexion->query($sql);
if( $resultado->num_rows > 0 ){
$usuario = $resultado->fetch_assoc();

if( $password1 === $password2 ){
  $sql = "UPDATE tblusuario SET password = '".sha1($password1)."' WHERE id = '".$idusuario."'";
  $resultado = $conexion->query($sql);
  if($resultado){
    $sql = "DELETE FROM tblreseteopass WHERE token = '$token';";
    $resultado = $conexion->query( $sql );

    $mensaje= "<div class='correcto'><p> La contraseña se actualizó con exito. </p></div>";
  }
  }
else{
$mensaje="<p> Las contraseñas no coinciden </p>";
}
}
}
}
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <title>Cambio exitoso.</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-theme.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <style media="screen">
    .noexiste {
      background-color: #d83f3f;
      font-size: 30px;
      font-family: RobotoCondensed-Regular;
      font-weight: bold;
      text-align: center;
      width:400px;
      height:50px;
      margin:0 auto;
      margin-top: 30%;
      border-radius: 5px;
      padding:5px;
  color: #ffffff;
    }
    .correcto {
      background-color: #41457a;
      font-size: 30px;
      font-family: RobotoCondensed-Regular;
      font-weight: bold;
      text-align: center;
      width:500px;
      height: 150px;
      margin: 0 auto;
      border-radius: 5px;
      margin-top: 30%;
      padding: 5px;

  color: #ffffff;
    }
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
  img {
    margin-top: 5px;
  }
    </style>
  </head>

  <body>
    <div class="header col-md-12 col-sm-8" style="text-align: center">
		<img src="../images/headermini2.png" alt="headermini2.png" >
		<hr>
		</div>
    <div class="container" role="main">
      <?php if(isset($mensaje)) {
      	echo $mensaje;
      }?>
	</div> <!-- /container -->
<script src="js/jquery-1.11.1.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
