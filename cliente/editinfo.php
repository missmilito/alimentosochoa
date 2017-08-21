<?php
require_once ("config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
require_once ("config/conexion.php");//Contiene funcion que conecta a la base de datos
include('security.php');
$idcliente=$_SESSION['idusuario'];
$sql="SELECT a.nomcliente, a.apellidocli, a.telefcli, a.emailcli, b.id, b.nomEmp, b.emailemp, b.telefemp, b.diremp, a.id FROM `tblcliente` a, tblemprecli b where a.id='$idcliente' and b.idcliente=a.id";
$result=$con -> query($sql);
$counter=mysqli_num_rows($result);
$datos = $result->fetch_row();
$nom =$datos[0];
$email=$datos[3];
$telefcli=$datos[2];
$apellido=$datos[1];
$idemp=$datos[4];
$nomemp=$datos[5];
$diremp=$datos[8];
$emailemp=$datos[6];
$telefemp=$datos[7];
$idcli=$datos[9];

?>
<html>
  <head>
    <meta charset="utf-8">

    		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link rel="stylesheet" href="dist/bootstrap.min.css" type="text/css" media="all">

        <script src="dist/jquery-1.11.1.min.js"></script>
        <script src="dist/bootstrap.min.js"></script>
        <!-- BOOTSTRAP CORE CSS-->
    		<link href="vendor/bootstrap/bootstrap.min.css" rel="stylesheet">
        <!-- CUSTOM BOOTSTRAP CSS-->
        <link href="theme/styles.css" rel="stylesheet">
        <link rel="stylesheet" href="fonts/font-awesome/css/font-awesome.min.css">
        <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
        <link rel="stylesheet" href="theme/styles2.css">
    <title></title>
    <style media="screen">
    .row-centered {text-align:center;}
.col-centered { display:inline-block; float:none; margin-right:-4px;}
.dropdown-toggle {padding-bottom: 20px; padding-top: 10px;}
    </style>
  </head>
  <body>
    <div><?php include('theme/theme2.php') ?></div>
    <div id="wrapper">

      <!-- Sidebar -->
      <div id="sidebar-wrapper">

          <ul class="sidebar-nav">

              <li class="sidebar-brand" >
                  <a style="text-align: center">
                      MODULOS
                  </a>
              </li>

             <li class="dropdown">
               <a  class="dropdown-toggle"  data-toggle="dropdown"><i class="glyphicon glyphicon-pencil 2x"> REGISTRO</i></span></a>
               <ul class="dropdown-menu2 dropdown" >
                 <li><a href="nuevopedido.php">Nuevo Pedido.</a></li>
               </ul>
             </li>
             <li class="dropdown">
               <a  class="dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-ok 2x"> CONSULTAR</i></a>
               <ul class="dropdown-menu2 dropdown" >
                 <li><a href="#">Pedidos.</a></li>
                 <li><a href="pagos.php">Pagos.</a></li>
               </ul>
             </li>
           </li>
           <li class="dropdown">
             <a href="herramientas.php" class="dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-cog 2x"> HERRAMIENTAS</i></a>
           </li>
          </ul>
      </div>
      <!-- /#sidebar-wrapper -->

            <!-- Page Content -->
            <div id="page-content-wrapper" style="margin-top:70px">
                <div class="container">

        <div class="row row-centered">

        <div class="col-xs-12 col-sm-12 col-md-8 col-centered">
        	<div class="panel panel-default">
        		<div class="panel-heading">
			    		<h3 class="panel-title" style="text-align: center">Editando información personal.</h3>
			 			</div>
			 			<div class="panel-body">
			    		<form name="form1" role="form" method="POST" action="editinfo/editarinfo.php">
			    			<div class="row">
                  <h3 style="text-align: center">Mis datos personales.</h3>
                  <div class="col-md-4 form-group" >
                      <label>Cédula de Identidad.</label>
                      <input type="number" id="idcliente" name="idcliente" value="<?php echo $idcli; ?>" placeholder="Ingrese su cédula de identidad" class="form-control" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" onblur=""  nowhitespace minlength="7" maxlength="8" pattern="[0-9]{6,10}" required >

                      <span id="span_idcliente" style="display: none;">Campo no puede estar vacio</span>
                  </div>
                      <div class="col-md-4 form-group" >
                          <label>Nombre</label>
                          <input type="text" id="nombre" name="nombre" value="<?php echo $nom; ?>" placeholder="Ingrese su primer nombre" class="form-control" onkeypress="return validar(event)" required >
                      </div>
                      <div class="col-md-4 form-group">
                          <label>Apellido</label>
                          <input type="text" id="apellido" value="<?php echo $apellido; ?>" name="apellido" placeholder="Ingrese su primer apellido" onkeypress="return validar(event)" class="form-control" required>
                      </div>
                  </div>
                  <div class="row">
                  <div class="form-group col-md-6">
                      <label>Email/Correo</label>
                      <input type="email" name="email" id="email" value="<?php echo $email; ?>" name="emailcliente" placeholder="Ingrese e-mail personal" class="form-control" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" required>
                  </div>

                      <div class="col-md-6 form-group">
                          <label>Teléfono</label>
                          <input type="text" id="telefonocliente" value="<?php echo $telefcli; ?>" name="telefonocliente" placeholder="Ingrese su número teléfonico" class="form-control" required>
                      </div>
                    </div>
                          <h3 style="text-align: center">Datos de mi empresa.</h3>



                          <div class="row ">
                              <div class="col-sm-6 form-group">
                                    <label>RIF de la empresa</label>
                            <input  type="text" name="rifemp" value="<?php echo $idemp; ?>" placeholder="De no poseer, ingrese ci del dueño" class="form-control" required>
                          </div>



                              <div class="col-sm-6 form-group">
                                  <label>Nombre de la empresa</label>
                                  <input type="text" name="nomemp" value="<?php echo $nomemp; ?>" placeholder="Ingrese nombre de la empresa" class="form-control" required>
                              </div>

                          </div>

                          <div class="row">

                              <div class="col-sm-6 form-group">
                                  <label>Teléfono</label>

                                  <input type="number" name="tlfemp" value="<?php echo $telefemp; ?>" placeholder="Ingrese su número teléfonico" class="form-control" pattern="[0-9]{1,10}" required>
                              </div>
                              <div class="col-sm-6 form-group">
                                  <label>Email/Correo</label>
                                  <input type="email" value="<?php echo $emailemp; ?>"name="emailemp" placeholder="Ingrese e-mail personal/Ejemplo: miempresa@gmail.com" class="form-control" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" required>
                              </div>
                          </div>

                          <div class="col-sm-12 form-group">
                              <label>Dirección</label>
                              <textarea type="text" name="diremp"  rows="2" class="form-control" required><?php echo $diremp; ?></textarea>
                          </div>
                  </div>
<div class="panel-footer">
			    			<input type="submit" value="Editar información" class="btn btn-info btn-block">
</div>
			    		</form>
			    	</div>
	    		</div>
    	</div>

                    </div>
                  </div>
              </div>
  </body>

  <script type="text/javascript">

  $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
  });
  </script>

  <script>
  $('#idcliente').on('focus', function() {
      $('#div_idcliente').removeClass('has-error');
      $('#div_idcliente').addClass('col-sm-6 form-group');
      $('#span_idcliente').hide();
      $('#div_cicliente').removeClass('has-error');
      $('#div_cicliente').addClass('col-sm-6 form-group');
      $('#span_cicliente').hide();

      if (!$(this).data('defaultText')) $(this).data('defaultText', $(this).val());
      if ($(this).val()==$(this).data('defaultText')) $(this).val('');
  });

  $('#idcliente').on('blur', function() {
      if ($(this).val()=='') {
          $('#div_idcliente').addClass('has-error');
          $('#span_idcliente').removeAttr("style");
      }else{
          $('#div_idcliente').removeClass('');
          $('#div_idcliente').addClass('col-sm-6 form-group');
          $('#span_idcliente').attr('style="display:none"');
      }

      if($(this).val().length < 7 ) {
         alert("La cédula/ID debe tener por lo menos siete carácteres.");
         return false;
     }
     return false;

  });
  </SCRIPT>
  <script type="text/javascript">

  $('#email').on('blur', function() {
      if ($(this).val()=='') {
          $('#email').addClass('has-error');
      }else{
          $('#email').removeClass('');

      }
      // Expresion regular para validar el correo
          var regex = /[\w-\.]{2,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/;
          // Se utiliza la funcion test() nativa de JavaScript
          if (regex.test($('#email').val().trim())) {
                $(this).addClass('has-success');
          } else {
              alert('La direccón de correo no es valida');
              $(this).addClass('has-error');

          }
     return false;


  });

  $('#emailemp').on('blur', function() {
      if ($(this).val()=='') {
          $('#emailemp').addClass('has-error');
      }else{
          $('#emailemp').removeClass('');

      }
      // Expresion regular para validar el correo
          var regex = /[\w-\.]{2,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/;
          // Se utiliza la funcion test() nativa de JavaScript
          if (regex.test($('#emailemp').val().trim())) {
                $(this).addClass('has-success');
          } else {
              alert('La direccón de correo no es valida');
              $(this).addClass('has-error');

          }
     return false;


  });

  </script>

  <script type="text/javascript">
  function validar(e) { // 1
  tecla = (document.all) ? e.keyCode : e.which; // 2
  if (tecla==8) return true; // 3
  patron =/[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]/; // 4
  te = String.fromCharCode(tecla); // 5
  return patron.test(te); // 6
  }
  </script>
</html>
