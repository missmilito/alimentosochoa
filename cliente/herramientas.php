
<?php session_start();
require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos

?>
<!--Productos-->
<?php // Conectamos base de datos
if(isset($_POST['fecha1'])){$fecha1= utf8_decode($_POST['fecha1']);
}
if(isset($_POST['fecha2'])){$fecha2 = utf8_decode($_POST['fecha2']);}


$conexion = mysql_connect('localhost', 'root', '')
or die('No se pudo conectar: ' . mysql_error());
mysql_select_db('bd_distribuidora') or die('No se pudo seleccionar la base de datos');
$usucliente=$_SESSION['idusuario'];
//preparamos la consulta
if(isset($fecha1)){
$sqlprod = "select b.nomprod as nom, a.idproducto, a.cantidadProd as cantidad from tbldetallepedido a, tblproducto b, tblpedido c where a.idproducto= b.id and c.idcliente='$usucliente' and c.id=a.idPedido and c.fechaped BETWEEN '$fecha1' and '$fecha2' group by idproducto order by (cantidad) desc limit 0,10";
}
else{
  $sqlprod = "select b.nomprod as nom, a.idproducto, a.cantidadProd as cantidad from tbldetallepedido a, tblproducto b, tblpedido c where a.idproducto= b.id and c.idcliente='$usucliente' and c.id=a.idPedido group by idproducto order by (cantidad) desc limit 0,10";

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
<!DOCTYPE html>
<html>
  <head>
    <link rel="icon" href="../images/headermini.png" type="image/png" sizes="16x16">
    <meta charset="utf-8">
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <!--tabla-->
        <link rel="stylesheet" href="dist/bootstrap.min.css" type="text/css" media="all">
        <script src="dist/jquery-1.11.1.min.js"></script>
        <script src="dist/bootstrap.min.js"></script>

    <!--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>-->
        <script type="text/javascript" src="charts/jsapi.js"></script>
            <script type="text/javascript" src="charts/loader.js"></script>
        <!--sidebar-->
        <link rel="stylesheet" href="vendor/bootstrap/bootstrap.min.css">
        <link rel="stylesheet" href="vendor/bootstrap/bootstrap.min.js">
        <link rel="stylesheet" href="vendor/jquery/jquery-3.2.1.min.js">
        <link rel="stylesheet" href="theme/styles2.css">
        <link rel="stylesheet" href="css/statuspedido/styles.css">
        <!--datetimepicker-->
        <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/3.1.3/css/bootstrap-datetimepicker.min.css">-->
          <link rel="stylesheet" href="vendor/calendario/bootstrap-datetimepicker.min.css">
        <!--<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">-->
        <link rel="stylesheet" href="vendor/font-awesome/css/font-awesome.min.css">
        <!--<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.min.js"></script>-->
        <script type="text/javascript" src="vendor/calendario/moment-with-locales.min.js"></script>
        <!--<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/3.1.3/js/bootstrap-datetimepicker.min.js"></script>-->
        <script type="text/javascript" src="vendor/calendario/bootstrap-datetimepicker.min.js"></script>

        <style media="screen">
          ul.nav #menu:hover,  #menu:focus, #menu:active { color: black !important; };
          usuario:default{color: white !important};
        }
        </style>
  </head>
  <body>
    <div><?php include('theme/theme.php') ?></div>
		<div id="wrapper">

		  <!-- Sidebar -->
		  <div id="sidebar-wrapper">

		      <ul class="sidebar-nav" style="">

		          <li class="sidebar-brand" >
		              <a style="text-align: center">
		                  MODULOS
		              </a>
		          </li>

		         <li class="dropdown">
		           <a class="dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-pencil 2x"> REGISTRO</i><span class="caret"></span></a>
		           <ul class="dropdown-menu2 dropdown" >
		             <li><a href="nuevopedido.php">Nuevo Pedido.</a></li>
		           </ul>
		         </li>
		         <li class="dropdown">
		           <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-ok 2x"> CONSULTAR</i><span class="caret"></span></a>
		           <ul class="dropdown-menu2 dropdown" >
		             <li><a href="todospedidos.php">Pedidos.</a></li>
		             <li><a href="pagos.php">Pagos.</a></li>
		           </ul>
		         </li>
             <li class="dropdown">
               <a href="herramientas.php" class="dropdown-toggle" ><i class="glyphicon glyphicon-cog 2x"> HERRAMIENTAS</i></a>
             </li>
		      </ul>
		  </div>
		  <!-- /#sidebar-wrapper -->
        <!-- Page Content -->
      <div id="page-content-wrapper">
          <div class="container col-md-12" style="margin-top:50px;">
              <div class="row">
                <div class="container col-md-6" style=" width: 500px; ">
                  <hr>
                  <div class="panel panel-primary" style="border-color: #327576">
                                  <div class="panel-heading" style="background-color: #327576;">
                                      <h3 class="panel-title">
                                          <span class="glyphicon glyphicon-bookmark"></span>Último pedido.</h3>
                                  </div>
                             <div class="panel-body">
                                 <div class=" row container" style="text-align=center">
                                   <div class="container" style="font-size:15px" >
                                   <table class="table table-user-information" >
                                     <tbody >
                                         <?php
                                         $usucliente=$_SESSION['idusuario'];
                                           $sqlselect=mysqli_query($con, "SELECT c.nomprod as nomprod, b.fechaped as fechaped, a.valortotal as valorunit, a.idproducto as idprod, a.idpedido as idped,a.cantidadProd as cantidad from tbldetallepedido a, tblpedido b, tblproducto c where b.idcliente='$usucliente' and a.idproducto = c.id and a.idpedido=( SELECT max(id) FROM tblpedido) group by a.idProducto ");
                                           $row=mysqli_fetch_array($sqlselect);
                                           {
                                     echo '<tr ><p style="font-size: 15px; font-family: Courier New; font-weight: bold">Nº de pedido: '.$row['idped'].'</p></tr>';

                                    echo  '<tr ><p style="font-size: 15px; font-family: Courier New; font-weight: bold">Fecha: '.$row['fechaped'].'</p></tr>';
                                   } ?>

                                   </tbody>
                                   </table>
                                 </div>
             <div id="GraficoGoogleChart-ejemplo-1" style="width: 450px; padding: 1px; margin: 0px">
               <table class="table">
               <tr>
                <th>Nombre.</th>
                <th>Cantidad</th>
                <th><span class="pull-right">Precio Unit.</span></th>
                <th></th>
               </tr>
               <?php
               $usucliente=$_SESSION['idusuario'];
                 $sqlselect=mysqli_query($con, "SELECT c.nomprod as nomprod, b.fechaped as fechaped, a.valortotal as valorunit, a.idproducto as idprod, a.idpedido as idped,a.cantidadProd as cantidad from tbldetallepedido a, tblpedido b, tblproducto c where b.idcliente='$usucliente' and a.idproducto = c.id and a.idpedido=( SELECT max(id) FROM tblpedido) group by a.idProducto ");
                 $sqlvalortotal = mysqli_query($con, "SELECT a.idpedido, b.id, sum(a.ValorTotal) as valortotal from tbldetallepedido a, tblpedido b where b.idcliente='$usucliente' and a.idpedido=(SELECT max(id) FROM tblpedido where idcliente='$usucliente') and b.id= (SELECT max(id) FROM tblpedido where idcliente='$usucliente')");
                 while ($row=mysqli_fetch_array($sqlselect))
                 {

                  $cantidad=$row['cantidad'];
                   $valorunit=$row['valorunit'];
                   $valoru=number_format($valorunit,2);//Precio total formateado
                  $valoru2=str_replace(",","",$valoru);//Reemplazo las comas
                   while ($row2=mysqli_fetch_array($sqlvalortotal))
                   {
                     $valortotal=$row2['valortotal'];
                     $valort=number_format($valortotal,2);//Precio total formateado
                    $valort2=str_replace(",","",$valort);//Reemplazo las comas
                   }

                  echo'<tr>';
                    echo'<td>'.$row["nomprod"].'</td>';
                     echo'<td>'.$row["cantidad"].'</td>';
                         echo'<td><span class="pull-right">'.$row["valorunit"].'</span></td>';
                  echo'</tr>';

                }
               ?>
               <tr>
                <td colspan=4><span class="pull-right">TOTAL BsF</span></td>

                <td><span class="pull-right" style="font-weight: bold"><?php echo $valort2; ?></span></td>

                <td></td>
               </tr>
               </table>

             </div>
                                 </div>
                             </div>
                   </div>
             </div>

             <hr>
             <div class="container col-md-6" style="width: 350px;">
               <div class="panel panel-primary" style="border-color: #507b96">
                 <div class="panel-heading" style="background-color: #507b96">
                    <h3 class="panel-title">
                       <span class="glyphicon glyphicon-bookmark"></span> Status de último pedido.</h3>
                 </div>
                         <div class="panel-body">
                              <div class=" row container">
                               <div id="" style=" padding: 1px; margin: 0px">
                                 <?php
                                 $usucliente=$_SESSION['idusuario'];
                                   $sqlselect2=mysqli_query($con, "SELECT b.idestadoped, a.idpedido as idped, c.EstadoPed as estadoped from tbldetallepedido a, tblpedido b, tblestadoped c where b.idcliente='$usucliente' and a.idpedido=( SELECT max(id) FROM tblpedido where idcliente='$usucliente') and b.idestadoped = c.id and a.idpedido = b.id group by idped");
                                   $row2=mysqli_fetch_array($sqlselect2);

                                     if($row2['idestadoped']==3)
                                     {?>
                                    <div class="col-md-3 col-sm-6">
                                           <div class="progress green">
                                               <span class="progress-left">
                                                   <span class="progress-bar"></span>
                                               </span>
                                               <span class="progress-right">
                                                   <span class="progress-bar"></span>
                                               </span>
                                               <div class="progress-value">Entregado.</div>
                                           </div>
                                       </div>
                                  <?php  }
                                     else
                                     if ($row2['idestadoped']==2) {?>
                                       <div class="col-md-3 col-sm-6">
                                              <div class="progress yellow">
                                                  <span class="progress-left">
                                                      <span class="progress-bar"></span>
                                                  </span>
                                                  <span class="progress-right">
                                                      <span class="progress-bar"></span>
                                                  </span>
                                                  <div class="progress-value">Procesado.</div>
                                              </div>
                                          </div>
                                <?php     }
                                     else
                                     if ($row2['idestadoped']==1) {?>
                                       <div class="col-md-3 col-sm-6">
                                            <div class="progress pink">
                                                <span class="progress-left">
                                                    <span class="progress-bar"></span>
                                                </span>
                                                <span class="progress-right">
                                                    <span class="progress-bar"></span>
                                                </span>
                                                <div class="progress-value">Pendiente.</div>
                                            </div>
                                        </div>

                                    <?php }

                                   ?>


                               </div>

                             </div>
                        </div>
                     </div>
                 </div>

<hr>
<div class="col-md-12" style="width: 500px;">
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




</div>
</div>
</div>

        <!-- /#page-content-wrapper -->


  </body>
<script type="text/javascript">
$("#menu-toggle").click(function(e) {
    e.preventDefault();
    $("#wrapper").toggleClass("toggled");
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
</html>
