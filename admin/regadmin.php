<!DOCTYPE html>
<html>
  <head>
<link rel="icon" href="../images/headermini.png" type="image/png" sizes="16x16">
<title>Registro de empleados.</title>
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
    <link rel="stylesheet" href="theme/styles2.css">

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
                     <li><a style="color: black" href="regadmin.php">Admin.</a></li>
                     <li><a style="color: black" class="usuarios" href="regcliente.php">Clientes.</a></li>
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
                <div class="titulo"><p>CONSULTA DE ADMINISTRADORES.</p></div>
                <div class="col-lg-12">

        			<div class="well clear-fix pull-right"><button type="button" class="btn btn-xs btn-primary btnadd" id="command-add" data-row-id="0">
        			<div class="nuevop"><span class="glyphicon glyphicon-plus "></span>Nuevo usuario.</div></button></div>

        			<div class="table-responsive col-sm-8"  style="margin-left: 200px">
        		<table id="employee_grid" class="table table-condensed table-hover table-striped" width="60%" cellspacing="0" data-toggle="bootgrid">
        			<thead>
        				<tr>
                            <th data-column-id="id" data-identifier="true">ID</th>
                            <th data-column-id="puesto">Puesto/Cargo</th>
                            <th data-column-id="nomnivel">Nivel Usu.</th>
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
                <div class="modal-content col-lg-12">
                    <div class="modal-header col-lg-12">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Agregar empleado.</h4>
                    </div>
                    <div class="modal-body">
                        <form method="post" name="frm_add" id="frm_add">
        				<input type="hidden" value="add" name="action" id="action">
                          <div class="form-group col-lg-8">
                            <label for="idadmin" class="control-label">ID/Cédula:</label>
                            <input type="number" class="form-control" id="idadmin" name="idadmin" required/>
                          </div>
                          <div class="form-group col-lg-8">
                            <label for="puesto" class="control-label">Puesto/Cargo:</label>
                            <input type="text" class="form-control" id="puesto" name="puesto" required/>
                          </div>
                          <div class="form-group col-lg-8">
                            <label for="descprod" class="control-label">Contraseña:</label>
                            <input type="text" class="form-control" id="passadmin" name="passadmin" readonly="readonly" required/>
                          </div>
                          <div class="col-md-4" style="margin-top: 8px;">
                            <br>
                             <input type="button" onClick="FX_passGenerator('frm_add','passadmin')" value="Generar contraseña">
                          </div>
                          <div class="form-group col-md-6">
                            <label for="subcategoria" class="control-label">Nivel:</label>
                            <select id="nivel" name="nivel" class="form-control">

                                <?php
                                $conexion=mysql_connect("localhost","root","") or
                                die("Problemas en la conexion");
                                mysql_select_db("bd_distribuidora",$conexion) or
                                die("Problemas en la selección de la base de datos");
                                mysql_query ("SET NAMES 'utf8'");
                                $clavebuscadah=mysql_query("select * from tblnivelusuario where id IN ('1','3')",$conexion) or
                                die("Problemas en el select:".mysql_error());
                                while($row = mysql_fetch_array($clavebuscadah))
                                {
                                echo'<option value="'.$row['id'].'">'.$row['nomnivel'].'</option>';
                                }
                                ?>
                            </select>
                          </div>


                    </div>
                    <div class="modal-footer col-lg-12 col-md-12 col-sm-12">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar.</button>
                        <button type="button" id="btn_add" class="btn btn-primary">Guardar.</button>
                    </div>
        			</form>
                </div>
            </div>
        </div>
        <div id="edit_model" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content col-md-12">
                    <div class="modal-header col-md-12">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Edit Admin.</h4>
                    </div>
                    <div class="modal-body">
                        <form method="post" id="frm_edit">
        				<input type="hidden" value="edit" name="action" id="action">
                        <div class="form-group col-md-6">
                            <label for="id" class="control-label">ID/CI:</label>
                				     <input type="text" class="form-control" readonly="readonly" name="edit_id" id="edit_id">
                          </div>
                          <div class="form-group col-md-4">
                            <label for="puesto" class="control-label">Puesto/Cargo:</label>
                            <input type="text" class="form-control" id="edit_puesto" name="edit_puesto"/>
                          </div>
                          <div class="form-group col-md-6">
                            <label for="nivel" class="control-label">Nivel:</label>
                            <select id="niveladm" name="niveladm" class="form-control">

                                <?php
                                $conexion=mysql_connect("localhost","root","") or
                                die("Problemas en la conexion");
                                mysql_select_db("bd_distribuidora",$conexion) or
                                die("Problemas en la selección de la base de datos");
                                mysql_query ("SET NAMES 'utf8'");
                                $clavebuscadah=mysql_query("select * from tblnivelusuario where id IN ('1','3')",$conexion) or
                                die("Problemas en el select:".mysql_error());
                                while($row = mysql_fetch_array($clavebuscadah))
                                {
                                echo'<option value="'.$row['id'].'">'.$row['nomnivel'].'</option>';
                                }
                                ?>
                            </select>
                          </div>
                          <div class="form-group col-md-6">
                            <label for="subcategoria" class="control-label">Status:</label>
                            <select id="statusadm" name="statusadm" class="form-control">

                                <?php
                                $conexion=mysql_connect("localhost","root","") or
                                die("Problemas en la conexion");
                                mysql_select_db("bd_distribuidora",$conexion) or
                                die("Problemas en la selección de la base de datos");
                                mysql_query ("SET NAMES 'utf8'");
                                $clavebuscadah=mysql_query("select * from tblstatus",$conexion) or
                                die("Problemas en el select:".mysql_error());
                                while($row = mysql_fetch_array($clavebuscadah))
                                {
                                echo'<option value="'.$row['id'].'">'.$row['nomstatus'].'</option>';
                                }
                                ?>
                            </select>
                          </div>

                    </div>
                    <div class="modal-footer col-md-12">
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

  		url: "regadmin/response.php",
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
                                  $('#edit_puesto').val(ele.siblings(':nth-of-type(2)').html());


  					} else {
  					 alert('Now row selected! First select row, then click edit button');
  					}

      });
  });

  function ajaxAction(action) {
  				data = $("#frm_"+action).serializeArray();
  				$.ajax({
  				  type: "POST",
  				  url: "regadmin/response.php",
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
  <script type="text/javascript">
    $( document ).ready(function() {
  function ajaxAction(action) {
          data = $("#frm_"+action).serializeArray();
          $.ajax({
            type: "POST",
            url: "regadmin/response2.php",
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
  </script>

  <script type="text/javascript">
  function FX_passGenerator(form,element) {
  var thePass = "";
  var randomchar = "";
  var numberofdigits = Math.floor((Math.random() * 7) + 6);
  for (var count=1; count<=numberofdigits; count++) {
    var chargroup = Math.floor((Math.random() * 3) + 1);
    if (chargroup==1) {
      randomchar = Math.floor((Math.random() * 26) + 65);
    }
    if (chargroup==2) {
      randomchar = Math.floor((Math.random() * 10) + 48);
    }
    if (chargroup==3) {
      randomchar = Math.floor((Math.random() * 26) + 97);
    }
    thePass+=String.fromCharCode(randomchar);
  }
  eval('document.'+form+'.'+element+'.value = thePass');
  }
  </script>
</html>
