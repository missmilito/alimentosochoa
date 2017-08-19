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
    <link rel="stylesheet" href="productos/styles.css">

    <!--sidebar-->
    <link rel="stylesheet" href="vendor/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="vendor/bootstrap/bootstrap.min.js">
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
        <!-- Page Content -->
        <div id="page-content-wrapper">
               <div class="container"  style="margin-top:50px" >
                   <div class="row">
                     <div class="col-lg-8">

        <div class="container">
              <div class="">
                <div class="titulo"><p>CONSULTA DE PROVEEDORES.</p></div>
                <div class="col-lg-12">

        			<div class="well clear-fix pull-right"><button type="button" class="btn btn-xs btn-primary btnadd" id="command-add" data-row-id="0">
        			<div class="nuevop"><span class="glyphicon glyphicon-plus "></span>Nuevo Proveedor.</div></button></div>

        			<div class="table-responsive col-sm-12">
        		<table id="employee_grid" class="table table-condensed table-hover table-striped" width="60%" cellspacing="0" data-toggle="bootgrid">
        			<thead>
        				<tr>
                            <th data-column-id="id" data-identifier="true">ID/RIF</th>
                            <th data-column-id="nomprov">Nombre</th>
                            <th data-column-id="telefprov">Teléfono</th>
                            <th data-column-id="emailprov">E-mail</th>
                            <th data-column-id="direcprov">Dirección</th>

        					<th data-column-id="commands" data-formatter="commands" data-sortable="false">Commands</th>
        				</tr>
        			</thead>
        		</table>
        	</div>
            </div>
              </div>
            </div>

        <div id="add_model" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content" style="height: 450px;">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Agregar Proveedor.</h4>
                    </div>
                    <div class="modal-body">
                        <form method="post" id="frm_add">
        				<input type="hidden" value="add" name="action" id="action">
                          <div class="form-group col-md-6">
                            <label for="rif" class="control-label">ID/RIF:</label>
                            <input type="text" class="form-control" id="idrif" name="idrif"/>
                          </div>
                          <div class="form-group col-md-6">
                            <label for="descprod" class="control-label">Nombre:</label>
                            <input type="text" class="form-control" id="nomprov" name="nomprov"/>
                          </div>
        				          <div class="form-group col-md-12">
                            <label for="direc" class="control-label">Dirección:</label>
                            <input type="text" class="form-control" id="direc" name="direc"/>
                          </div>
                          <div class="form-group col-md-12">
                            <div class="col-md-12">
                              <label for="telefono" class="control-label">Teléfono:</label>
                            </div>
                            <div class="col-md-6">
                            <select class="form-control" id="codtelef" name="codtelef">
                              <option value="0243">0243</option>
                              <option value="0416">0416</option>
                              <option value="0426">0426</option>
                              <option value="0414">0414</option>
                              <option value="0424">0424</option>
                              <option value="0412">0412</option>
                            </select>
                          </div>
                            <div class="col-md-6">
                            <input type="text" class="form-control " id="telef" name="telef"/>
                          </div>
                            </div>
                          <div class="form-group col-md-8">
                          <label for="email" class="control-label">Email:</label>
                            <input type="text" class="form-control" id="email" name="email"/>
                          </div>
                    </div>
                    <div class="modal-footer col-md-12">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar.</button>
                        <button type="button" id="btn_add" class="btn btn-primary">Guardar.</button>
                    </div>
        			</form>
                </div>
            </div>
        </div>
        <div id="edit_model" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Edit Employee</h4>
                    </div>
                    <div class="modal-body">
                        <form method="post" id="frm_edit">
        				<input type="hidden" value="edit" name="action" id="action">
        				<input type="hidden" value="0" name="edit_id" id="edit_id">
                          <div class="form-group col-md-6">
                            <label for="nomprov" class="control-label">Nombre:</label>
                            <input type="text" class="form-control" id="edit_nomprov" name="edit_nomprov"/>
                          </div>
                          <div class="form-group col-md-6">
                            <label for="telefprov" class="control-label">Teléfono:</label>
                            <input type="text" class="form-control" id="edit_telefprov" name="edit_telefprov"/>
                          </div>
                          <div class="form-group">
                            <label for="emailprov" class="control-label">E-mail:</label>
                            <input type="text" class="form-control" id="edit_emailprov" name="edit_emailprov"/>
                          </div>
                          <div class="form-group">
                            <label for="direcprov" class="control-label">Dirección:</label>
                            <input type="text" class="form-control" id="edit_direcprov" name="edit_direcprov"/>
                          </div>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar.</button>
                        <button type="button" id="btn_edit" class="btn btn-primary">Guardar.</button>
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

  		url: "proveedor/response.php",
  		formatters: {
  		        "commands": function(column, row)
  		        {
  		            return "<button type=\"button\" class=\"btn btn-xs btn-default command-edit\" data-row-id=\"" + row.id + "\"><span class=\"glyphicon glyphicon-edit\"></span></button> ";
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
                                  $('#edit_id').val(ele.siblings(':first').html()); // in case we're changing the key
                                  $('#edit_nomprov').val(ele.siblings(':nth-of-type(2)').html());
                                  $('#edit_telefprov').val(ele.siblings(':nth-of-type(3)').html());
                                  $('#edit_emailprov').val(ele.siblings(':nth-of-type(4)').html());
                                  $('#edit_direcprov').val(ele.siblings(':nth-of-type(5)').html());

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
