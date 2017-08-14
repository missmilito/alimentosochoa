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
                <div class="titulo"><p>CONSULTA DE PRODUCTOS.</p></div>
                <div class="col-lg-12">

        			<div class="well clear-fix pull-right"><button type="button" class="btn btn-xs btn-primary btnadd" id="command-add" data-row-id="0">
        			<div class="nuevop"><span class="glyphicon glyphicon-plus "></span>Nuevo Producto</div></button></div>

        			<div class="table-responsive col-sm-12">
        		<table id="employee_grid" class="table table-condensed table-hover table-striped" width="60%" cellspacing="0" data-toggle="bootgrid">
        			<thead>
        				<tr>
                            <th data-column-id="id" data-identifier="true">Nº</th>
                            <th data-column-id="nomprod">Producto</th>
                            <th data-column-id="descprod">Descripción</th>
                            <th data-column-id="preciounit">Precio</th>
                            <th data-column-id="nomsub">subcategoria</th>
                            <th data-column-id="nomprov">Proveedor</th>
                            <th data-column-id="nomstatus">Status</th>


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
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Agregar producto</h4>
                    </div>
                    <div class="modal-body">
                        <form method="post" id="frm_add">
        				<input type="hidden" value="add" name="action" id="action">
                          <div class="form-group col-lg-12">
                            <label for="nomproducto" class="control-label">Nombre:</label>
                            <input type="text" class="form-control" id="nombre" name="nombre"/>
                          </div>
                          <div class="form-group">
                            <label for="descprod" class="control-label">Descripción:</label>
                            <input type="text" class="form-control" id="descprod" name="descprod"/>
                          </div>
        				           <div class="form-group">
                            <label for="precio" class="control-label">Precio:</label>
                            <input type="text" class="form-control" id="precio" name="precio"/>
                          </div>
                          <div class="form-group">
                            <label for="subcategoria" class="control-label">SubCategoria:</label>
                            <select id="subcat" name="subcat" class="form-control">

                                <?php
                                $conexion=mysql_connect("localhost","root","") or
                                die("Problemas en la conexion");
                                mysql_select_db("bd_distribuidora",$conexion) or
                                die("Problemas en la selección de la base de datos");
                                mysql_query ("SET NAMES 'utf8'");
                                $clavebuscadah=mysql_query("select id, nomsub from tblsubcategoria",$conexion) or
                                die("Problemas en el select:".mysql_error());
                                while($row = mysql_fetch_array($clavebuscadah))
                                {
                                echo'<option value="'.$row['id'].'">'.$row['nomsub'].'</option>';
                                }
                                ?>
                            </select>
                          </div>
                          <div class="form-group">
                            <label for="proveedor" class="control-label">Proveedor:</label>
                            <select id="proveedor" name="proveedor" class="form-control">
                                <option>Seleccione una Opción...</option>
                                <?php
                                $conexion=mysql_connect("localhost","root","") or
                                die("Problemas en la conexion");
                                mysql_select_db("bd_distribuidora",$conexion) or
                                die("Problemas en la selección de la base de datos");
                                mysql_query ("SET NAMES 'utf8'");
                                $clavebuscadah=mysql_query("select id, nomprov from tblproveedores",$conexion) or
                                die("Problemas en el select:".mysql_error());
                                while($row = mysql_fetch_array($clavebuscadah))
                                {
                                echo'<option value="'.$row['id'].'">'.$row['nomprov'].'</option>';
                                }
                                ?>
                            </select>
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
                          <div class="form-group">
                            <select id="edit_name" name="edit_name" class="form-control">
                              <option value="1"> Pendiente </option>
                              <option value="2"> Procesado </option>
                              <option value="3"> Entregado </option>
                            </select>
                          </div>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" id="btn_edit" class="btn btn-primary">Save</button>
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

  		url: "productos/response.php",
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
                                  $('#edit_name').val(ele.siblings(':nth-of-type(9)').html());

  					} else {
  					 alert('Now row selected! First select row, then click edit button');
  					}
      }).end().find(".command-delete").on("click", function(e)
      {

  		var conf = confirm('Delete ' + $(this).data("row-id") + ' items?');
  					alert(conf);
                      if(conf){
                                  $.post('productos/response.php', { id: $(this).data("row-id"), action:'delete'}
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
  				  url: "productos/response.php",
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
