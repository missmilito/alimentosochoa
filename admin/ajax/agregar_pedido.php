<?php


session_start();

$session_id= session_id();

if (isset($_POST['id'])){$id=$_POST['id'];}
if (isset($_POST['cantidad'])){$cantidad=$_POST['cantidad'];}
if (isset($_POST['precio_venta'])){$precio_venta=$_POST['precio_venta'];}

	/* Connect To Database*/
	require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
	require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos

if (!empty($id) and !empty($cantidad) and !empty($precio_venta))
{
	$delete_tmp=mysqli_query($con, "DELETE from tmp WHERE id_producto='".$id."'");
$insert_tmp=mysqli_query($con, "INSERT INTO tmp (id_producto,cantidad_tmp, precio_tmp, session_id) VALUES ('$id','$cantidad','$precio_venta', '$session_id')");

}



if (isset($_GET['id']))//codigo elimina un elemento del array
{
	$id=intval($_GET['id']);
$delete=mysqli_query($con, "DELETE FROM tmp WHERE id_producto='".$id."'");
}

?>

<table class="table">
<tr>
	<th>CANT.</th>
	<th>NOMBRE</th>
	<th><span class="pull-right">PRECIO UNIT.</span></th>
	<th><span class="pull-right">PRECIO TOTAL</span></th>
	<th></th>
</tr>
<?php
	$sumador_total=0;
	$sql=mysqli_query($con, "select tmp.id_producto, tblproducto.preciounit, tblproducto.nomprod, sum(cantidad_tmp) as cantidad from tblproducto, tmp where tblproducto.id=tmp.id_producto and tmp.session_id='".$session_id."' GROUP by tmp.id_producto");
	while ($row=mysqli_fetch_array($sql))
	{
	$id_prod=$row["id_producto"];
	$cantidad=$row['cantidad'];
	$nombre_producto=$row['nomprod'];

	$precio_venta=$row['preciounit'];
	$precio_venta_f=number_format($precio_venta,2);//Formateo variables
	$precio_venta_r=str_replace(",","",$precio_venta_f);//Reemplazo las comas
	$precio_total=$precio_venta_r*$cantidad;
	$precio_total_f=number_format($precio_total,2);//Precio total formateado
	$precio_total_r=str_replace(",","",$precio_total_f);//Reemplazo las comas
	$sumador_total+=$precio_total_r;//Sumador

		?>
		<tr>
			<td><?php echo $cantidad;?></td>
			<td><?php echo $nombre_producto;?></td>
			<td><span class="pull-right"><?php echo $precio_venta_f;?></span></td>
			<td><span class="pull-right"><?php echo $precio_total_f;?></span></td>
			<td ><span class="pull-right"><a href="#" onclick="eliminar('<?php echo $id_prod ?>')"><i class="glyphicon glyphicon-trash"></i></a></span></td>
		</tr>
		<?php
	}

?>
<tr>
	<td colspan=4><span class="pull-right">TOTAL BsF</span></td>
	<td><span class="pull-right"><?php echo number_format($sumador_total,2);?></span></td>
	<td></td>
</tr>
</table>