<?php // Conectamos base de datos
$conexion = mysql_connect('localhost', 'root', '')
or die('No se pudo conectar: ' . mysql_error());
mysql_select_db('bd_distribuidora') or die('No se pudo seleccionar la base de datos');

//preparamos la consulta
$SQLDatos = "SELECT time_format(promedio, '%H, %i, %s') as newprom, idpedido FROM tbltimestat  where promedio BETWEEN '00:01:00' and '23:59:59'";

//ejecutamos la consulta
$result = mysql_query($SQLDatos);

//obtenemos número filas

?>
