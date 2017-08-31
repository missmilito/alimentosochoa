<?php
session_start();
$password1 = $_POST['password1'];
$password2 = $_POST['password2'];
$idusuario = $_SESSION['intentar'];
$token = $_POST['token'];


?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta name="author" content="denker">
    <title> Restablecer contraseña </title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-theme.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
  </head>

  <body>
    <div class="container" role="main">
      <div class="col-md-2"></div>
      <div class="col-md-8">
<?php
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

					echo"<p> La contraseña se actualizó con exito. </p>";
				}
        }
			else{
			echo"<p> Las contraseñas no coinciden </p>";
			}
}
else{
	header('Location:../index.php');
}

}
else{
	header('Location:../index.php');
}
?>
	</div>
<div class="col-md-2"></div>
	</div> <!-- /container -->
<script src="js/jquery-1.11.1.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
