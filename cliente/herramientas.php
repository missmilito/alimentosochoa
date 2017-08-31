
<?php session_start();
require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos

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

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

        <!--sidebar-->
        <link rel="stylesheet" href="vendor/bootstrap/bootstrap.min.css">
        <link rel="stylesheet" href="vendor/bootstrap/bootstrap.min.js">
        <link rel="stylesheet" href="vendor/jquery/jquery-3.2.1.min.js">
        <link rel="stylesheet" href="theme/styles2.css">
        <link rel="stylesheet" href="css/statuspedido/styles.css">

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
                 $sqlvalortotal = mysqli_query($con, "SELECT a.idpedido, b.id, sum(a.ValorTotal) as valortotal from tbldetallepedido a, tblpedido b where b.idcliente='23791664' and a.idpedido=(SELECT max(id) FROM tblpedido) and b.id= (SELECT max(id) FROM tblpedido)");
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
                <td><span class="pull-right"><?php echo $valort2;?></span></td>
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
                                   $sqlselect2=mysqli_query($con, "SELECT b.idestadoped, a.idpedido as idped, c.EstadoPed as estadoped from tbldetallepedido a, tblpedido b, tblestadoped c where b.idcliente='23791664' and a.idpedido=( SELECT max(id) FROM tblpedido where idcliente='23791664') and b.idestadoped = c.id and a.idpedido = b.id group by idped");
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
</html>
