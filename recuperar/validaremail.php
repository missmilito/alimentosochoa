<?php
include_once('class.phpmailer.php');
include_once('class.smtp.php');

$email = 'nahilinochoa@gmail.com';
	$respuesta = new stdClass();

	if( $email != "" ){
   		$conexion = new mysqli('localhost', 'root', '', 'pass');

   		$sql = " SELECT * FROM users WHERE email = 'nahilinochoa@gmail.com' ";
   		$resultado = $conexion->query($sql);

   		if($resultado->num_rows > 0){
      		$usuario = $resultado->fetch_assoc();
					$idusuario= $usuario['id'];
					$username= $usuario['username'];

					$cadena = $idusuario.$username.rand(1,9999999).date('Y-m-d');
					$token = sha1($cadena);

					$conexion = new mysqli('localhost', 'root', '', 'pass');

					$sql = "INSERT INTO tblreseteopass (idusuario, username, token, creado) VALUES($idusuario,'$username','$token',NOW()) ON DUPLICATE KEY UPDATE
token='$token', creado = NOW();";

					$resultado= $conexion->query($sql);

						$enlace = $_SERVER["SERVER_NAME"].'/pass/restablecer.php?idusuario='.sha1($idusuario).'&token='.$token;

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

								$para = "tornasolvibes@gmail.com";
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
								$mail->Username ='nahilinochoa@gmail.com';
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
									$mensaje = '<div class="alert alert-info"> Un correo ha sido enviado a su cuenta de email con las instrucciones para restablecer la contraseña </div>';
   echo $enlace;
								}
								else{
								    echo'<script type="text/javascript">
								            alert("NO ENVIADO, intentar de nuevo");

								         </script>';
								}

      		}
   		}
   		else {
   			$mensaje = '<div class="alert alert-warning"> No existe una cuenta asociada a ese correo. </div>';
	}
}
	else {
   		$mensaje= "Debes introducir el email de la cuenta";

}
 	echo $mensaje;
