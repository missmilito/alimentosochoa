<?php
require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos

session_start();

//INFORMACION DE USUARIO
$reg_id = utf8_decode($_POST['idcliente']);
$reg_idnivel = utf8_decode($_POST['nivelusuario']);
$reg_password = utf8_decode($_POST['password']);
$password = sha1($reg_password);
//INFORMACION DEL CLIENTE
$idcliente = utf8_decode($_POST['idcliente']);
$nombrecli = utf8_decode($_POST['nombre']);
$apellido = utf8_decode($_POST['apellido']);
$emailcli = utf8_decode($_POST['emailcliente']);
$tlfcli= utf8_decode($_POST['telefonocliente']);

//INFORMACION DE LA EMPRESA

$rif = utf8_decode($_POST['rifemp']);
$nomempresa = utf8_decode($_POST['nomemp']);
$diremp = utf8_decode($_POST['diremp']);
$emailemp = utf8_decode($_POST['emailemp']);
$tlfemp = utf8_decode($_POST['tlfemp']);



$consulta="SELECT * FROM tblusuario WHERE id = '$reg_id'";
$resultado = $con -> query($consulta);
$rows = $resultado -> num_rows;
if($rows > 0){
  $row=$resultado -> fetch_assoc();

header('Location: ../regcliente.php?error=error');
}
else {
$insert_value=mysqli_query($con, "INSERT INTO tblusuario (id,  password, idnivel, idstatus) VALUES ('$reg_id','$password', '2', '1')");
$insert_tblcliente=mysqli_query($con, "INSERT INTO tblcliente (id, nomcliente, apellidocli, emailcli, telefcli) VALUES ('$idcliente','$nombrecli', '$apellido', '$emailcli', '$tlfcli')");
$insert_tblempresa=mysqli_query($con, "INSERT INTO tblemprecli (id, nomEmp, diremp, emailemp, idcliente, telefemp) VALUES ('$rif','$nomempresa', '$diremp', '$emailemp', '$idcliente', '$tlfemp')");
$_SESSION['nombreinst']=$nombrecli;
$_SESSION['apellidoinst']=$apellido;
$_SESSION['passwordinst']=$reg_password;
header('Location: ../enviar_email.php');

}


?>
