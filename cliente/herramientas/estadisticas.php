<?php
include('includes/phptiempo.php');
include('includes/phpproductos.php');
?>

<html>
<head>
  <title>Mi primer ejemplo en Google Charts</title>
  <!--sidebar-->
  <link rel="stylesheet" href="../vendor/bootstrap/bootstrap.min.css">
  <link rel="stylesheet" href="../vendor/bootstrap/bootstrap.min.js">
  <link rel="stylesheet" href="../vendor/jquery/jquery-3.2.1.min.js">
  <link rel="stylesheet" href="../theme/styles.css">
  <link rel="stylesheet" href="../dist/bootstrap.min.css" type="text/css" media="all">
  <link href="../dist/jquery.bootgrid.css" rel="stylesheet" />
  <script src="../dist/jquery-1.11.1.min.js"></script>
  <script src="../dist/bootstrap.min.js"></script>

  <style media="screen">
    ul.nav #menu:hover,  #menu:focus, #menu:active { color: black !important; };
    usuario:default{color: white !important};

    body { padding-top:20px; }
.panel-body .btn:not(.btn-block) { width:120px;margin-bottom:10px; }
  }
  </style>

  <script type="text/javascript" src="https://www.google.com/jsapi"></script>
      <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
</head>

<script >
<?php include('includes/jstiempo.js');?>

</script>
<script>

<?php include('includes/jsproductos.js');?>

</script>

<body>
  <div><?php include('../theme/theme.php');?></div>
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
               <li><a href="pagos.php">Pagos.</a></li>
             </ul>
           </li>

        </ul>
    </div>
    <!-- /#sidebar-wrapper -->
  <div id="page-content-wrapper">
    <div class="container" style="margin-top:70px" >
      <div class="row">
        <div class="col-lg-12">
   <div class="container col-md-6" style=" width: 500px; height: 300px;">
     <hr>
     <div class="panel panel-primary">
                     <div class="panel-heading">
                         <h3 class="panel-title">
                             <span class="glyphicon glyphicon-bookmark"></span> Tiempo de respuesta.</h3>
                     </div>
                <div class="panel-body">
                    <div class=" row container" style="text-align=center">

<div id="GraficoGoogleChart-ejemplo-1" style="width: 450px; height: 400px; padding: 1px; margin: 0px">
</div>
                    </div>
                </div>
      </div>
</div>

<hr>
<div class="container col-md-6" style=" width: 500px; height: 300px;">
  <div class="panel panel-primary">
    <div class="panel-heading">
       <h3 class="panel-title">
          <span class="glyphicon glyphicon-bookmark"></span> 10 + pedidos.</h3>
    </div>
            <div class="panel-body">
                 <div class=" row container" style="text-align=center">
                  <div id="piechart_3d" style="width: 450px; height: 400px; padding: 1px; margin: 0px">
                  </div>

                </div>
                <button type="button">Botón prueba.</button>
           </div>
        </div>
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
</html>
