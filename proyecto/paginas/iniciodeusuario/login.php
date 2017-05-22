<?php
require_once ("../../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
require_once ("../../config/conexion.php");//Contiene funcion que conecta a la base de datos

session_start();
if(!empty($_POST))
{
  $usuario = mysqli_real_escape_string($con, $_POST['usuario']);
  $password = mysqli_real_escape_string($con, $_POST['password']);
  $error= '';
 $pass_cifrado = password_hash ($password, PASSWORD_DEFAULT);


      $sql ="SELECT pass_cliente from usuarios where id_cliente = '$usuario' AND pass_cliente ='$pass_cifrado'";
      $result =$con -> query($sql);
      $rows = $result -> num_rows;

      if($rows > 0){
        $row=$result -> fetch_assoc();
        header ("location: frontendcliente.html");
      } else {
        $error="el nombre o contraseña son incorrectos";
      }

}
 ?>


<html>
<head>
</head>


<body>
    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
      <div><label>Usuario:</label><input id="usuario"name="usuario"type="text"></div>
      <br />
      <div><label>Password:</label><input id="password"name="password"type="password"></div>
      <br />
      <div><input name="login" type="submit" value="login"></div>
    </form>

    <br />

    <div style = "font-size= 16px; color: #cc0000;"><?php echo isset($error) ?  utf8_decode ($error): '' ; ?></div>

</body>
</html>
