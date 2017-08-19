<?php
require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos

session_start();

//INFORMACION DE USUARIO
$reg_id = utf8_decode($_POST['idcliente']);
$idstatus = utf8_decode($_POST['idstatus']);
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


$insert_value=mysqli_query($con, "UPDATE tblusuario set idstatus= '$idstatus' WHERE id='$idcliente'");
$insert_tblcliente=mysqli_query($con, "UPDATE tblcliente set nomcliente= '$nombrecli', apellidocli='$apellido', emailcli='$emailcli', telefcli='$tlfcli' WHERE id= '$idcliente'");
$insert_tblempresa=mysqli_query($con, "UPDATE tblemprecli set id='$rif', nomEmp='$nomempresa', diremp='$diremp', emailemp= '$emailemp', telefemp = '$tlfemp' where idcliente='$idcliente'");
$_SESSION['nombreedit']=$nombrecli;
$_SESSION['apellidoedit']=$apellido;
$_SESSION['idedit']=$idcliente;
header('Location: ../cclientes.php?edit=exito');




?>
