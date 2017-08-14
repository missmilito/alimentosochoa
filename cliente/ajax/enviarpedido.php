<?php

	session_start();

		$session_id= session_id();
		$idcliente = $_SESSION['idusuario'];

		if (isset($_POST['comentarios'])){$comentarios=$_POST['comentarios'];}


	/* Connect To Database*/
	require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
	require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos



	date_default_timezone_set("America/Caracas");
	$date=date("Y-m-d");
	$convenio=date('Y-m-d', strtotime($date . " + ".$_POST['convenio']." day"));
		$sql=mysqli_query($con, "select id from tblestadoped where EstadoPed='Pendiente'");
		while ($row=mysqli_fetch_array($sql))
		{
		$idestado=$row["id"];
		$insert_pedido=mysqli_query($con, "INSERT INTO tblpedido (id, fechaped, fechapag, observped, idestadoped, idcliente, idestadopag) VALUES ('','$date', '$convenio', '$comentarios','$idestado', '$idcliente', '1')");
		}
			$sql2=mysqli_query($con, "SELECT MAX(id) AS id FROM tblpedido");
			while ($row=mysqli_fetch_array($sql2))
				{
				$idpedido=$row["id"];
				$sql5=mysqli_query($con, "INSERT into tbltimestat values ('', '$idpedido', NOW(), '', '')");
			}
				$sql3=mysqli_query($con, "select * from tblproducto, tmp where tblproducto.id=tmp.id_producto and tmp.session_id='".$session_id."'");
				while ($row=mysqli_fetch_array($sql3))
					{
					$idproducto=$row["id"];
					$cantidad=$row['cantidad_tmp'];
					$nombre_producto=$row['nombre_producto'];
					$precio_venta=$row['preciounit'];


					$precio_venta_f=number_format($precio_venta,2);//Formateo variables
					$precio_venta_r=str_replace(",","",$precio_venta_f);//Reemplazo las comas
					$precio_total=$precio_venta_r*$cantidad;

					$sql4=mysqli_query($con, "INSERT into tbldetallepedido VALUES ('', '$idproducto', '$cantidad', '$precio_total', '$idpedido' )");

				}








//if (isset($_GET['id']))//codigo elimina un elemento del array
//{
	//$id=intval($_GET['id']);
//$delete=mysqli_query($con, "DELETE FROM tmp WHERE id_tmp='".$id."'");
//}

?>
