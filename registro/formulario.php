
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Formulario de Registro</title>
<link href="../cssregusuario/style.css" rel="stylesheet" type="text/css">
<link href="../vendor/bootstrap/bootstrap.min.css" rel="stylesheet" type="text/css">
<script src="../vendor/bootstrap/bootstrap.min.js" type="text/javascript"></script>
<script src="../vendor/js/prototype-1.7.3.js" type="text/javascript"></script>
<script src="../vendor/jquery/jquery-3.2.1.min.js" type="text/javascript"></script>


</script>
<!-- cdn bootstrap -->
<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">-->

</head>

<body>


  <div class="container">
      <form onsubmit="this.reset()" action="registro.php" method="POST">
          <h2><em>Formulario de Registro</em></h2>
          <?php if (!empty($_GET['mensaje'])){ ?>
              <div class="alert alert-success alert-dismissable">
                  <button type="button" class="close" data-dismiss="alert">&times;</button>
                  Se guardo la informacion
              </div>
          <?php } ?>
          <hr>
          <h1 class="well">Información del usuario</h1>
          <div class="col-lg-12 well">
              <div class="row">


                  <div class="col-sm-6 form-group" id="div_idcliente">
                      <label>ID / Cédula de identidad</label>

                      <input type="number" name="idcliente" id="idcliente" placeholder="Este será el id del usuario" onblur="" class="form-control" pattern="[0-9]{6,10}" required>
                      <div id="msgUsuario"></div>
                      <span id="span_idcliente" style="display: none;">Campo no puede estar vacio</span>


                  </div>
                  <div class="col-sm-6 form-group">
                      <label>Contraseña</label>
                      <input type="password" name="password" placeholder="Ingrese la contraseña del usuario" class="form-control" required>
                  </div>
                  <div class="form-group">
                      <!-- <label for="contenido">Nivel usuario</label> -->
                      <input type="text" class="form-control" name="nivelusuario" value="2" style="display: none">
                  </div>
              </div>
          </div>
          <div class="row"></div>
          <h1 class="well">Informacion del Usuario a registrar</h1>
          <div class="col-lg-12 well">
              <div class="row">
                  <div class="col-sm-12">
                      <div class="row">
                          <div class="col-sm-6 form-group">
                              <label>Nombre</label>
                              <input type="text" name="nombre" placeholder="Ingrese su primer nombre" class="form-control" required>
                          </div>
                          <div class="col-sm-6 form-group">
                              <label>Apellido</label>
                              <input type="text" name="apellido" placeholder="Ingrese su primer apellido" class="form-control" required>
                          </div>
                      </div>
                      <div class="form-group">
                          <label>Email/Correo</label>
                          <textarea name="emailcliente" placeholder="Ingrese e-mail personal" class="form-control" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" required></textarea>
                      </div>
                      <div class="row">
                          <div class="col-sm-4 form-group">
                              <label>Teléfono</label>
                              <input type="number" name="telefonocliente" placeholder="Ingrese su número teléfonico" class="form-control" required>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <div class="row"></div>
          <h1 class="well">Información de la Empresa</h1>
          <div class="col-lg-12 well">
              <div class="row">

                  <div class="col-sm-12">
                      <div class="row">

                          <div class="col-sm-4 form-group">
                              <label>RIF</label>
                              <input type="text" name="rifemp" placeholder="De no poseer, ingrese ci del dueño" class="form-control" required>
                          </div>

                          <div class="col-sm-8 form-group">
                              <label>Nombre de la empresa</label>
                              <input type="text" name="nomemp" placeholder="Ingrese nombre de la empresa" class="form-control" required>
                          </div>

                      </div>
                      <div class="row">

                          <div class="col-sm-4 form-group">
                              <label>Teléfono</label>
                              <input type="text" name="tlfemp" placeholder="Ingrese su número teléfonico" class="form-control" pattern="[0-9]{1,10}" required>
                          </div>
                          <div class="col-sm-8 form-group">
                              <label>Email/Correo</label>
                              <input type="text" name="emailemp" placeholder="Ingrese e-mail personal" class="form-control" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" required>
                          </div>
                      </div>

                      <div class="col-sm-12 form-group">
                          <label>Dirección</label>
                          <textarea type="text" name="diremp" placeholder="Direccion de la empresa" rows="3" class="form-control" required></textarea>
                      </div>
                  </div>
              </div>
          </div>
          <div class="col-lg-12 well">
              <div class="form-group">
                  <button type="reset" name="reset" class="btn btn-lg btn-danger pull-left"><i class="fa fa-times"></i> Cancelar</button>
                  <button type="submit" name="submit" class="btn btn-lg btn-info pull-right"><i class="fa fa-save"></i> Guardar</button>
              </div>
          </div>


      </form>
  </div> <!--cierre del container-->


  <script>
      function verificar(){
          return null;
      }
      var x = document.getElementById("idcliente");
      x.addEventListener("focus", myFocusFunction, true);
      x.addEventListener("blur", myBlurFunction, true);

      function myFocusFunction() {
          //   document.getElementById("idcliente").style.backgroundColor = "yellow";
          //alert('focus');
      }

      function myBlurFunction() {
          // document.getElementById("idcliente").style.backgroundColor = "blue";

      }
  </script>
  <script>
      $('#idcliente').on('focus', function() {
          $('#div_idcliente').removeClass('has-error');
          $('#div_idcliente').addClass('col-sm-6 form-group');
          $('#span_idcliente').hide();

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
      });


  </script>



</body>
</html>
