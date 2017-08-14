<?php
require_once ("config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
require_once ("config/conexion.php");//Contiene funcion que conecta a la base de datos

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


$consulta="SELECT * FROM tblusuario WHERE id = '$reg_id'";
$resultado = $con -> query($consulta);
$rows = $resultado -> num_rows;
if($rows > 0){
  $row=$resultado -> fetch_assoc();
echo "<span style='font-weight:bold;color:red;'>La cédula que usted ha proporcionado ha sido previamente registrada en nuestra base de datos.</span>";
}
else {
$insert_value=mysqli_query($con, "INSERT INTO tblusuario (id, idtipousuario, password) VALUES ('$reg_id','$reg_idnivel', '$password')");
$insert_tblcliente=mysqli_query($con, "INSERT INTO tblcliente (id, nomcliente, apellidocli, emailcli) VALUES ('$idcliente','$nombrecli', '$apellido', '$emailcli')");
$insert_tblempresa=mysqli_query($con, "INSERT INTO tblemprecli (id, nomEmp, diremp, emailemp, idcliente) VALUES ('$rif','$nomempresa', '$diremp', '$emailemp', '$idcliente')");
$insert_tlfcli= mysqli_query($con, "INSERT INTO tbltelefcli (id, TelefonoCli, idCliente) VALUES ('', '$tlfcli', '$idcliente') ");

header('Location: Success.php');
}




?>
