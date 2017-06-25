<?php
// Estableciendo la conexion a la base de datos
include_once("../config/db.php");//Contienen las variables, el servidor, usuario, contraseña y nombre  de la base de datos
include_once("../config/conexion.php");//Contiene de conexion a la base de datos

session_start();// Iniciando Sesion
// Guardando la sesion
$user_check=$_SESSION['login_user_sys'];
// SQL Query para completar la informacion del usuario
$ses_sql=mysqli_query($con, "select id from tblusuario where id='$user_check'");
$row = mysqli_fetch_assoc($ses_sql);
mysqli_close($con); // Cerrando la conexion
$login_session =$row['id'];
if(!isset($login_session)){
	header('Location: ../perfilusuario.php'); // Redirecciona a la pagina de inicio
}
?>
