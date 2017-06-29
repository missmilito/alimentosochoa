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
  $sql ="SELECT id, password from tblusuario where id = '$idcliente' AND password ='$passcifrado'";
  $result =$con -> query($sql);
  $counter=mysqli_num_rows($result);
//var_dump($_SESSION);
//die();
if ($counter==1){
  $_SESSION['idcliente']=$idcliente;
  $_SESSION["autentificado"]= "SI";
   $sql2 =("SELECT a.nomcliente, a.emailcli, a.apellidocli, b.nomEmp, b.diremp FROM tblcliente a, tblemprecli b where a.id='$idcliente' and b.idcliente='$idcliente'");
    $result2 =$con -> query($sql2);
     $valida=$result2->num_rows;

     if($valida !=0){
         $datosUsu = $result2->fetch_row();
         $_SESSION['nombreusu'] = $datosUsu[0];
         $_SESSION['emailusu'] = $datosUsu[1];
         $_SESSION['apeusu'] = $datosUsu[2];
         $_SESSION['empusu'] = $datosUsu[3];
         $_SESSION['empdir'] = $datosUsu[4];
         header("location: ../perfilusuario.php");
     }
      else {
          $error="warisney";
      }



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
