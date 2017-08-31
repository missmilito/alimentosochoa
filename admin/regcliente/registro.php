<?php
require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos

session_start();

//INFORMACION DE USUARIO
$codid= utf8_decode($_POST['letraid']);
$reg_id = utf8_decode($_POST['idcliente']);
$reg_idnivel = utf8_decode($_POST['nivelusuario']);
$reg_password = utf8_decode($_POST['password']);
$password = sha1($reg_password);
//INFORMACION DEL CLIENTE
$idcliente =utf8_decode($_POST['idcliente']);;
$nombrecli = utf8_decode($_POST['nombre']);
$apellido = utf8_decode($_POST['apellido']);
$emailcli = utf8_decode($_POST['emailcliente']);
$codtlf=utf8_decode($_POST['codtelef']);
$tlf=utf8_decode($_POST['telefonocliente']);
$tlfcli= $codtlf.$tlf;

//INFORMACION DE LA EMPRESA
$codrif= utf8_decode($_POST['letrarif']);
$rifemp= utf8_decode($_POST['rifemp']);
$rif = $codrif.$rifemp;
$nomempresa = utf8_decode($_POST['nomemp']);
$diremp = utf8_decode($_POST['diremp']);
$emailemp = utf8_decode($_POST['emailemp']);
$codtlfemp=utf8_decode($_POST['codtelef2']);
$tlf2=utf8_decode($_POST['tlfemp']);
$tlfemp = $codtlfemp.$tlf2;



$consulta="SELECT * FROM tblusuario WHERE id = '$idcliente'";
$resultado = $con -> query($consulta);
$rows = $resultado -> num_rows;
if($rows > 0){
  $row=$resultado -> fetch_assoc();

header('Location: ../regcliente.php?error=error');
}
else {
  $idempleado = $_SESSION['id'];

$insert_value=mysqli_query($con, "INSERT INTO tblusuario (id,  password, idnivel, idstatus) VALUES ('$idcliente','$password', '2', '1')");
$insert_tblcliente=mysqli_query($con, "INSERT INTO tblcliente (id, nomcliente, apellidocli, emailcli, telefcli) VALUES ('$idcliente','$nombrecli', '$apellido', '$emailcli', '$tlfcli')");
$insert_tblempresa=mysqli_query($con, "INSERT INTO tblemprecli (id, nomEmp, diremp, emailemp, idcliente, telefemp) VALUES ('$rif','$nomempresa', '$diremp', '$emailemp', '$idcliente', '$tlfemp')");
$insert_tblauditoria=mysqli_query($con,"INSERT INTO `tbl_auditoria`(`id`, `iduser`, `seccion`, `idseccion`, `operacion`, `fecha`) VALUES ('', '$idempleado', 'Registro cliente', '$idcliente', 'Registro', NOW())" );
$_SESSION['nombreinst']=$nombrecli;
$_SESSION['apellidoinst']=$apellido;
$_SESSION['passwordinst']=$reg_password;
$_SESSION['emailinst']=$emailcli;

header('Location: ../enviar_email.php');

}


?>
