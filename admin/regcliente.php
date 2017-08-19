<!DOCTYPE html>
<html>
<head>
  <link rel="icon" href="../images/headermini.png" type="image/png" sizes="16x16">
  <title>Registro de clientes.</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<style media="screen">
  ul.nav #menu:hover,  #menu:focus, #menu:active { color: black !important; };
  usuario:default{color: white !important};
}
</style>

<!--tabla-->
<link rel="stylesheet" href="dist/bootstrap.min.css" type="text/css" media="all">
<script src="dist/jquery-1.11.1.min.js"></script>
<script src="dist/bootstrap.min.js"></script>
    <link rel="stylesheet" href="vendor/jquery/jquery-3.2.1.min.js">
    <link rel="stylesheet" href="theme/styles.css">
  </head>

<body>
  <div><?php include('theme/theme.php') ?></div>
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
               <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-pencil 2x"> REGISTRO</i><span class="caret"></span></a>
               <ul class="dropdown-menu2 dropdown" >

                 <li class="dropdown">
                   <a href="#" class="dropdown-toggle" data-toggle="dropdown">Usuarios<span class="caret"></span></a>
                   <ul class="dropdown-menu" >
                     <li><a href="#">Admin.</a></li>
                     <li><a href="#">Clientes.</a></li>
                   </ul>
                 </li>
                 <li><a href="#">Proveedores.</a></li>
                 <li><a href="#">Categorias/SubCat.</a></li>
                 <li><a href="#">Productos.</a></li>
                 <li><a href="#">Pedido.</a></li>

               </ul>
             </li>
             <li class="dropdown">
               <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-ok 2x"> CONSULTAR</i><span class="caret"></span></a>
               <ul class="dropdown-menu2 dropdown" >
                 <li><a href="#">Clientes.</a></li>
                 <li><a href="#">Pedidos.</a></li>
                 <li><a href="#">Pagos.</a></li>
               </ul>
             </li>

          </ul>
      </div>
      <!-- /#sidebar-wrapper -->
      <div id="page-content-wrapper " style="">
               <div class="container-fluid" style="margin-top:50px;" >
                   <div class="row" style="float: none; margin-left:auto; margin-right: auto;">
               <div class="col-md-12">
                 <div class="container ">
                     <form name="form1" onsubmit="this.reset()" action="regcliente/registro.php" method="POST">
                         <h1 class="container" style="text-align: center"><b>Registro de clientes.</b></h1>
                         <?php if (!empty($_GET['error'])){
                          ?>
                            <div><p style="color: red; font-weight:bold; font-size: 20px; text-align: center">La cédula que usted ha proporcionado ha sido previamente registrada en nuestra base de datos.</p></div>
                         <?php } ?>
                         <hr>
                         <h1 class="well container col-md-12 col-sm-12" style="text-align: center;">Información del usuario</h1>
                         <div class=" well container col-md-12 col-sm-12 col-xs-12" style="">
                           <div class="row centered" >
                                 <div class="col-md-4 " id="div_idcliente">
                                     <label>ID / Cédula de identidad</label>
                                     <input type="number" name="idcliente" id="idcliente" placeholder="Este será el id del usuario" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" onblur="" class="form-control" pattern="[0-9]{6,10}" required nowhitespace minlength="7" maxlength="8"; >

                                     <span id="span_idcliente" style="display: none;">Campo no puede estar vacio</span>
                                 </div>
                                 <div class="col-md-4 form-group">
                                     <label>Contraseña</label>
                                     <input readonly="readonly" name="password" placeholder="Ingrese la contraseña del usuario" class="form-control" required>

                                 </div>
                                <div class="col-md-4" style="margin-top: 8px;">
                                  <br>
                                   <input type="button" onClick="FX_passGenerator('form1','password')" value="Generar contraseña">
                                </div>
                              </div>
                         </div>

                         <div class="row"></div>
                         <h1 class="well container col-md-12 col-sm-12 col-xs-12">Información Personal.</h1>
                         <div class=" container col-md-12 col-sm-12 col-xs-12 well"  >
                             <div class="row">
                                     <div class="row" >
                                         <div class="col-md-6 form-group" >
                                             <label>Nombre</label>
                                             <input type="text" id="nombre" name="nombre" placeholder="Ingrese su primer nombre" class="form-control" onkeypress="return validar(event)" required >
                                         </div>
                                         <div class="col-md-4 form-group">
                                             <label>Apellido</label>
                                             <input type="text" id="apellido" name="apellido" placeholder="Ingrese su primer apellido" onkeypress="return validar(event)" class="form-control" required>
                                         </div>
                                     </div>
                                     <div class="row">
                                     <div class="form-group col-md-6">
                                         <label>Email/Correo</label>
                                         <input type="email" id="email" name="emailcliente" placeholder="Ingrese e-mail personal" class="form-control" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" required>
                                     </div>

                                         <div class="col-md-4 form-group">
                                             <label>Teléfono</label>
                                             <input type="number" id="telefono" name="telefonocliente" placeholder="Ingrese su número teléfonico" class="form-control" required>
                                         </div>

                                 </div>
                             </div>
                         </div>
                         <div class="row"></div>
                         <h1 class=" container well col-md-12 col-sm-12" style=" text-align: center;">Información de la Empresa</h1>
                         <div class="col-md-12 col-sm-12 well" >
                             <div class="row">

                                 <div class=" col-md-12 col-sm-12">
                                     <div class="row">

                                         <div class="col-sm-6 form-group">
                                             <label>RIF</label>
                                             <input type="text" name="rifemp" placeholder="De no poseer, ingrese ci del dueño" class="form-control" required>
                                         </div>

                                         <div class="col-sm-6 form-group">
                                             <label>Nombre de la empresa</label>
                                             <input type="text" name="nomemp" placeholder="Ingrese nombre de la empresa" class="form-control" required>
                                         </div>

                                     </div>
                                     <div class="row">

                                         <div class="col-sm-4 form-group">
                                             <label>Teléfono</label>
                                             <input type="number" name="tlfemp" placeholder="Ingrese su número teléfonico" class="form-control" pattern="[0-9]{1,10}" required>
                                         </div>
                                         <div class="col-sm-8 form-group">
                                             <label>Email/Correo</label>
                                             <input type="text" name="emailemp" placeholder="Ingrese e-mail personal" class="form-control" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" required>
                                         </div>
                                     </div>

                                     <div class="col-sm-12 form-group">
                                         <label>Dirección</label>
                                         <textarea type="text" name="diremp" placeholder="Direccion de la empresa" rows="2" class="form-control" required></textarea>
                                     </div>
                                 </div>
                             </div>
                         </div>
                         <div class="container col-lg-12 col-md-12 col-sm-12 well" >
                             <div class="form-group">
                                 <button type="reset" name="reset" class="btn btn-lg btn-danger pull-left"><i class="fa fa-times"></i> Cancelar</button>
                                 <button type="submit" name="submit"  class="btn btn-lg btn-info pull-right"><i class="fa fa-save"></i> Guardar</button>
                             </div>
                         </div>


                     </form>
                 </div> <!--cierre del container-->



               </div>
                   </div>
                    <!-- nuevo pedido form-->
                 </div>
      </div>

</body>

</html>
<script type="text/javascript">
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


   $("#menu-toggle").click(function(e) {
       e.preventDefault();
       $("#wrapper").toggleClass("toggled");
   });

</script>

<script type="text/javascript">
function FX_passGenerator(form,element) {
var thePass = "";
var randomchar = "";
var numberofdigits = Math.floor((Math.random() * 7) + 6);
for (var count=1; count<=numberofdigits; count++) {
  var chargroup = Math.floor((Math.random() * 3) + 1);
  if (chargroup==1) {
    randomchar = Math.floor((Math.random() * 26) + 65);
  }
  if (chargroup==2) {
    randomchar = Math.floor((Math.random() * 10) + 48);
  }
  if (chargroup==3) {
    randomchar = Math.floor((Math.random() * 26) + 97);
  }
  thePass+=String.fromCharCode(randomchar);
}
eval('document.'+form+'.'+element+'.value = thePass');
}
</script>

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
