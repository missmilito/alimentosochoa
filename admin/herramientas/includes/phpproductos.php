<?php // Conectamos base de datos
$conexion = mysql_connect('localhost', 'root', '')
or die('No se pudo conectar: ' . mysql_error());
mysql_select_db('bd_distribuidora') or die('No se pudo seleccionar la base de datos');

//preparamos la consulta
$sqlprod = "select b.nomprod as nom, a.idproducto, count(a.idproducto) as cantidad from tbldetallepedido a, tblproducto b where a.idproducto= b.id group by idproducto order by (cantidad) desc limit 0,10";

//ejecutamos la consulta
$resultado = mysql_query($sqlprod);

//obtenemos número filas

//cargamos array con los nombres de las métricas a visualizar

$numFilas = mysql_num_rows($resultado);

//cargamos array con los nombres de las métricas a visualizar
$datos[0] = array('nom','cantidad');

//recorremos filas
for ($i=1; $i<($numFilas+1); $i++)
{
    $datos[$i] = array(mysql_result($resultado, $i-1, "nom"),
    (int) mysql_result($resultado, $i-1, "cantidad"));
}
//recorremos filas

?>
