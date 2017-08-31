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
                <div class="titulo"><p>CONSULTA DE PRODUCTOS.</p></div>
                <div class="col-lg-12">

        			<div class="well clear-fix pull-right"><button type="button" class="btn btn-xs btn-primary btnadd" id="command-add" data-row-id="0">
        			<div class="nuevop"><span class="glyphicon glyphicon-plus "></span>Nuevo Producto</div></button></div>

        			<div class="table-responsive col-sm-12">
        		<table id="employee_grid" class="table table-condensed table-hover table-striped" width="60%" cellspacing="0" data-toggle="bootgrid">
        			<thead>
        				<tr>
                            <th data-column-id="id">Nº</th>
                            <th data-column-id="codigo">Código</th>
                            <th data-column-id="nomprod" >Producto</th>
                            <th data-column-id="descprod">Descripción</th>
                            <th data-column-id="preciounit">Precio</th>
                            <th data-column-id="capacidad">Capacidad (Diaria)</th>
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
                    <div class="modal-header ">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Agregar producto</h4>
                    </div>
                    <div class="modal-body col-md-12" >
                        <form method="post" id="frm_add">
        				<input type="hidden" value="add" name="action" id="action">
                        <div class="form-group col-md-4">
                          <label for="nomproducto" class="control-label">Código:</label>
                          <input type="text" class="form-control" placeholder="código del producto" id="codigo" name="codigo"/>
                        </div>
                          <div class="form-group col-md-4">
                            <label for="nomproducto" class="control-label">Nombre:</label>
                            <input type="text" class="form-control" placeholder="Nombre del producto" id="nombre" name="nombre"/>
                          </div>
                          <div class="form-group col-md-4">
                           <label for="precio" class="control-label">Precio:</label>
                           <input type="number" class="form-control" Placeholder="Sólo números sin , ni ." id="precio" name="precio">
                         </div>
                         <div class="form-group col-md-8">
                           <label for="descprod" class="control-label">Descripción:</label>
                           <input type="text" class="form-control" placeholder="Descripción del producto" id="descprod" name="descprod"/>
                         </div>
                         <div class="form-group col-md-4">
                           <label for="descprod" class="control-label">Capacidad:</label>
                           <input type="number" class="form-control" placeholder="cantidad diaria" id="capacidad" name="capacidad"/>
                         </div>
                          <div class="form-group col-md-6">
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

                          <div class="form-group col-md-6">
                            <label for="proveedor" class="control-label">Proveedor:</label>
                            <select id="proveedor" name="proveedor" class="form-control">

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

                        <button type="button" id="btn_add" class="btn btn-primary">Guardar.</button>
                    </div>
        			</form>
                </div>
            </div>
        </div>
        <div id="edit_model" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content col-sm-12">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Editar Producto</h4>
                    </div>
                    <div class="modal-body col-sm-12">
                        <form method="post" id="frm_edit">
        				<input type="hidden" value="edit" name="action" id="action">
                <input type="text" class="hidden" id="edit_id" name="edit_id"/>
                <div class="form-group col-sm-2">
                  <label for="nomproducto" class="control-label">Código:</label>
                  <input type="text" class="form-control" id="edit_cod" name="edit_cod"/>
                </div>
                <div class="form-group col-sm-6">
                  <label for="nomproducto" class="control-label">Nombre:</label>
                  <input type="text" class="form-control" id="edit_nombre" name="edit_nombre"/>
                </div>
                <div class="form-group col-sm-4">
                 <label for="precio" class="control-label">Precio:</label>
                 <input type="text" class="form-control" id="edit_precio" name="edit_precio"/>
               </div>
                <div class="form-group col-sm-8">
                  <label for="descprod" class="control-label">Descripción:</label>
                  <input type="text" class="form-control" id="edit_desc" name="edit_desc"/>
                </div>
                <div class="form-group col-sm-4">
                  <label for="subcategoria" class="control-label">SubCategoria:</label>
                  <select id="edit_subcat" name="edit_subcat" class="form-control">
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
                <div class="form-group col-sm-6">
                  <label for="proveedor" class="control-label">Proveedor:</label>
                  <select id="edit_proveedor" name="edit_proveedor" class="form-control">
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
                <div class="form-group col-sm-6">
                  <label for="Status" class="control-label">Estados:</label>
                  <select id="edit_status" name="edit_status" class="form-control">
                      <?php
                      $conexion=mysql_connect("localhost","root","") or
                      die("Problemas en la conexion");
                      mysql_select_db("bd_distribuidora",$conexion) or
                      die("Problemas en la selección de la base de datos");
                      mysql_query ("SET NAMES 'utf8'");
                      $clavebuscadah=mysql_query("select id, nomstatus from tblstatus",$conexion) or
                      die("Problemas en el select:".mysql_error());
                      while($row = mysql_fetch_array($clavebuscadah))
                      {
                      echo'<option value="'.$row['id'].'">'.$row['nomstatus'].'</option>';
                      }
                      ?>
                  </select>
                </div>

                <div class="form-group col-sm-6">
                 <label for="precio" class="control-label">Capacidad:</label>
                 <input type="text" class="form-control" id="edit_capacidad" name="edit_capacidad"/>
               </div>
               <div class="form-group col-sm-4">
                 <div class="form-group row">
						<label class="control-label col-sm-12 " for="frm-test-elm-120-1">Actualizar stock:</label>
            <div class="">
              <span class="button-checkbox">
                  <button type="button" id="thebutton" class="btn col-sm-12" data-color="primary"><span class="ui-button-text">Mañana</span></button>
                  <input type="checkbox" class="hidden"/>
                  <input type="text" class="hidden" name="actualizarcap" id="actualizarcap" value=""/>
             </span>
           </div>
					      </div>
               </div>
                    </div>
                    <div class="modal-footer col-sm-12">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar.</button>
                        <button type="button" id="btn_edit" class="btn btn-primary">Editar.</button>
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
     $("#menu-toggle").click(function(e) {
         e.preventDefault();
         $("#wrapper").toggleClass("toggled");
     });
  </script>
  <!--tabla-->
  <script type="text/javascript" src="productos/tablaproductos.js"></script>
  <!--checkbox-->
  <script type="text/javascript" src="productos/checkbox.js"></script>
</html>
