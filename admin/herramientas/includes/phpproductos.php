<?php // Conectamos base de datos
if(isset($_POST['fecha1'])){$fecha1= utf8_decode($_POST['fecha1']);
}
if(isset($_POST['fecha2'])){$fecha2 = utf8_decode($_POST['fecha2']);}


$conexion = mysql_connect('localhost', 'root', '')
or die('No se pudo conectar: ' . mysql_error());
mysql_select_db('bd_distribuidora') or die('No se pudo seleccionar la base de datos');

//preparamos la consulta
if(isset($fecha1)){
$sqlprod = "select b.nomprod as nom, a.idproducto, count(a.idproducto) as cantidad from tbldetallepedido a, tblproducto b, tblpedido c where a.idproducto= b.id and a.idPedido = c.id and c.fechaped BETWEEN '$fecha1' and '$fecha2' group by idproducto order by (cantidad) desc limit 0,10";
}
else{
  $sqlprod = "select b.nomprod as nom, a.idproducto, count(a.idproducto) as cantidad from tbldetallepedido a, tblproducto b where a.idproducto= b.id group by idproducto order by (cantidad) desc limit 0,10";

}
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
