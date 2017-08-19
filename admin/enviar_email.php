<?php
//Librerías para el envío de mail
include_once('class.phpmailer.php');
include_once('class.smtp.php');
session_start();
$password = utf8_decode($_POST['password']);
//INFORMACION DEL CLIENTE
$idcliente = utf8_decode($_POST['idcliente']);
$nombrecli = utf8_decode($_POST['nombre']);
$apellido = utf8_decode($_POST['apellido']);

//Recibir todos los parámetros del formulario
$para = "tornasolvibes@gmail.com";
$asunto = "probando";
$mensaje = '<html>
<head>
<title>Envio de Sugerencias</title>
<style type="text/css">

#apDiv2 {
	position:absolute;
	width:49px;
	height:45px;
	z-index:2;
	left: 12px;
	top: 11px;
}

#apDiv3 {
	position:absolute;
	width:833px;
	height:115px;
	z-index:1;
	left: 99px;
	text-align: center;
	top: 16px;
}

</style>

</head>

<body>
<div id="apDiv3">
  <table width="100%" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">
    <tr>
      <td><table width="100%" border="0">
        <tr>
          <td style="text-align: center"><img src="../images/headermini.png"></td>
        </tr>
        <tr>
          <td><p>&nbsp;</p>
            <p style="font-family: Helvetica ; color: #008895; font-weight: bold; font-size: 22px; text-align: center;">¡REGISTRO EXITOSO!</p></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td><p class="margen" style="font-family: Helvetica ; text-align: center; font-weight: bold;">¡Hola, '.$_SESSION['nombreinst'].' '.$_SESSION['apellidoinst'].'! </p></td>

        </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td><p style="font-family: Helvetica ; font-size: 25px; text-align: center;">¡Has sido registrado a nuestra plataforma Web con éxito!</p></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td><p style="font-family: Helvetica; font-size: 18px; text-align: center;">Ingresa a: <a style="color:#FC963C;  font-weight: bold; " href="www.alimentosochoa.com">www.alimentosochoa.com</a> para realizar tu primer pedido.</p></td>
        </tr>
        <tr>
          <td><p style="font-family: Helvetica ; font-size: 18px; text-align: center"><span>Tu contraseña es:</span>&nbsp; '.$_SESSION['passwordinst'].'</p></td>
        </tr>


          <tr>
            <td>&nbsp;</td>
          </tr>


        <tr>
          <td><p style="font-family: Helvetica ; color: #997A7A; font-size: 10px; text-align: center;">(Si crees que hemos cometido algún error, por favor haznos saber ingresando a nuestro sitio Web, sección Contacto.)</p></td>
        </tr>
      </table></td>
    </tr>
  </table>
</div>
</body>
</html>
';
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
    header('Location: cclientes.php');
}
else{
    echo'<script type="text/javascript">
            alert("NO ENVIADO, intentar de nuevo");

         </script>';
}



 ?>
