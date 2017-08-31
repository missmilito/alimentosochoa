<!--Tiempo -->
<?php
// Conectamos base de datos
if(isset($_POST['fecha3'])){$fecha3= utf8_decode($_POST['fecha3']);
}
if(isset($_POST['fecha4'])){$fecha4 = utf8_decode($_POST['fecha4']);}
$conexion = mysql_connect('localhost', 'root', '')
or die('No se pudo conectar: ' . mysql_error());
mysql_select_db('bd_distribuidora') or die('No se pudo seleccionar la base de datos');

//preparamos la consulta
if(isset($_POST['fecha3'])){
  $SQLDatos = "  SELECT time_format(promedio, '%H, %i, %s') as newprom, idpedido FROM tbltimestat where promedio BETWEEN '00:01:00' and '23:59:59' and datepedido BETWEEN '2017-08-10 00:00:00' and '2017-08-10 23:59:59'";
}
else {
  $SQLDatos = "SELECT time_format(promedio, '%H, %i, %s') as newprom, idpedido FROM tbltimestat  where promedio BETWEEN '00:01:00' and '23:59:59' and YEARWEEK(dateresp) = YEARWEEK(CURDATE())";

}
//ejecutamos la consulta
$result = mysql_query($SQLDatos);

//obtenemos número filas


?>
<!--Productos-->
<?php // Conectamos base de datos
if(isset($_POST['fecha1'])){$fecha1= utf8_decode($_POST['fecha1']);
}
if(isset($_POST['fecha2'])){$fecha2 = utf8_decode($_POST['fecha2']);}


$conexion = mysql_connect('localhost', 'root', '')
or die('No se pudo conectar: ' . mysql_error());
mysql_select_db('bd_distribuidora') or die('No se pudo seleccionar la base de datos');

//preparamos la consulta
if(isset($fecha1)){
$sqlprod = "select b.nomprod as nom, a.idproducto, count(a.idproducto) as cantidad from tbldetallepedido a, tblproducto b, tblpedido c where a.idproducto= b.id and a.idPedido = c.id and c.fechaped BETWEEN '$fecha1' and '$fecha2' group by idproducto order by (cantidad) desc limit 0,10";
}
else{
  $sqlprod = "select b.nomprod as nom, a.idproducto, count(a.idproducto) as cantidad from tbldetallepedido a, tblproducto b where a.idproducto= b.id group by idproducto order by (cantidad) desc limit 0,10";

}
//ejecutamos la consulta
$resultado = mysql_query($sqlprod);

//obtenemos número filas

//cargamos array con los nombres de las métricas a visualizar

$numFilas = mysql_num_rows($resultado);

//cargamos array con los nombres de las métricas a visualizar
$datos[0] = array('nom','cantidad');

//recorremos filas
for ($i=1; $i<($numFilas+1); $i++)
{
    $datos[$i] = array(mysql_result($resultado, $i-1, "nom"),
    (int) mysql_result($resultado, $i-1, "cantidad"));
}
//recorremos filas

?>
<html>
<head>
  <title>Herramientas.</title>
  <!--sidebar-->
  <link rel="stylesheet" href="vendor/bootstrap/bootstrap.min.css">
  <link rel="stylesheet" href="vendor/bootstrap/bootstrap.min.js">
  <link rel="stylesheet" href="vendor/jquery/jquery-3.2.1.min.js">
  <link rel="stylesheet" href="theme/styles2.css">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

  <link rel="stylesheet" href="dist/bootstrap.min.css" type="text/css" media="all">
  <link href="dist/jquery.bootgrid.css" rel="stylesheet" />
  <script src="dist/jquery-1.11.1.min.js"></script>
  <script src="dist/bootstrap.min.js"></script>

  <style media="screen">
    ul.nav #menu:hover,  #menu:focus, #menu:active { color: black !important; };
    usuario:default{color: white !important};

    body { padding-top:20px; }
.panel-body .btn:not(.btn-block) { width:120px;margin-bottom:10px; }
  }
  </style>

  <script type="text/javascript" src="charts/jsapi.js"></script>
      <script type="text/javascript" src="charts/loader.js"></script>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/3.1.3/css/bootstrap-datetimepicker.min.css">
      <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.min.js"></script>
      <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/3.1.3/js/bootstrap-datetimepicker.min.js"></script>
</head>



<body>
  <div><?php include('theme/theme.php');?></div>
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
                   <li><a style="color: black" href="regadmin.php">Admin.</a></li>
                   <li><a style="color: black" class="usuarios" href="regcliente.php">Clientes.</a></li>
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
               <li><a href="pagos.php">Pagos.</a></li>
             </ul>
           </li>
           <li class="dropdown">
             <a href="estadisticas.php" class="dropdown-toggle" ><i class="glyphicon glyphicon-cog 2x"> HERRAMIENTAS</i></a>
           </li>
          </ul>
        </ul>
    </div>
    <!-- /#sidebar-wrapper -->
    <div id="page-content-wrapper" style="margin-top:90px">
        <div class="container">
            <div class="container col-lg-12 col-sm-8" >
<div class="row">

        <div class="col-xs-3" style="width: 500px;">
          <div class="panel panel-primary">
            <div class="panel-heading">
               <h3 class="panel-title">
                  <span class="glyphicon glyphicon-bookmark"></span> 10 + pedidos.</h3>
            </div>



                    <div class="panel-body">
                      <form class="" name="formulario" id="formulario" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

                      <div class="row container col-md-12">
                          <div class='col-md-6'>
                              <div class="form-group">
                                  <div class='input-group date' id='datetimepicker6'>
                                      <input name="fecha1" id="fecha1"type='text' class="form-control" />
                                      <span class="input-group-addon">
                                          <span class="glyphicon glyphicon-calendar"></span>
                                      </span>
                                  </div>
                              </div>
                          </div>
                          <div class='col-md-'>
                              <div class="form-group">
                                  <div class='input-group date' id='datetimepicker7'>
                                      <input name="fecha2" id="fecha2" type='text' class="form-control" />
                                      <span class="input-group-addon">
                                          <span class="glyphicon glyphicon-calendar"></span>
                                      </span>
                                  </div>
                              </div>
                          </div>
                          <div class="center-block" ><button name="btn-ingresar" id="btn-ingresar" class="btn center-block" style="background-color: #5cb85c; color: #FFFFFF; font-weight: bold" type="submit" >Buscar.</button></div>
                      </div>
                      </form>
                      <!--motor de busqueda-->

                         <div class=" row container col-sm-12" style="text-align=center">
                           <!--chart-->

                          <div id="piechart_3d" style="width: 450px; height: 350px">
                          </div>


                        </div>
                        <div class="well col-sm-6 pull-right" style="text-align: center">
                          <label>Generar reporte.</label>
                        <button type="button" class="btn" style="background-color: #35649a; color:#FFFFFF; font-weight: bold; " data-dismiss="modal">Generar.</button>
                      </div>
                   </div>
                </div>
            </div>

    <div class="col-xs-3" style="width: 550px;">
 <div class="panel panel-primary">
                 <div class="panel-heading">
                     <h3 class="panel-title">
                      <span class="glyphicon glyphicon-bookmark"></span> Tiempo de respuesta.</h3>
                 </div>
            <div class="panel-body">
              <form class="" name="formulario" id="formulario" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

              <div class="row container col-md-12">
                  <div class='col-md-6'>
                      <div class="form-group">
                          <div class='input-group date' id='datetimepicker8'>
                              <input name="fecha3" id="fecha3" type='text' class="form-control" />
                              <span class="input-group-addon">
                                  <span class="glyphicon glyphicon-calendar"></span>
                              </span>
                          </div>
                      </div>
                  </div>
                  <div class='col-md-'>
                      <div class="form-group">
                          <div class='input-group date' id='datetimepicker9'>
                              <input name="fecha4" id="fecha4" type='text' class="form-control" />
                              <span class="input-group-addon">
                                  <span class="glyphicon glyphicon-calendar"></span>
                              </span>
                          </div>
                      </div>
                  </div>
                  <div class="center-block" ><button name="btn-enviar" id="btn-enviar" class="btn center-block" style="background-color: #5cb85c; color: #FFFFFF; font-weight: bold" type="submit" >Buscar.</button></div>
              </div>
              </form>
              <!--motor de busqueda-->
              <div class="row container col-md-12" style="text-align=center">
                <div id="GraficoGoogleChart-ejemplo-1" >
                </div>
                </div>
                <div class="well col-sm-6 pull-right" style="text-align: center">
                  <label>Generar reporte.</label>
                <button type="button" onClick="Tiemporesp()" class="btn" style="background-color: #35649a; color:#FFFFFF; font-weight: bold; " data-dismiss="modal">Generar.</button>
              </div>
            </div>
        </div>
        </div>
  </div>

<div class="container col-md-6">
  <div class="col-md-6" style="width: 500px;">
<div class="panel panel-primary" style="width: 400px;  border-color: #3E3ED6">
               <div class="panel-heading" style="background-color: #3E3ED6; border-color: #3E3ED6">
                   <h3 class="panel-title">
                    <span class="glyphicon glyphicon-bookmark"></span> Backup de información.</h3>
               </div>
          <div class="panel-body">
            <div class="row" style="text-align=center">

              </div>
              <div class="well col-sm-8" style="text-align: center">
                <label>Generar como archivo SQL.</label>
              <button type="button" class="btn btn-primary" onClick="Backup()" data-dismiss="modal">Generar.</button>

            </div>

          </div>
      </div>
      </div>

      <div class="col-md-6" style="width: 500px;">
    <div class="panel panel-primary" style="width: 400px;">
                   <div class="panel-heading">
                       <h3 class="panel-title">
                        <span class="glyphicon glyphicon-bookmark"></span>Auditoria de procesos.</h3>
                   </div>
              <div class="panel-body">
                <div class="row" style="text-align=center">

                  </div>
                  <div class="well col-sm-8 " style="text-align: center">
                    <label>Generar Auditoria.</label>
                  <button type="button" class="btn btn-warning"  onClick="Auditar()" data-dismiss="modal">Generar.</button>

                </div>

              </div>
          </div>
          </div>
        </div>
</div>
</div>
</div>
</body>
<script type="text/javascript" src="herramientas/js/varios.js"></script>
<script type="text/javascript">
$( document ).ready(function() {

  $('#datetimepicker8')
   .datetimepicker({
       showTodayButton: true,
       format:'YYYY-MM-DD',
       language: 'es'
   });

$('#datetimepicker9')
   .datetimepicker({
       showTodayButton: true,
       format:'YYYY-MM-DD',
       language: 'es'
});
      $("#datetimepicker8").on("dp.change", function (e) {
           $('#datetimepicker9').data("DateTimePicker").setMinDate(e.date);
      });
      $("#datetimepicker9").on("dp.change", function (e) {
          $('#datetimepicker8').data("DateTimePicker").setMaxDate(e.date);
      });
  });
</script>
<script type="text/javascript">
  $( document ).ready(function() {

    $('#datetimepicker6')
     .datetimepicker({
         showTodayButton: true,
         format:'YYYY-MM-DD',
         language: 'es'
     });

 $('#datetimepicker7')
     .datetimepicker({
         showTodayButton: true,
         format:'YYYY-MM-DD',
         language: 'es'
 });
        $("#datetimepicker6").on("dp.change", function (e) {
             $('#datetimepicker7').data("DateTimePicker").setMinDate(e.date);
        });
        $("#datetimepicker7").on("dp.change", function (e) {
            $('#datetimepicker6').data("DateTimePicker").setMaxDate(e.date);
        });
    });

$("#menu-toggle").click(function(e) {
    e.preventDefault();
    $("#wrapper").toggleClass("toggled");
});
</script>
<!--llamando productos + pedidos-->
<script type="text/javascript">

      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          <?php $resultado = mysql_query($sqlprod);
           while($row = mysql_fetch_row($resultado)){?>
             [ '<?php echo $row[0]; ?>', <?php  echo $row[2]; ?>],
             <?php } ?>
        ]);

        var options = {
          title: 'Cantidad de ventas por producto.',
          is3D: true,
          width: 450,
          height: 400,
          colors: ['#1c6967', '#4091c0', '#1846d2', '#1531d4', '#0b0c3b'],

        };
        if(data.getNumberOfRows() == 0){
            $("#piechart_3d").append("<p style='color: #35649a; font-weight:bold'>No existen productos registrados durante la fecha buscada.</p>")
        }else{
          var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
          chart.draw(data, options);
        }

      }

</script>
<script type="text/javascript">
google.load("visualization", "1", {packages:["corechart"]});
 google.setOnLoadCallback(dibujarGrafico);
 function dibujarGrafico() {
   // Tabla de datos: valores y etiquetas de la gráfica
   var data = google.visualization.arrayToDataTable([
     ['Pedido', 'Tiempo'],
     <?php $result = mysql_query($SQLDatos);
      while($row = mysql_fetch_row($result)){?>
        [ '<?php echo $row[1]; ?>', [<?php  echo $row[0]; ?>]],
        <?php } ?>
   ]);
     var options = {
       title: 'Tiempo de respuesta entre pendiente - procesado',
       width: 500,
       height: 350,
       legend: 'bottom',
     }


     if(data.getNumberOfRows() == 0){
         $("#GraficoGoogleChart-ejemplo-1").append("<p style='color: #35649a; font-weight:bold'>No existen pedidos registrados para las fechas indicadas.</p>")
     }else{
       // Dibujar el gráfico
       new google.visualization.ColumnChart(
       //ColumnChart sería el tipo de gráfico a dibujar
         document.getElementById('GraficoGoogleChart-ejemplo-1')
       ).draw(data, options);
     }
   }

</script>
</html>
