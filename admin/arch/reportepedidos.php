
<?php

  require_once "mpdf/mpdf.php";
  require_once "php/conectari.php";

session_start();

  $mysqli = conectar();
  if (isset($_POST['id_reporte'])) {
    $idpedido =  mysqli_real_escape_string($mysqli, $_POST['id_reporte']);

  $sql = "SELECT d.apellidocli as apellido, d.telefcli as telefcli, d.nomcliente as nomcli, e.nomEmp as nomemp, e.diremp as diremp, e.telefemp as telefemp, a.idcliente as idcli FROM tblpedido a, tblcliente d, tblemprecli e where a.id='$idpedido' and a.idcliente = d.id and d.id = e.idcliente";

        $mpdf=new mPDF();
        //$style=file_get_contents('../css/tabla.css');
        //$mpdf->WriteHTML($style, 1);
        $mpdf->SetHTMLFooter('<div style="text-align: right">Distribuidora Alimentos Ochoa F.P. Contacto: (0243)2379363 / (0424)1392972 |Página: {PAGENO}</div>');

        $mpdf->WriteHTML('<div  style="text-align: center;"><img style="text-align: right;" src="../images/headermini.png"/></div>');
        $resultado = $mysqli -> query($sql);
        while ($fila = $resultado -> fetch_assoc()){
          $nombre=$fila['nomcli'];
          $nomemp=$fila['nomemp'];
          $apellido= $fila['apellido'];
          $tlfcli=$fila['telefcli'];
          $tlfemp=$fila['telefemp'];
          $dir=$fila['diremp'];
          $id=$fila['idcli'];
}
$mpdf->WriteHTML('<div  style="text-align: center; font-size: 20px; margin-top: 15px;">NOTA DE ENTREGA.</div>');
$sql2 = "SELECT c.nomprod as nomprod, b.cantidadProd as cant, b.ValorTotal as valor, a.fechaped as fecha FROM tblpedido a, tbldetallepedido b, tblproducto c where b.idProducto=c.id and a.id='$idpedido' and b.idPedido = a.id ";
$resultado2 = $mysqli -> query($sql2);
while ($fila = $resultado2 -> fetch_assoc()){
  $fecha=$fila['fecha'];
}
        $contenido='<div class="container" style="text-align: Justify;
         border-bottom: 10px solid #fff; color: black;">
        <div border: 1px solid; style="margin: 5px; font-family: Courier New; font-weight: bold;">
        <tr>
        <p style="font-size: 18px; width: 330px; color: #FFFFFF; background-color: #638eb6">FECHA DEL PEDIDO: '.$fecha.'</p>
        </tr>
        <p style="margin-top: 5px">Nº DE PEDIDO:'. $idpedido .'</p>
        </div>';


        $mpdf->WriteHTML($contenido,5);

        $mpdf->WriteHTML('<div style="width:500px; height:50px; font-family: Courier New; font-weight: bold; margin: 5px;  background-color:#e6d3a8; ">
          <div style="margin-left: 30px; margin-top: 5px;">Cliente:'.$nombre.' '.$apellido.'</div>
          <div style="margin-left: 30px; margin-top: 5px;">Teléfono del cliente:'.$tlfcli.'</div>
          <div style="margin-left: 30px;">Empresa:'.$nomemp.'</div>
          <div style="margin-left: 30px; margin-top: 5px;">Teléfono en la empresa:'.$tlfemp.'</div>
          <div style="margin-left: 30px;  margin-bottom:5px;">Dirección:'.$dir.'</div>
          </div>
          </div>

        <div class="container" style="text-align: left; margin-top: 15px;"><table width="100%">
              <tr>        <th style="width: 33%; padding: 8px; background: 	#c15a3a; font-family: Georgia; border-bottom: 1px solid #fff; color: #FFFFFF; ">Producto</th>
                  <th style="padding: 8px;background: 	#c15a3a; font-family: Georgia;  border-bottom: 1px solid #fff; color: #FFFFFF; ">Cantidad</th>
                  <th style="padding: 8px;background: 	#c15a3a; font-family: Georgia;  border-bottom: 1px solid #fff; color: #FFFFFF; ">Monto</th>

              </tr>',3);
        $sql3 = "SELECT c.nomprod as nomprod, b.cantidadProd as cant, b.ValorTotal as valor, a.fechaped as fecha FROM tblpedido a, tbldetallepedido b, tblproducto c where b.idProducto=c.id and a.id='$idpedido' and b.idPedido = a.id ";
        $resultado3 = $mysqli -> query($sql3);

        while ($fila = $resultado3 -> fetch_assoc()){

          $mpdf->WriteHTML('
          <tr>
              <td width="70%" style=" font-family: Georgia; text-align: center; padding: 8px;border-bottom: 1px solid #fff; color: #000000; border-top: 1px solid transparent;">' .$fila['nomprod'] .'</td>

              <td style="text-align: center;  font-family: Georgia; padding: 8px;border-bottom: 1px solid #fff; color: #000000; border-top: 1px solid transparent;">' .$fila['cant'] .'</td>

              <td style="text-align: center; font-family: Georgia;  padding: 8px;border-bottom: 1px solid #fff; color: #000000; border-top: 1px solid transparent;">' .$fila['valor'] .'</td>
              </tr>
              ', 2);
        }
        $mpdf->WriteHTML('</table></div>',2);
//$mpdf->WriteHTML('L','','','','',50,50,50,50,150,10);

$sql = "SELECT sum(b.ValorTotal) as total FROM tblpedido a, tbldetallepedido b where  a.id='$idpedido' and b.idPedido = a.id ";
$resultado = $mysqli -> query($sql);
if($fila = $resultado -> fetch_assoc()){
  $total = $fila['total'];
  $valort=number_format($total,2);//Precio total formateado
 $valort2=str_replace(",","",$valort);//Reemplazo las comas
}
         $mpdf->WriteHTML('<div style="text-align: right; padding: 8px;background: 	#c15a3a; font-family: Georgia;  border-bottom: 1px solid #fff; color: #FFFFFF; ">Total a pagar: '.$valort2.'</div>',2);
$mpdf->WriteHTML('<div style="text-align: right; margin-top: 30px; font-family: Georgia; ">Entregado a: ______________________________</div>',2);
         $mpdf->WriteHTML('<div style="text-align: right; margin-top: 20px;font-family: Georgia; ">Firma:______________________</div>',2);


        $mpdf->Output('archivo.pdf','I');
        exit;
    } // CIERRE DE IF GENERAR
?>
