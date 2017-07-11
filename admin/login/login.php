<?php
require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos

session_start();

if(!empty($_POST))
{
  $idcliente = mysqli_real_escape_string($con, $_POST['idcliente']);
  $password = mysqli_real_escape_string($con, $_POST['password']);
  $passcifrado = sha1($password);
  $error= '';
  $sql ="SELECT id, password from tblusuario where id = '$idcliente' AND password ='$passcifrado' AND idtipousuario ='1'";
  $result =$con -> query($sql);
  $counter=mysqli_num_rows($result);
//var_dump($_SESSION);
//die();
if ($counter==1){
  $_SESSION['idcliente']=$idcliente;
  $_SESSION["autentificado"]= "SI";

         header("location: ../perfilusuario.php");
     }
      else {
          $error="warisney";
      }





}
 ?>


<html>
<head>
</head>


<body>
    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
      <div><label>Id cliente:</label><input id="idcliente" name="idcliente" type="text"></div>
      <br />
      <div><label>Password:</label><input id="password"name="password" type="password"></div>
      <br />
      <div><input name="login" type="submit" value="login"></div>
    </form>

    <br />

    <div style = "font-size= 16px; color: #cc0000;"><?php echo isset($error) ?  utf8_decode ($error): '' ; ?></div>

</body>
</html>
