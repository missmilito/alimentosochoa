<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <link rel="icon" href="../images/headermini.png" type="image/png" sizes="16x16">
<title>Consulta de clientes.</title>
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
                   <li><a href="regadmin.php">Admin.</a></li>
                   <li><a href="regcliente.php">Clientes.</a></li>
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


     <div id="page-content-wrapper">
         <div class="container" style="margin-top:50px" >


             <div class="row">
         <div class="col-lg-12">
     <div class="">
     </div>
           <div class="well clearfix">
             <div class="pull-right"><a href="regcliente.php"><button type="button" class="btn btn-xs btn-primary">
             <span class="glyphicon glyphicon-plus"></span>Nuevo cliente.</button></a></div></div>
             <?php if (!empty($_GET['edit'])){
              ?>
              <div id="message" name="message" class="alert alert-success">El cliente de CI:<?php echo $_SESSION['idedit'];?> ha sido editado exitosamente.</div>
             <?php } ?>

             <div class="table-responsive col-md-12 col-sm-8">
             <table id="employee_grid" class="table table-condensed table-hover table-striped" width="60%" cellspacing="0" data-toggle="bootgrid">
             <thead>
               <tr>
                                 <th data-column-id="num" data-identifier="true" data-visible="false">Nº</th>
                                 <th data-column-id="id">Id Cliente</th>
                                 <th data-column-id="nomcliente">Nombre</th>
                                 <th data-column-id="apellidocli">Apellido</th>
                                 <th data-column-id="emailcli">Email</th>
                                 <th data-column-id="telefcli">Teléfono</th>
                                 <th data-column-id="nomstatus">Status</th>
                 <th data-column-id="commands" data-formatter="commands" data-sortable="false">Commands</th>
               </tr>
             </thead>
             </table>
             </div>
     </div>


     <div id="edit_model" class="modal fade">
     <div class="modal-dialog">
     <div class="modal-content">
         <div class="modal-header">
             <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
             <h4 class="modal-title" style="font-weight: bold; text-align: center; font-size: 30px; color: #426BD1">Editar cliente.</h4>
         </div>
         <div class="modal-body">
             <form  action="editcliente.php" method="POST" id="frm_edit">
     <input type="hidden" value="edit" name="action" id="action">
     <div style="font-weight: bold; text-align: center; text-size: 15px;">Editar información del siguiente cliente:</div>
     <hr>
                 <div class="form-group" style="font-weight: bold; font-size: 15px;">
                   <label for="idcliente" class="control-label">ID/CI:</label>
                   <input name="edit_id" id="edit_id" readonly style="border: 0px; border-color: white">
               </div>

               <div class="form-group" style="font-weight: bold; font-size: 15px;">
                 <label for="nomcliente" class="control-label">Nombre:</label>
                 <input  id="edit_name" name="edit_name" readonly style="border: 0px; border-color: white"/>
               </div>
               <div class="form-group" style="font-weight: bold; font-size: 15px;">
                 <label for="apellidocli" class="control-label">Apellido</label>
                 <input id="edit_apellido" name="edit_apellido" readonly style="border: 0px; border-color: white"/>
               </div>
       <div class="form-group" style="font-weight: bold; font-size: 15px;">
                 <label for="emailcli" class="control-label">Estado:</label>
                 <input  id="edit_estado" name="edit_estado" readonly style="border: 0px; border-color: white"/>
               </div>

         </div>
         <div class="modal-footer">
             <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
             <button type="submit" id="btn_edit" class="btn btn-primary">Editar.</button>
         </div>
     </form>
     </div>
     </div>
     </div>


         </div>
             </div>
              <!-- nuevo pedido form-->
           </div>

</body>

</html>
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

		url: "cclientes/response.php",
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
                                $('#edit_id').val(ele.siblings(':first').html()); // in case we're changing the key
                                $('#edit_name').val(ele.siblings(':nth-of-type(2)').html());
                                $('#edit_apellido').val(ele.siblings(':nth-of-type(3)').html());
                                $('#edit_estado').val(ele.siblings(':nth-of-type(6)').html());


					} else {
					 alert('Now row selected! First select row, then click edit button');
					}
    }).end().find(".command-delete").on("click", function(e)
    {

		var conf = confirm('Delete ' + $(this).data("row-id") + ' items?');
					alert(conf);
                    if(conf){
                                $.post('cclientes/response.php', { id: $(this).data("row-id"), action:'delete'}
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
				  url: "cclientes/response.php",
				  data: data,
				  dataType: "json",
				  success: function(response)
				  {
					$('#'+action+'_model').modal('hide');
					$("#employee_grid").bootgrid('reload');
				  }
				});
			}

      function ajaxAction(action) {
      				data = $("#frm_edit").serializeArray();
      				$.ajax({
      				  type: "POST",
      				  url: "prueba.php",
      				  data: data,
      				  dataType: "json",
      				  success: function(response)
      				  {
      					$('#edit_model').modal('hide');
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
