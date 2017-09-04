<?php
include_once('class.phpmailer.php');
include_once('class.smtp.php');
session_start();
if(isset($_POST['email'])){
$email = $_POST['email'];
	$respuesta = new stdClass();

	if( $email != "" ){
   		$conexion = new mysqli('localhost', 'root', '', 'bd_distribuidora');

   		$sql = " SELECT * FROM tblcliente WHERE emailcli = '$email' ";
   		$resultado = $conexion->query($sql);

   		if($resultado->num_rows > 0){
      		$usuario = $resultado->fetch_assoc();
					$idusuario= $usuario['id'];
					$_SESSION['intentar']= $usuario['id'];
					$username= $usuario['nomcliente'];

					$cadena = $idusuario.$username.rand(1,9999999).date('Y-m-d');
					$token = sha1($cadena);

					$conexion = new mysqli('localhost', 'root', '', 'bd_distribuidora');

					$sql = "INSERT INTO tblreseteopass (idusuario, username, token, creado) VALUES($idusuario,'$username','$token',NOW()) ON DUPLICATE KEY UPDATE
token='$token', creado = NOW();";

					$resultado= $conexion->query($sql);

						$enlace = $_SERVER["SERVER_NAME"].'/alimentosochoa/recuperar/restablecer.php?idusuario='.sha1($idusuario).'&token='.$token;

      		if($enlace !=""){

								$mensaje = '<html>
								<head>
						 			<title>Restablece tu contraseña</title>
								</head>
								<body>
						 			<p>Hemos recibido una petición para restablecer la contraseña de tu cuenta.</p>
						 			<p>Si hiciste esta petición, haz clic en el siguiente enlace, si no hiciste esta petición puedes ignorar este correo.</p>
						 			<p>
						 				<strong>Enlace para restablecer tu contraseña</strong><br>
						 				<a href="'.$enlace.'"> Restablecer contraseña </a>
						 			</p>
								</body>
								</html>';

								$para = $email;
								$asunto = "probando";

								$archivo = "";

								//Este bloque es importante
								$mail = new PHPMailer();
								$mail->IsSMTP();
								$mail->SMTPAuth = true;
								$mail->SMTPSecure = "ssl";
								$mail->Host = "smtp.gmail.com";
								$mail->Port = 465;
								$mail->FromName = "AREA 10";
								//Nuestra cuenta
								$mail->Username ='distalimentosochoa@gmail.com';
								$mail->Password = 'milito-10'; //Su password

								//Agregar destinatario
								$mail->AddAddress($para);
								$mail->Subject = $asunto;
								$mail->Body = $mensaje;
								//Para adjuntar archivo
								$mail->MsgHTML($mensaje);

								//Avisar si fue enviado o no y dirigir al index
								if($mail->Send())
								{
									$mensaje = '<div class="correcto"> Un correo ha sido enviado a su cuenta de email con las instrucciones para restablecer la contraseña. </div>';

								}
								else{
								    echo'<script type="text/javascript">
								            alert("NO ENVIADO, intentar de nuevo");

								         </script>';
								}

      		}
   		}
   		else {
   			$mensaje = '<div class="noexiste">No existe una cuenta asociada a ese correo. </div>';
	}
}
}
	else {
   		$mensaje= "<div class='noexiste'>Debe ingresar un email valido.</div>";

}
 	?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<link rel="icon" href="../images/headermini.png" type="image/png" sizes="16x16">

		<title>Validación de contraseña.</title>

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
		<meta charset="utf-8">
		<title></title>
	</head>
	<body >
		<div class="header col-md-12 col-sm-8" style="text-align: center">
		<img src="../images/headermini2.png" alt="headermini2.png" >
		<hr>
		</div>
				<div class="container">
<?php if(isset($mensaje)) {
	echo $mensaje;
}?></div>

	</body>
</html>
