<?php session_start();

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link rel="stylesheet" href="dist/bootstrap.min.css" type="text/css" media="all">
		<script src="dist/jquery-1.11.1.min.js"></script>
		<script src="dist/bootstrap.min.js"></script>
		<!-- css bootstrap -->
		<link href="vendor/bootstrap.min.css" rel="stylesheet">
		<link href="css/nuevopedido/styles.css" rel="stylesheet">
		<link href="theme/styles2.css" rel="stylesheet">
		<style media="screen">

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
            <div class="container" style="margin-top:50px" >
                <div class="row">
                    <div class="col-sm-12">
											<!--botón de menu toggle -->

											<!-- nuevo pedido -->
											<div class="col-md-12">
											<h2><span class="glyphicon glyphicon-edit"></span> Nuevo Pedido</h2>
											<hr>
											<form class="form-horizontal" action="ajax/enviarpedido.php" method="POST" role="form" id="datos_pedido">
												<div class="row">

												  <!--<div class="col-md-3">
												  <label for="proveedor" class="control-label">Selecciona el proveedor</label>
													 <input class="proveedor form-control" name="proveedor" id="proveedor" value="xyz" required>
												 </inputs>
											 </div>-->

													<!--<div class="col-md-3">
														<label for="transporte" class="control-label">Transporte</label>
														<input type="text" class="form-control input-sm" id="transporte" value="Terrestre" required>
													</div>-->

													<!--<div class="col-md-2">
														<label for="condiciones" class="control-label">Condiciones de pago</label>
														<input type="text" class="form-control input-sm" id="condiciones" value="Contado" required>
													</div>-->
													<div class="col-md-4">
														<label for="comentarios" class="control-label">Cliente.</label>
														<select id="cliente" name="cliente" class="form-control">

																<?php
																$conexion=mysql_connect("localhost","root","") or
																die("Problemas en la conexion");
																mysql_select_db("bd_distribuidora",$conexion) or
																die("Problemas en la selección de la base de datos");
																mysql_query ("SET NAMES 'utf8'");
																$clavebuscadah=mysql_query("select id, nomcliente from tblcliente",$conexion) or
																die("Problemas en el select:".mysql_error());
																while($row = mysql_fetch_array($clavebuscadah))
																{
																echo'<option value="'.$row['id'].'">'.$row['nomcliente'].'</option>';
																}
																?>
														</select>
													</div>

													<div class="col-md-2">
														<label for="contenido">Fecha del Credito </label>
														<select name="convenio" id="convenio" class="form-control">
															<option value="2"> 2 </option>
															<option value="5"> 5 </option>
															<option value="10"> 10 </option>
														</select>
													</div>


												</div>

											<hr>
											<div class="col-md-12">
												<div class="pull-right">
													<button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">
													 <span class="glyphicon glyphicon-plus"></span> Agregar productos
													</button>

													<button id="botonenviar"  type="submit" class="btn btn-default hidden " onclick="enviarpedido" >
														<span class="glyphicon glyphicon-send "></span> Enviar pedido
													</button>
												</form>
												</div>
											</div>
										</form>
										<br><br>
									<div id="resultados" class='col-md-12'></div><!-- Carga los datos ajax -->

										<!-- Modal -->
										<div class="modal fade bs-example-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
										  <div class="modal-dialog modal-lg" role="document">
											<div class="modal-content">
											  <div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
												<h4 class="modal-title" id="myModalLabel">Buscar productos</h4>
											  </div>
											  <div class="modal-body">
												<form class="form-horizontal">
												  <div class="form-group">
													<div class="col-sm-6">
													  <input type="text" class="form-control" id="q" placeholder="Buscar productos" onkeyup="load(1)">
													</div>
													<button type="button" class="btn btn-default" onclick="load(1)"><span class='glyphicon glyphicon-search'></span> Buscar</button>
												  </div>
												</form>
												<div id="loader" style="position: absolute;	text-align: center;	top: 55px;	width: 100%;display:none;"></div><!-- Carga gif animado -->
												<div class="outer_div" ></div><!-- Datos ajax Final -->
											  </div>
											  <div class="modal-footer">
												<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>

											  </div>
											</div>
										  </div>
										</div>

										</div>
									 </div>
								</div>


								<!--Gif de carga-->
								<script>
									$(document).ready(function(){
										load(1);
									});

									function load(page){
										var q= $("#q").val();
										var parametros={"action":"ajax","page":page,"q":q};
										$("#loader").fadeIn('slow');
										$.ajax({
											url:'ajax/productos_pedido.php',
											data: parametros,
											 beforeSend: function(objeto){
											 $('#loader').html('<img src="./images/ajax-loader.gif"> Cargando...');
										  },
											success:function(data){
												$(".outer_div").html(data).fadeIn('slow');
												$('#loader').html('');

											}
										})
									}
								</script>

								<!--Trayendo productos-->
								<script>
								function agregar (id)
									{
										var precio_venta= $('#precio_venta_'+id).val();
										var cantidad= $('#cantidad_'+id).val();
										var stock= $('#stock_'+id).val();
										//Inicia validacion
										if (parseInt(cantidad) > parseInt(stock))
										{
											alert("La cantidad del producto es mayor a nuestro stock actual");
										document.getElementById('cantidad_'+id).focus();
										return false;
										}

										//Fin validacion
									var parametros={"id":id,"precio_venta":precio_venta,"cantidad":cantidad};
									$.ajax({
							        type: "POST",
							        url: "ajax/agregar_pedido.php",
							        data: parametros,
									 beforeSend: function(objeto){
										$("#resultados").html("Mensaje: Cargando...");
									  },
							        success: function(datos){
									$("#resultados").html(datos);
									$("#botonenviar").removeClass('hidden');
									}
										});
									}

										function eliminar (id)
									{

										$.ajax({
							        type: "GET",
							        url: "ajax/agregar_pedido.php",
							        data: "id="+id,
									 beforeSend: function(objeto){
										$("#resultados").html("Mensaje: Cargando...");
									  },
							        success: function(datos){
									$("#resultados").html(datos);
									}
										});

									}

									$("#datos_pedido").submit(function(){
										var cliente = $("cliente").val();
										var convenio = $("#convenio").val();

										 var parametros={"cliente":cliente, "convenio":convenio};

										 $.ajax({
 							        type: "POST",
 							        url: "ajax/enviarpedido.php",
 							        data: parametros,

 										});
										window.open("arch/pdfcliente.php");


									});

								</script>


								</script>

											<!-- nuevo pedido form-->
                    </div>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->



		<!-- llamado de js -->
		<script src="vendor/jquery/jquery-1.11.3.min.js"></script>
		<!-- Latest compiled and minified JavaScript -->

		<script type="text/javascript">
	  $("#menu-toggle").click(function(e) {
	      e.preventDefault();
	      $("#wrapper").toggleClass("toggled");
	  });

    $(document).ready(function() {
        $('.navbar a.dropdown-toggle').on('click', function(e) {
            var $el = $(this);
            var $parent = $(this).offsetParent(".dropdown-menu");
            $(this).parent("li").toggleClass('open');

            if(!$parent.parent().hasClass('nav')) {
                $el.next().css({"top": $el[0].offsetTop, "left": $parent.outerWidth() - 4});
            }

            $('.nav li.open').not($(this).parents("li")).removeClass("open");

            return false;
        });
    });

	  </script>
		<script src="vendor/jquery/select2.min.js"></script>

		<!-- jQuery -->
    <script src="js/nuevopedido/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/bootstrap.min.js"></script>

		<!-- Bootstrap Code JavaScript -->
		<script src="js/nuevopedido/scripts.js"></script>

  </body>
  </html>
