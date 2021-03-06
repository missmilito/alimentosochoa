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
                     <li><a style="color: black"  href="regcliente.php">Clientes.</a></li>
                   </ul>
                 </li>
                 <li><a href="proveedores.php">Proveedores.</a></li>
                 <li><a href="catsubcat.php">Categorias/SubCat.</a></li>
                 <li><a href="productos.php">Productos.</a></li>
                 <li><a href="nuevopedido.php">Pedido.</a></li>

               </ul>
             </li>
             <li class="dropdown">
               <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-ok 2x"> CONSULTAR</i><span class="caret"></span></a>
               <ul class="dropdown-menu2 dropdown" >
                 <li><a href="cclientes.php">Clientes.</a></li>
                 <li><a href="estados.php">Pedidos.</a></li>
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
      <!-- /#sidebar-wrapper -->
        <!-- Page Content -->
        <div id="page-content-wrapper">
          <div class="container" style="margin-top:50px">

          <!-------->
          <div id="content">
              <ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
                  <li class="active"><a href="#red" data-toggle="tab">Pendientes.</a></li>
                      <li><a href="#blue" data-toggle="tab">Vencidos.</a></li>
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
                        <table id="employee_grid" class="table table-condensed table-hover table-striped" width="60%" cellspacing="0" data-toggle="bootgrid">
                          <thead>
                            <tr>
                                        <th data-column-id="num" data-identifier="true" data-visible="false">Nº</th>
                                        <th data-column-id="idPedido">Código.</th>
                                        <th data-column-id="cliente">Cliente</th>
                                        <th data-column-id="fechanew">Fecha Pedido</th>
                                        <th data-column-id="fechapag">Fecha Pago</th>
                                        <th data-column-id="dias">Días restantes</th>
                                        <th data-column-id="EstadoPed">Estado del pedido</th>
                                        <th>

                              <th data-column-id="commands" data-formatter="commands" data-sortable="false">Marcar pago.</th>

                              <?php $date= 'fechapag';?>
                            </tr>
                          </thead>
                        </table>
                      </div>
                        </div>
                          </div>
                        </div>

                  </div>
                    <!-- cierre de primer contenido-->
                    <div class="tab-pane" id="blue">
                      <!--contenido 2-->
                      <div class="container">
                            <div class="">
                              <h1>Vencidos.</h1>
                              <div class="col-lg-12">
                            <div class="table-responsive col-sm-12">
                          <table id="vencidos_grid" class="table table-condensed table-hover table-striped" width="60%" cellspacing="0" data-toggle="bootgrid">
                            <thead>
                              <tr>
                                          <th data-column-id="num" data-identifier="true" data-visible="false">Nº</th>
                                          <th data-column-id="idPedido">Código.</th>
                                          <th data-column-id="cliente">Cliente</th>
                                          <th data-column-id="fechanew">Fecha de pedido.</th>
                                          <th data-column-id="fechapag">Fecha de crédito.</th>
                                          <th data-column-id="dias">Días de vencido.</th>
                                          <th data-column-id="EstadoPed">Estado del pedido</th>
                                          <th data-column-id="commands" data-formatter="commands" data-sortable="false">Marcar pago.</th>

                              </tr>
                            </thead>
                          </table>
                        </div>
                          </div>
                            </div>
                          </div>

                    </div>
<!--cierre de vencidos-->
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
                                        <th data-column-id="idp" data-identifier="true">Nº</th>
                                        <th data-column-id="nomcliente">Cliente</th>
                                        <th data-column-id="fechacredito">Fecha de credito</th>
                                        <th data-column-id="fechapagado">Fecha de pagados</th>
                                        <th data-column-id="dias">Días entre ambos</th>
                            </tr>
                          </thead>
                        </table>
                      </div>
                        </div>
                          </div>
                        </div>

                  </div>
              <!-- cierre de segundo contenido-->

              </div>
          </div>
</div>
</div>




               <div class="container"  style="margin-top:50px" >
                   <div class="row">
                     <div class="col-lg-8">

        <div id="add_model" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Add Employee</h4>
                    </div>
                    <div class="modal-body">
                        <form method="post" id="frm_add">
        				<input type="hidden" value="add" name="action" id="action">
                          <div class="form-group">
                            <label for="nomcliente" class="control-label">Name:</label>
                            <input type="text" class="form-control" id="name" name="name"/>
                          </div>
                          <div class="form-group">
                            <label for="apellidocli" class="control-label">Salary:</label>
                            <input type="text" class="form-control" id="salary" name="salary"/>
                          </div>
        				  <div class="form-group">
                            <label for="s" class="control-label">Age:</label>
                            <input type="text" class="form-control" id="age" name="age"/>
                          </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" id="btn_add" class="btn btn-primary">Save</button>
                    </div>
        			</form>
                </div>
            </div>
        </div>
        <div id="edit_model" class="modal fade" >
            <div class="modal-dialog"  style="width: 320px; margin-top: 50px;" >
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Editar estado</h4>
                    </div>
                    <div class="modal-body">
                      <div style="text-align: center; font-size: 15px; font-weight: bold;" class="well">Cambiar a "Pagados".</div>
                        <form method="post" id="frm_edit">
        				<input type="hidden" value="edit" name="action" id="action">
                <!--de donde toma la fecha del pedido-->  <input type="hidden" id="dateped" name="dateped" type='text'>
                <input type="hidden" name="edit_id" id="edit_id" >

                <br>
                <div class="form-group " style="font-weight: bold; font-size: 20px;">
                <label class="control-label" for="">Nº del pedido:</label>
        				<input type="text" name="edit_id2" id="edit_id2" readonly style="border: 0px; border-color: white">
              </div>

                <div class="form-group">
                  <div class="row">
                      <div class='col-sm-12'>
                          <div class="form-group">
                            <div class="" style="font-weight: bold; font-size: 15px;">Seleccionar fecha de pago:</div>
                              <div class='input-group date' id='datetimepicker1'>
                                  <input id="edit_fecha" name="edit_fecha" type='text' class="form-control" />
                                  <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                                  </span>
                              </div>
                          </div>
                      </div>

              </div>
        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                        <button type="button" id="btn_edit" class="btn btn-primary">Aceptar.</button>
                    </div>
        			</form>
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
      labels: {

              loading: "No existen pedidos pendientes por pago actualmente."
          },
  		url: "pedidos/response.php",
  		formatters: {
  		        "commands": function(column, row)
  		        {
  		            return "<button type=\"button\" class=\"btn btn-xs btn-default command-edit\" data-row-id=\"" + row.num + "\"><span class=\"glyphicon glyphicon-edit\"></span></button> ";
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
                                  $('#edit_id').val(ele.siblings(':first').html());
                                  $('#edit_id2').val(ele.siblings(':first').html()); // in case we're changing the key
                                  $('#edit_name').val(ele.siblings(':nth-of-type(6)').html());
                                  $('#edit_fecha').val(ele.siblings(':nth-of-type(4)').html());
                                  $('#dateped').val(ele.siblings(':nth-of-type(3)').html());
                                  var fechapp = document.getElementById("dateped");




                                  $(function () {

                                  var bindDatePicker = function() {

                                  $(".date").datetimepicker({
                                     format:'YYYY-MM-DD',
                                     language: 'es',
                                     minDate: fechapp.value,
                                       changeMonth: true,
                                       changeYear: true,
                                   icons: {
                                     time: "fa fa-clock-o",
                                     date: "fa fa-calendar",
                                     up: "fa fa-arrow-up",
                                     down: "fa fa-arrow-down"
                                   }
                                  }).find('input:first').on("blur",function () {
                                   // check if the date is correct. We can accept dd-mm-yyyy and yyyy-mm-dd.
                                   // update the format if it's yyyy-mm-dd
                                   var date = parseDate($(this).val());

                                   if (! isValidDate(date)) {
                                     //create date based on momentjs (we have that)
                                     date = moment().format('YYYY-MM-DD');
                                   }

                                   $(this).val(date);
                                  });
                                  }

                                  var isValidDate = function(value, format) {
                                  format = format || false;
                                  // lets parse the date to the best of our knowledge
                                  if (format) {
                                   value = parseDate(value);
                                  }

                                  var timestamp = Date.parse(value);

                                  return isNaN(timestamp) == false;
                                  }

                                  var parseDate = function(value) {
                                  var m = value.match(/^(\d{1,2})(\/|-)?(\d{1,2})(\/|-)?(\d{4})$/);
                                  if (m)
                                   value = m[5] + '-' + ("00" + m[3]).slice(-2) + '-' + ("00" + m[1]).slice(-2);

                                  return value;
                                  }

                                  bindDatePicker();


                                  });








  					} else {
  					 alert('Now row selected! First select row, then click edit button');
  					}
      }).end().find(".command-delete").on("click", function(e)
      {

  		var conf = confirm('Delete ' + $(this).data("row-id") + ' items?');
  					alert(conf);
                      if(conf){
                                  $.post('pedidos/response.php', { id: $(this).data("row-id"), action:'delete'}
                                      , function(){
                                          // when ajax returns (callback),
  										$("#employee_grid").bootgrid('reload');
                                  });
  								//$(this).parent('tr').remove();
  								//$("#employee_grid").bootgrid('remove', $(this).data("row-id"))
                      }
      });
  });

  function ajaxAction(action) {
  				data = $("#frm_"+action).serializeArray();
  				$.ajax({
  				  type: "POST",
  				  url: "pedidos/response.php",
  				  data: data,
  				  dataType: "json",
  				  success: function(response)
  				  {
  					$('#'+action+'_model').modal('hide');
  					$("#employee_grid").bootgrid('reload');
            alert('Pedido cambiado a sección de "Pagados"');
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

     $("#menu-toggle").click(function(e) {
         e.preventDefault();
         $("#wrapper").toggleClass("toggled");
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
      labels: {

              loading: "No existen pedidos pagados actualmente."
          },
      url: "pedidos/response2.php",

     });

     function ajaxAction(action) {
             data = $("#frm_"+action).serializeArray();
             $.ajax({
               type: "POST",
               url: "pedidos/logpagos.php",
               data: data,
               dataType: "json",
               success: function(response)
               {

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


  </script>
  <script type="text/javascript">
  $( document ).ready(function() {
    var grid = $("#vencidos_grid").bootgrid({
      ajax: true,
      rowSelect: true,
      post: function ()
      {
        /* To accumulate custom parameter with the request object */
        return {
          id: "b0df282a-0d67-40e5-8558-c9e93b7befed"
        };
      },
      labels: {

              loading: "No existen pedidos vencidos actualmente."
          },

      url: "pedidos/response3.php",
      formatters: {
              "commands": function(column, row)
              {
                  return "<button type=\"button\" class=\"btn btn-xs btn-default command-edit\" data-row-id=\"" + row.num + "\"><span class=\"glyphicon glyphicon-edit\"></span></button> ";
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
                                  $('#edit_id').val(ele.siblings(':first').html());
                                  $('#edit_id2').val(ele.siblings(':first').html()); // in case we're changing the key
                                  $('#edit_name').val(ele.siblings(':nth-of-type(6)').html());
                                  $('#edit_fecha').val(ele.siblings(':nth-of-type(4)').html());
                                  $('#dateped').val(ele.siblings(':nth-of-type(3)').html());
                                  var fechapp = document.getElementById("dateped");




                                  $(function () {

                                  var bindDatePicker = function() {

                                  $(".date").datetimepicker({
                                     format:'YYYY-MM-DD',
                                     language: 'es',
                                     minDate: fechapp.value,
                                       changeMonth: true,
                                       changeYear: true,
                                   icons: {
                                     time: "fa fa-clock-o",
                                     date: "fa fa-calendar",
                                     up: "fa fa-arrow-up",
                                     down: "fa fa-arrow-down"
                                   }
                                  }).find('input:first').on("blur",function () {
                                   // check if the date is correct. We can accept dd-mm-yyyy and yyyy-mm-dd.
                                   // update the format if it's yyyy-mm-dd
                                   var date = parseDate($(this).val());

                                   if (! isValidDate(date)) {
                                     //create date based on momentjs (we have that)
                                     date = moment().format('YYYY-MM-DD');
                                   }

                                   $(this).val(date);
                                  });
                                  }

                                  var isValidDate = function(value, format) {
                                  format = format || false;
                                  // lets parse the date to the best of our knowledge
                                  if (format) {
                                   value = parseDate(value);
                                  }

                                  var timestamp = Date.parse(value);

                                  return isNaN(timestamp) == false;
                                  }

                                  var parseDate = function(value) {
                                  var m = value.match(/^(\d{1,2})(\/|-)?(\d{1,2})(\/|-)?(\d{4})$/);
                                  if (m)
                                   value = m[5] + '-' + ("00" + m[3]).slice(-2) + '-' + ("00" + m[1]).slice(-2);

                                  return value;
                                  }

                                  bindDatePicker();


                                  });








            } else {
             alert('Now row selected! First select row, then click edit button');
            }
      }).end().find(".command-delete").on("click", function(e)
      {

      var conf = confirm('Delete ' + $(this).data("row-id") + ' items?');
            alert(conf);
                      if(conf){
                                  $.post('pedidos/response.php', { id: $(this).data("row-id"), action:'delete'}
                                      , function(){
                                          // when ajax returns (callback),
                      $("#employee_grid").bootgrid('reload');
                                  });
                  //$(this).parent('tr').remove();
                  //$("#employee_grid").bootgrid('remove', $(this).data("row-id"))
                      }
      });
  });

  function ajaxAction(action) {
          data = $("#frm_"+action).serializeArray();
          $.ajax({
            type: "POST",
            url: "pedidos/response.php",
            data: data,
            dataType: "json",
            success: function(response)
            {
            $('#'+action+'_model').modal('hide');
            $("#vencidos_grid").bootgrid('reload');
            alert('Pedido cambiado a sección de "Pagados"');
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
  </script>
  <script type="text/javascript">
  $( document ).ready(function() {


     function ajaxAction(action) {
             data = $("#frm_"+action).serializeArray();
             $.ajax({
               type: "POST",
               url: "pedidos/pagosauditoria.php",
               data: data,
               dataType: "json",
               success: function(response)
               {

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


  </script>

</html>
