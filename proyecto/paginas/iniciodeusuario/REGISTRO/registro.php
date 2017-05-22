<?php
require_once ("../../../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
require_once ("../../../config/conexion.php");//Contiene funcion que conecta a la base de datos

session_start();

$subs_id = utf8_decode($_POST['id_cliente']);
$subs_idtipo = utf8_decode($_POST['id_tipo']);
$subs_password = utf8_decode($_POST['password']);

$consulta="SELECT * FROM usuarios WHERE id_cliente = '$subs_id'";
$resultado = $con -> query($consulta);
$rows = $resultado -> num_rows;
if($rows > 0){
  $row=$resultado -> fetch_assoc();
echo "<span style='font-weight:bold;color:red;'>La cédula que usted ha proporcionado ha sido previamente registrada en nuestra base de datos.</span>";
}






//else {

	//$insert_value = 'INSERT INTO `' . $db_name . '`.`'.$db_table_name.'` (`id_cliente` , `pass_cliente` , `id_tipo`) VALUES ("' . $subs_id . '", "' . $subs_password . '", "' . $subs_idtipo . '")';

//mysql_select_db($db_name, $db_connection);
//$retry_value = mysql_query($insert_value, $db_connection);

//if (!$retry_value) {
   //die('Error: ' . mysql_error());
//}

//header('Location: Success.html');

//}




?>
