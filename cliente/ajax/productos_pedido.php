<?php

	require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
	require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos

	$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
	if($action == 'ajax'){
		// escaping, additionally removing everything that could be (html/javascript-) code
         $q = mysqli_real_escape_string($con,(strip_tags($_REQUEST['q'], ENT_QUOTES)));
		 $aColumns = array('nomprod', 'preciounit', 'idsubcat');//Columnas de busqueda
		 $sTable = "tblproducto";
		 $sWhere = "";
		if ( $_GET['q'] != "" )
		{
			$sWhere = " WHERE (status='1' and ";
			for ( $i=0 ; $i<count($aColumns) ; $i++ )
			{

				$sWhere .= $aColumns[$i]." LIKE '%".$q."%' OR ";

			}

			$sWhere = substr_replace( $sWhere, "", -3 );
			$sWhere .= ')';

			include 'pagination.php'; //include pagination file
			//pagination variables
			$page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
			$per_page = 5; //how much records you want to show
			$adjacents  = 4; //gap between pages after number of adjacents
			$offset = ($page - 1) * $per_page;
			//Count the total number of row in your table*/
			$count_query   = mysqli_query($con, "SELECT count(*) AS numrows FROM $sTable $sWhere");
			$row= mysqli_fetch_array($count_query);
			$numrows = $row['numrows'];
			$total_pages = ceil($numrows/$per_page);
			$reload = './index.php';
			//main query to fetch the data
			$sql="SELECT * FROM  $sTable $sWhere LIMIT $offset,$per_page";
			$query = mysqli_query($con, $sql);
		}
		else {
		include 'pagination.php'; //include pagination file
		//pagination variables
		$page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
		$per_page = 5; //how much records you want to show
		$adjacents  = 4; //gap between pages after number of adjacents
		$offset = ($page - 1) * $per_page;
		//Count the total number of row in your table*/
		$count_query   = mysqli_query($con, "SELECT count(*) AS numrows FROM $sTable where status='1'");
		$row= mysqli_fetch_array($count_query);
		$numrows = $row['numrows'];
		$total_pages = ceil($numrows/$per_page);
		$reload = './index.php';
		//main query to fetch the data
		$sql="SELECT * FROM  $sTable where status='1' LIMIT $offset,$per_page";
		$query = mysqli_query($con, $sql);
		//loop through fetched data
	}
		if ($numrows>0){

			?>
			<div class="table-responsive">
			  <table class="table">
				<tr  class="warning">
					<th>Código</th>
					<th>Nombre</th>
					<th>Descripción</th>
					<th><span class="pull-right">Precio</span></th>
					<th><span class="pull-right">Stock actual.</span></th>
					<th><span class="pull-right">Cantidad.</span></th>


					<th style="width: 36px;"></th>
				</tr>
				<?php
				while ($row=mysqli_fetch_array($query)){
					$id_producto=$row['id'];
					$nombre_producto=$row['nomprod'];
					$desc_producto=$row['descprod'];
					$stock=$row['capacidad'];
					$precio_venta=$row["preciounit"];
					$precio_venta=number_format($precio_venta,2);
					?>
					<tr>
						<td><?php echo $id_producto; ?></td>
						<td><?php echo $nombre_producto; ?></td>
						<td><?php echo $desc_producto; ?></td>
						<td class='col-xs-2'><div class="pull-right">
						<input type="text" disabled class="form-control" style="text-align:right; background: white; border: 0px" id="precio_venta_<?php echo $id_producto; ?>"  value="<?php echo $precio_venta;?>" >
						</div></td>
						<td class='col-xs-1'><div class="pull-right">
						<input type="text" readonly class="form-control" style="text-align:right; background: white; border: 0px" id="stock_<?php echo $id_producto; ?>"  value="<?php echo $stock;?>" >
						</div></td>
						<td class='col-xs-1'>
						<div class="pull-right">
						<input type="number" class="form-control" style="text-align:right" id="cantidad_<?php echo $id_producto; ?>"  value="1" >
						</div></td>



						<td ><span class="pull-right"><a href="#" onclick="agregar('<?php echo $id_producto ?>')"><i class="glyphicon glyphicon-plus"></i></a></span></td>
					</tr>
					<?php
				}
				?>
				<tr>
					<td colspan=5><span class="pull-right"><?php
					 echo paginate($reload, $page, $total_pages, $adjacents);
					?></span></td>
				</tr>
			  </table>
			</div>
			<?php
		}
	}
?>
