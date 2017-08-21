<!DOCTYPE html>
<html>
  <head>

    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
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
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<style media="screen">
.titulo {
  margin-top: 20px;
          font-size: 30px;
          text-align: center;
          font-family: sans-serif;
          font-weight: bold;
        }

.nuevop {
font-size: 15px;
text-align: center;
font-family: sans-serif;
font-weight: bold;
}

</style>


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
      <!-- /#sidebar-wrapper -->
        <!-- Page Content -->
        <div id="page-content-wrapper">
               <div class="container"  style="margin-top:50px" >
                   <div class="row">
                     <div class="col-lg-8">

        <div class="container">
              <div class="">
                <div class="titulo"><p>CONSULTA DE PEDIDOS.</p></div>
                <div class="col-lg-12">

        			<div class="table-responsive col-sm-12">
        		<table id="employee_grid" class="table table-condensed table-hover table-striped" width="60%" cellspacing="0" data-toggle="bootgrid">
        			<thead>
        				<tr>
                  <th data-column-id="idPedido" data-identifier="true">Nº</th>
                      <th data-column-id="fechaped">Fecha de Pedido</th>
                      <th data-column-id="fechapag">Fecha del crédito</th>
                      <th data-column-id="nomestado">Estado del pago</th>
                      <th data-column-id="EstadoPed">Estado del Pedido</th>
                        <th data-column-id="commands" data-formatter="commands" data-sortable="false">Commands</th>

        				</tr>
        			</thead>
        		</table>
        	</div>
            </div>
              </div>
            </div>


            <div id="edit_model" class="modal fade">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Generar reporte.</h4>
                </div>
                <div class="modal-body">
                    <form  action="arch/reportepedido.php" target="_blank"  method="POST" id="frm_edit">
            <input type="hidden" value="edit" name="action" id="action">
            <h3 style="text-align: center">Generar reporte del pedido:</h3>
                      <div class="form-group" style="font-size: 15px; font-weight: bold;">
                        <label for="nomcliente" class="control-label">Nº:</label>
                        <input style="border: 0px; border-color:white"name="idreporte" id="idreporte" readonly>
                      </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <button type="submit" id="btn_edit" class="btn btn-primary">Generar</button>
                </div>
            </form>
            </div>
            </div>
            </div>

      </div>
    </div>
  </div>


</div>
  </body>


  <script type="text/javascript">
  $( document ).ready(function() {
  	var grid = $("#employee_grid").bootgrid({
  		ajax: true,
  		rowSelect: true,
  		post: function ()
  		{
  			/* To accumulate custom parameter with the request object */
  			return {
  				id: "b0df282a-0d67-40e5-8558-c9e93b7befed"
  			};
  		},

  		url: "totalpedidos/response.php",
  		formatters: {
  		        "commands": function(column, row)
  		        {
  		            return "<button type=\"button\" class=\"btn btn-xs btn-default command-edit\" data-row-id=\"" + row.idPedido + "\"><span class=\"glyphicon glyphicon-edit\"></span></button> ";
  		        }
  		    }
     }).on("loaded.rs.jquery.bootgrid", function()
  {
      /* Executes after data is loaded and rendered */
      grid.find(".command-edit").on("click", function(e)
      {
          //alert("You pressed edit on row: " + $(this).data("row-id"));
  			var ele =$(this).parent();
  			var g_id = $(this).parent().siblings(':first').html();
              var g_name = $(this).parent().siblings(':nth-of-type(2)').html();
  console.log(g_id);
                      console.log(g_name);

  		//console.log(grid.data());//
  		$('#edit_model').modal('show');
  					if($(this).data("row-id") >0) {

                                  // collect the data
                                  $('#idreporte').val(ele.siblings(':first').html()); // in case we're changing the key


  					} else {
  					 alert('Now row selected! First select row, then click edit button');
  					}

      });
  });

  function ajaxAction(action) {
  				data = $("#frm_"+action).serializeArray();
  				$.ajax({
  				  type: "POST",
  				  url: "proveedor/response.php",
  				  data: data,
  				  dataType: "json",
  				  success: function(response)
  				  {
  					$('#'+action+'_model').modal('hide');
  					$("#employee_grid").bootgrid('reload');
  				  }
  				});
  			}

  			$( "#command-add" ).click(function() {
  			  $('#add_model').modal('show');
  			});
  			$( "#btn_add" ).click(function() {
  			  ajaxAction('add');
  			});
  			$( "#btn_edit" ).click(function() {
  			  ajaxAction('edit');
  			});
  });


     $("#menu-toggle").click(function(e) {
         e.preventDefault();
         $("#wrapper").toggleClass("toggled");
     });

  </script>
</html>
