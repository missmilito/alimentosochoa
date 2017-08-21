<?php
require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos
session_start();
if(!empty($_POST)){

//INFORMACION DE USUARIO

//INFORMACION DEL CLIENTE
$idcliente=utf8_decode($_POST['idcliente']);
$nombrecli = utf8_decode($_POST['nombre']);
$_SESSION['nombreusu']=$nombrecli;

$apellido = utf8_decode($_POST['apellido']);
$_SESSION['apeusu']= $apellido;
$emailcli = utf8_decode($_POST['email']);
$_SESSION['emailusu']=$emailcli;
$tlfcli= utf8_decode($_POST['telefonocliente']);
$_SESSION['telefusu']=$tlfcli;
//INFORMACION DE LA EMPRESA

$rif = utf8_decode($_POST['rifemp']);
$nomempresa = utf8_decode($_POST['nomemp']);
$_SESSION['empusu']=$nomempresa;
$diremp = utf8_decode($_POST['diremp']);
$_SESSION['empdir']=$diremp;
$emailemp = utf8_decode($_POST['emailemp']);
$tlfemp = utf8_decode($_POST['tlfemp']);

$insert_tblcliente=mysqli_query($con, "UPDATE tblcliente set id='$idcliente', nomcliente= '$nombrecli', apellidocli='$apellido', emailcli='$emailcli', telefcli='$tlfcli' WHERE id= '$idcliente'");
$insert_tblempresa=mysqli_query($con, "UPDATE tblemprecli set id='$rif', nomEmp='$nomempresa', diremp='$diremp', emailemp= '$emailemp', telefemp = '$tlfemp', idcliente='$idcliente' where idcliente='$idcliente'");

header('Location: ../perfilusuario.php?edit=exito');
}
else {
  header('Location: ../editinfo.PHP');
}



?>
