<!DOCTYPE html>
<html>
  <head>
    <link rel="icon" href="../images/headermini.png" type="image/png" sizes="16x16">
    <title>Consulta estados.</title>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <!--tabla-->
    <link rel="stylesheet" href="dist/bootstrap.min.css" type="text/css" media="all">
    <link href="dist/jquery.bootgrid.css" rel="stylesheet" />
    <script src="dist/jquery-1.11.1.min.js"></script>
    <script src="dist/bootstrap.min.js"></script>
    <script src="dist/jquery.bootgrid.min.js"></script>

    <!--sidebar-->
    <link rel="stylesheet" href="vendor/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="vendor/bootstrap/bootstrap.min.js">
    <link rel="stylesheet" href="vendor/jquery/jquery-3.2.1.min.js">
    <link rel="stylesheet" href="theme/styles.css">
    <!--<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">-->
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
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
        <!-- Page Content -->
        <div id="page-content-wrapper">
          <div class="container" style="margin-top:50px">

          <!-------->
          <div id="content">
              <ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
                  <li class="active"><a href="#red" data-toggle="tab">Pendientes.</a></li>
                  <li><a href="#orange" data-toggle="tab">Procesados.</a></li>
                  <li><a href="#yellow" data-toggle="tab">Entregados.</a></li>
              </ul>
              <div id="my-tab-content" class="tab-content">
                  <div class="tab-pane active" id="red">

                    <!--contenido 1-->
                    <div class="container">
                          <div class="">
                            <h1>Pendientes</h1>
                            <div class="col-lg-12">

                            <div id="message" name="message" class="alert alert-success" hidden>Pedido enviado a "Procesados" exitosamente.</div>

                          <div class="table-responsive col-sm-12" >
                        <table id="pendientes_grid" class="table table-condensed table-hover table-striped" width="60%" cellspacing="0" data-toggle="bootgrid">
                          <thead>
                            <tr>
                                        <th data-column-id="idPedido" data-identifier="true">Nº</th>
                                        <th data-column-id="cliente">Cliente</th>
                                        <th data-column-id="fechaped">Fecha</th>
                                        <th data-column-id="EstadoPed">Estado</th>
                              <th data-column-id="commands" data-formatter="commands" data-sortable="false">Acciones</th>
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
                            <h1>Procesados.</h1>
                            <div class="col-lg-12">
                              <div id="message2" name="message2" class="alert alert-success" hidden>Pedido enviado a "Entregados" exitosamente.</div>
                          <div class="table-responsive col-sm-12">
                        <table id="procesados_grid" class="table table-condensed table-hover table-striped" width="60%" cellspacing="0" data-toggle="bootgrid">
                          <thead>
                            <tr>
                              <th data-column-id="idPedido" data-identifier="true">Nº</th>
                              <th data-column-id="cliente">Cliente</th>
                              <th data-column-id="fechaped">Fecha</th>
                              <th data-column-id="EstadoPed">Estado</th>
                              <th data-column-id="commands" data-formatter="commands" data-sortable="false">Acciones</th>
                            </tr>
                          </thead>
                        </table>
                      </div>
                        </div>
                          </div>
                        </div>
                        <!-- cierre de segundo contenido-->
                  </div>
                  <div class="tab-pane" id="yellow">
                    <!--contenido 3-->
                    <div class="container">
                          <div class="">
                            <h1>Entregados.</h1>
                            <div class="col-lg-12">
                          <div class="table-responsive col-sm-12">
                        <table id="entregados_grid" class="table table-condensed table-hover table-striped" width="60%" cellspacing="0" data-toggle="bootgrid">
                          <thead>
                            <tr>
                              <th data-column-id="idPedido" data-identifier="true">Nº</th>
                              <th data-column-id="cliente">Cliente</th>
                              <th data-column-id="fechaped">Fecha</th>
                              <th data-column-id="EstadoPed">Estado</th>
                            </tr>
                          </thead>
                        </table>
                      </div>
                        </div>
                          </div>
                        </div>
                        <!-- cierre de tercer contenido-->
                  </div>
              </div>
          </div>
</div>

               <div class="container"  style="margin-top:50px" >
                   <div class="row">
                     <div class="col-lg-8">

        <!--modal de pendientes-->
        <div id="pendientes_model" class="modal fade" >
            <div class="modal-dialog"  style="width: 350px;">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Editar estado</h4>
                    </div>
                    <div class="modal-body">
                        <form method="post" id="frm_pendientes">
        				<input type="hidden" value="edit" name="action" id="action">
        				<input type="hidden" value="0" name="pendientes_id" id="pendientes_id">

                          <div class="form-group ">
                            <p>Cambiar estado a: Procesado</p>
                          </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" id="btn_edit" class="btn btn-primary">Aceptar</button>
                    </div>
        			</form>
                </div>
            </div>
        </div>

        <!--procesados modal -->
        <div id="procesados_model" class="modal fade" >
            <div class="modal-dialog"  style="width: 350px;">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Editar estado</h4>
                    </div>
                    <div class="modal-body">
                        <form method="post" id="frm_procesados">

                <input type="hidden" value="edit" name="action" id="action">
        				<input type="hidden" value="0" name="procesados_id" id="procesados_id">

                          <div class="form-group ">
                            <p>Cambiar estado a: Entregado. </p>
                          </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" id="btn_edit2" class="btn btn-primary">Save</button>
                    </div>
              </form>
                </div>
            </div>
        </div>
    <!--fin de procesados modal-->
      </div>
      </div>
      </div>
      </div>
    </div>
  </body>


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

  		url: "estados/response.php",
  		formatters: {
  		        "commands": function(column, row)
  		        {
  		            return "<button type=\"button\" data-toggle=\"tooltip\" title=\"Cambiar estado.\" class=\"btn btn-xs btn-default command-edit\" data-row-id=\"" + row.idPedido + "\"><span class=\"glyphicon glyphicon-edit\"></span></button> ";
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
  		$('#pendientes_model').modal('show');
  					if($(this).data("row-id") >0) {

                                  // collect the data
                                  $('#pendientes_id').val(ele.siblings(':first').html()); // in case we're changing the key


  					} else {
  					 alert('Now row selected! First select row, then click edit button');
  					}
      });
      });


  function ajaxAction(action) {
  				data = $("#frm_pendientes").serializeArray();
  				$.ajax({
  				  type: "POST",
  				  url: "estados/response.php",
  				  data: data,
  				  dataType: "json",
  				  success: function(response)
  				  {
  					$('#pendientes_model').modal('hide');
  					$("#pendientes_grid").bootgrid('reload');
            $("#procesados_grid").bootgrid('reload');
            $('#message').removeAttr("hidden");

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
//Tabla Time stat para estadisticas //
  function ajaxAction(action) {
          data = $("#frm_pendientes").serializeArray();
          $.ajax({
            type: "POST",
            url: "estados/timestat.php",
            data: data,
            dataType: "json",
            success: function(response)
            {
            $('#procesados_model').modal('hide');
            $("#procesados_grid").bootgrid('reload');
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


     $("#menu-toggle").click(function(e) {
         e.preventDefault();
         $("#wrapper").toggleClass("toggled");
     });

  </script>

  <script type="text/javascript">
  $( document ).ready(function() {
  	var grid = $("#procesados_grid").bootgrid({
  		ajax: true,
  		rowSelect: true,
  		post: function ()
  		{
  			/* To accumulate custom parameter with the request object */
  			return {
  				id: "b0df282a-0d67-40e5-8558-c9e93b7befed"
  			};
  		},

  		url: "estados/response2.php",
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
  		$('#procesados_model').modal('show');
  					if($(this).data("row-id") >0) {

                                  // collect the data
                                  $('#procesados_id').val(ele.siblings(':first').html()); // in case we're changing the key


  					} else {
  					 alert('Now row selected! First select row, then click edit button');
  					}
      });
      });


  function ajaxAction(action) {
  				data = $("#frm_procesados").serializeArray();
  				$.ajax({
  				  type: "POST",
  				  url: "estados/response2.php",
  				  data: data,
  				  dataType: "json",
  				  success: function(response)
  				  {
  					$('#procesados_model').modal('hide');
  					$("#procesados_grid").bootgrid('reload');
            $("#entregados_grid").bootgrid('reload');
            $('#message').removeAttr("hidden");

  				  }
  				});
  			}

  			$( "#command-add" ).click(function() {
  			  $('#add_model').modal('show');
  			});
  			$( "#btn_add" ).click(function() {
  			  ajaxAction('add');
  			});
  			$( "#btn_edit2" ).click(function() {
  			  ajaxAction('edit');
  			});


  });
  </script>

  <script type="text/javascript">
  $( document ).ready(function() {
    var grid = $("#entregados_grid").bootgrid({
      ajax: true,
      rowSelect: true,
      post: function ()
      {
        /* To accumulate custom parameter with the request object */
        return {
          id: "b0df282a-0d67-40e5-8558-c9e93b7befed"
        };
      },
      url: "estados/response3.php",

     });
   });
</script>

<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
});
</script>
</html>
