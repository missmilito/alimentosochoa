<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">

    <!--tabla-->
    <link rel="stylesheet" href="dist/bootstrap.min.css" type="text/css" media="all">
    <link href="dist/jquery.bootgrid.css" rel="stylesheet" />
    <script src="dist/jquery-1.11.1.min.js"></script>
    <script src="dist/bootstrap.min.js"></script>
    <script src="dist/jquery.bootgrid.min.js"></script>
<!--datetimepicker-->
<!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/3.1.3/css/bootstrap-datetimepicker.min.css">-->
  <link rel="stylesheet" href="vendor/calendario/bootstrap-datetimepicker.min.css">
<!--<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">-->
<link rel="stylesheet" href="vendor/font-awesome/css/font-awesome.min.css">
<!--<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.min.js"></script>-->
<script type="text/javascript" src="vendor/calendario/moment-with-locales.min.js"></script>
<!--<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/3.1.3/js/bootstrap-datetimepicker.min.js"></script>-->
<script type="text/javascript" src="vendor/calendario/bootstrap-datetimepicker.min.js"></script>
    <!--sidebar-->
    <link rel="stylesheet" href="vendor/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="vendor/bootstrap/bootstrap.min.js">
    <link rel="stylesheet" href="vendor/jquery/jquery-3.2.1.min.js">
    <link rel="stylesheet" href="theme/styles2.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">


  </head>
  <body>
    <div><?php include('theme/theme.php') ?></div>
    <!-- Sidebar -->
    <div id="wrapper">
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
           <a href="herramientas.php" class="dropdown-toggle" ><i class="glyphicon glyphicon-cog 2x"> HERRAMIENTAS</i></a>
         </li>
        </ul>
    </div>
        <!-- Page Content -->
        <div id="page-content-wrapper">
          <div class="container" style="margin-top:50px">

          <!-------->
          <div id="content">
              <ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
                  <li class="active"><a href="#red" data-toggle="tab">Pendientes.</a></li>
                  <li><a href="#orange" data-toggle="tab">Pagados.</a></li>
              </ul>
              <div id="my-tab-content" class="tab-content">
                  <div class="tab-pane active" id="red">

                    <!--contenido 1-->
                    <div class="container">
                          <div class="">
                            <h1>Pendientes</h1>
                            <div class="col-lg-12">
                          <div class="table-responsive col-sm-12">
                        <table id="pendientes_grid" class="table table-condensed table-hover table-striped" width="60%" cellspacing="0" data-toggle="bootgrid">
                          <thead>
         <tr>
           <th data-column-id="idPedido" data-identifier="true">Nº</th>
           <th data-column-id="fechanew">Fecha del pedido.</th>
           <th data-column-id="fechapag">Fecha a pagar.</th>
           <th data-column-id="dias">Le quedan:</th>
           <th  data-column-id="EstadoPed">Estado del Pedido.</th>

         </tr>
     </thead>

                        </table>
                      </div>
                        </div>
                          </div>
                        </div>
                        <!-- cierre de primer contenido-->
                  </div>
                  <div class="tab-pane" id="orange">
                    <!--contenido 2-->
                    <div class="container">
                          <div class="">
                            <h1>Pagados</h1>
                            <div class="col-lg-12">
                          <div class="table-responsive col-sm-12">
                        <table id="pagados_grid" class="table table-condensed table-hover table-striped" width="60%" cellspacing="0" data-toggle="bootgrid">
                          <thead>
                            <tr>
                                        <th data-column-id="id" data-identifier="true">Nº</th>
                                        <th data-column-id="fechacredito">Fecha de crédito.</th>
                                        <th data-column-id="fechapagado">Fecha de pago.</th>
                                        <th data-column-id="dias">Diferencia:</th>

                            </tr>
                          </thead>

                        </table>
                      </div>
                        </div>
                          </div>
                        </div>
                        <!-- cierre de segundo contenido-->
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
  <script type="text/javascript">
  $( document ).ready(function() {
    var grid = $("#pendientes_grid").bootgrid({
      ajax: true,
      rowSelect: true,
      post: function ()
      {
        /* To accumulate custom parameter with the request object */
        return {
          id: "b0df282a-0d67-40e5-8558-c9e93b7befed"
        };
      },
      url: "pagos/response.php",
     });
   });
  </script>

  <script type="text/javascript">
  $( document ).ready(function() {
    var grid = $("#pagados_grid").bootgrid({
      ajax: true,
      rowSelect: true,
      post: function ()
      {
        /* To accumulate custom parameter with the request object */
        return {
          id: "b0df282a-0d67-40e5-8558-c9e93b7befed"
        };
      },
      url: "pagos/response2.php",
     });
   });
  </script>

</html>
