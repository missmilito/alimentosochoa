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
    <link rel="stylesheet" href="theme/styles2.css">

    <style media="screen">
      ul.nav #menu:hover,  #menu:focus, #menu:active { color: black !important; };
      .usuarios {color: black !important};
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
               <a href="estadisticas.php" class="dropdown-toggle" ><i class="glyphicon glyphicon-cog 2x"> HERRAMIENTAS</i></a>
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
                <div class="titulo"><p>AUDITORIA DE PROCESOS.</p></div>
                <div class="col-lg-12">
                  <div class="well clear-fix pull-right"><button type="button" class="btn btn-xs btn-primary btnadd">
                  <div class="nuevop"><span class="glyphicon glyphicon-plus" onClick="Auditar()"></span>Generar reporte.</div></button></div>


        			<div class="table-responsive col-sm-12">
        		<table id="employee_grid" class="table table-condensed table-hover table-striped" width="60%" cellspacing="0" data-toggle="bootgrid">
        			<thead>
        				<tr>
                            <th data-column-id="iduser" data-identifier="true">Id empleado</th>
                            <th data-column-id="seccion">Modulo</th>
                            <th data-column-id="idseccion">Id de acción</th>
                            <th data-column-id="operacion">Operación</th>
                            <th data-column-id="fecha">Fecha</th>
        			</thead>
        		</table>
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
function Auditar() {
    window.location.href = "arch/pdfauditoria.php";
}
</script>

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

  		url: "auditoria/response.php",
  		formatters: {

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
                                  $('#edit_nombre').val(ele.siblings(':nth-of-type(2)').html());
                                  $('#edit_desc').val(ele.siblings(':nth-of-type(3)').html());
                                  $('#edit_precio').val(ele.siblings(':nth-of-type(4)').html());
                                  $('#edit_status').val(ele.siblings(':nth-of-type(7)').html());



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
