<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Simple Bootgrid example with add,edit and delete using PHP,MySQL and AJAX</title>
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
               <li><a href="pagos.php">Pagos.</a></li>
             </ul>
           </li>

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


             <div class="table-responsive col-md-12 col-sm-8">
             <table id="employee_grid" class="table table-condensed table-hover table-striped" width="60%" cellspacing="0" data-toggle="bootgrid">
             <thead>
               <tr>
                 <th data-column-id="id" data-identifier="true">IdCliente</th>
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
             <h4 class="modal-title">Edit Employee</h4>
         </div>
         <div class="modal-body">
             <form method="post" id="frm_edit">
     <input type="hidden" value="edit" name="action" id="action">
     <input type="hidden" value="0" name="edit_id" id="edit_id">
               <div class="form-group">
                 <label for="nomcliente" class="control-label">Name:</label>
                 <input type="text" class="form-control" id="edit_name" name="edit_name"/>
               </div>
               <div class="form-group">
                 <label for="apellidocli" class="control-label">Salary:</label>
                 <input type="text" class="form-control" id="edit_salary" name="edit_salary"/>
               </div>
       <div class="form-group">
                 <label for="emailcli" class="control-label">Age:</label>
                 <input type="text" class="form-control" id="edit_age" name="edit_age"/>
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
		            return "<button type=\"button\" class=\"btn btn-xs btn-default command-edit\" data-row-id=\"" + row.id + "\"><span class=\"glyphicon glyphicon-edit\"></span></button> " +
		                "<button type=\"button\" class=\"btn btn-xs btn-default command-delete\" data-row-id=\"" + row.id + "\"><span class=\"glyphicon glyphicon-trash\"></span></button>";
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
                                $('#edit_salary').val(ele.siblings(':nth-of-type(3)').html());
                                $('#edit_age').val(ele.siblings(':nth-of-type(4)').html());
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
