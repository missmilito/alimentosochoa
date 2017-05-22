<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

		<!-- css bootstrap -->
		<link href="../../css/frontendcliente/nuevopedido/bootstrap.min.css" rel="stylesheet">

		<link href="../../css/frontendcliente/nuevopedido/styles.css" rel="stylesheet">

		<!-- cdn bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

	</head>

	<body>
		<!--inicio navbar logged in -->

				<div class="navbar navbar-default navbar-fixed-top   "  role="navigation">
					<!--boton toggle menu -->
					<ul class="nav navbar-nav navbar-left">
						<li><a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Menú</a></li>
					</ul>
          <!--comienzo del navbar-->
										<div class="container">

				                <div class="navbar-header">

				                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				                        <span class="sr-only">Toggle navigation</span>
				                        <span class="icon-bar"></span>
				                        <span class="icon-bar"></span>
				                        <span class="icon-bar"></span>
				                    </button>

				                </div>
				                <div class="collapse navbar-collapse">

				                    <ul class="nav navbar-nav navbar-right ">
				                        <li class="active"><a href="#">Home</a></li>
				                        <li><a href="https://github.com/fontenele/bootstrap-navbar-dropdowns" target="_blank">GitHub</a></li>
				                        <li>
				                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Menu 2 <b class="caret"></b></a>

				                            <ul class="dropdown-menu">
				                                <li><a href="#">Action [Menu 2.1]</a></li>
				                                <li><a href="#">Another action [Menu 2.1]</a></li>
				                                <li><a href="#">Something else here [Menu 2.1]</a></li>
				                                <li class="divider"></li>
				                                <li><a href="#">Separated link [Menu 2.1]</a></li>
				                                <li class="divider"></li>
				                                <li><a href="#">One more separated link [Menu 2.1]</a></li>
				                                <li>
				                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown [Menu 2.1] <b class="caret"></b></a>

				                                    <ul class="dropdown-menu">
				                                        <li><a href="#">Action [Menu 2.2]</a></li>
				                                        <li><a href="#">Another action [Menu 2.2]</a></li>
				                                        <li><a href="#">Something else here [Menu 2.2]</a></li>
				                                        <li class="divider"></li>
				                                        <li><a href="#">Separated link [Menu 2.2]</a></li>
				                                        <li class="divider"></li>
				                                        <li>
				                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown [Menu 2.2] <b class="caret"></b></a>

				                                            <ul class="dropdown-menu ">
				                                                <li>
				                                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown [Menu 2.3] <b class="caret"></b></a>

				                                                    <ul class="dropdown-menu">
				                                                        <li><a href="#">Action [Menu 2.4]</a></li>
				                                                        <li><a href="#">Another action [Menu 2.4]</a></li>
				                                                        <li><a href="#">Something else here [Menu 2.4]</a></li>
				                                                        <li class="divider"></li>
				                                                        <li><a href="#">Separated link [Menu 2.4]</a></li>
				                                                        <li class="divider"></li>
				                                                        <li><a href="#">One more separated link [Menu 2.4]</a></li>
				                                                    </ul>
				                                                </li>
				                                            </ul>
				                                        </li>
				                                    </ul>
				                                </li>
				                            </ul>
				                        </li>
				                    </ul>
				                </div><!--/.nav-collapse -->
				            </div>
				        </div>



				<!--fin navbar logged in -->
	</br>
</br>

  <div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">

            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="#">
                        Start Bootstrap
                    </a>
                </li>
                <li>
                    <a href="#">Dashboard</a>
                </li>
                <li>
                    <a href="#">Shortcuts</a>
                </li>
                <li>
                    <a href="#">Overview</a>
                </li>
                <li>
                    <a href="#">Events</a>
                </li>
                <li>
                    <a href="#">About</a>
                </li>
                <li>
                    <a href="#">Services</a>
                </li>
                <li>
                    <a href="#">Contact</a>
                </li>
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
											<!--botón de menu toggle -->

												<!-- nuevo pedido form -->

												<div class="page-content inset">
											           <div class="row">
											               <div class="col-sm-3 col-md-6">
											 <!--container de la seccion de pedido-->
											 <div class="container">
											 	<div class="row-fluid">

											 	<div class="col-md-12">
											 	<h2><span class="glyphicon glyphicon-edit"></span> Nuevo Pedido</h2>
											 	<hr>
											 	<form class="form-horizontal" role="form" id="datos_pedido">
											 		<div class="row">

											 			<div class="col-md-3">
											 			<label for="proveedor" class="control-label">Selecciona el proveedor</label>
											 			 <select class="proveedor form-control" name="proveedor" id="proveedor" required>
											 			</select>
											 			</div>

											 			<div class="col-md-3">
											 				<label for="transporte" class="control-label">Transporte</label>
											 				<input type="text" class="form-control input-sm" id="transporte" value="Terrestre" required>
											 			</div>

											 			<div class="col-md-2">
											 				<label for="condiciones" class="control-label">Condiciones de pago</label>
											 				<input type="text" class="form-control input-sm" id="condiciones" value="Contado" required>
											 			</div>

											 			<div class="col-md-4">
											 				<label for="comentarios" class="control-label">Comentarios</label>
											 				<input type="text" class="form-control input-sm" id="comentarios" placeholder="Comentarios o instruciones especiales">
											 			</div>

											 		</div>


											 		<hr>
											 		<div class="col-md-12">
											 			<div class="pull-right">
											 				<button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">
											 				 <span class="glyphicon glyphicon-plus"></span> Agregar productos
											 				</button>
											 				<button type="submit" class="btn btn-default">
											 					<span class="glyphicon glyphicon-print"></span> Imprimir
											 				</button>
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

												<!-- nuevo pedido form-->
                    </div>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->



		<!-- llamado de js -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<!-- Latest compiled and minified JavaScript -->

		<script type="text/javascript" src="js/VentanaCentrada.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/js/select2.min.js"></script>

		<!-- jQuery -->
    <script src="../../js/frontendcliente/nuevopedido/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../../js/frontendcliente/nuevopedido/bootstrap.min.js"></script>

		<!-- Bootstrap Code JavaScript -->
		<script src="../../js/frontendcliente/nuevopedido/scripts.js"></script>

  </body>
  </html>
