
<?php

  require_once "mpdf/mpdf.php";
  require_once "php/conectari.php";

session_start();

  $mysqli = conectar();

  // SI PULSAMOS GENERAR PDF
  if (isset($_SESSION['idusuario'])) {

 $idcliente = mysqli_real_escape_string($mysqli, $_SESSION['idusuario']);
$idpedido = utf8_decode($_POST['idreporte']);

        $mpdf=new mPDF();
        //$style=file_get_contents('../css/tabla.css');
        //$mpdf->WriteHTML($style, 1);
        $mpdf->SetHTMLFooter('<div style="text-align: right">Distribuidora Alimentos Ochoa F.P. Contacto: (0243)2379363 / (0424)1392972 |Página: {PAGENO}</div>');


        $mpdf->WriteHTML('<div  style="text-align: center;"><img style="text-align: right;" src="../images/headermini.png"/></div>');
        $sql = "SELECT c.nomprod as nomprod, b.cantidadProd as cant, b.ValorTotal as valor, b.idPedido as idpedido, a.fechaped FROM tblpedido a, tbldetallepedido b, tblproducto c where b.idProducto=c.id and a.id='$idpedido' and b.idPedido = a.id and a.idcliente='$idcliente'";
        $resultado = $mysqli -> query($sql);
        if($row = $resultado -> fetch_assoc()){
          $fechaped=$row['fechaped'];
        }
        $contenido='<div class="container" style="text-align: Justify;
         border-bottom: 10px solid #fff; color: black;">
        <div border: 1px solid; style="margin: 5px; font-family: Courier New; font-weight: bold;">
        <tr>
        <th style="font-size: 20px; border: 1px solid ">Fecha del pedido:'.$fechaped.'</th>
        </tr>
        <p >Nº de Pedido:'. $idpedido .'</p>
        </div>';
        $mpdf->WriteHTML($contenido,5);

        $mpdf->WriteHTML('<div style="width:300px; height:50px; font-family: Courier New; font-weight: bold; margin: 5px; background-color:#e6d3a8; ">
          <div style="margin-left: 30px; margin-top: 5px;">Cliente:'.$_SESSION['nombreusu'].' '.$_SESSION['apeusu'].'</div>
          <div style="margin-left: 30px;">Empresa:'.$_SESSION['empusu'].'</div>
          <div style="margin-left: 30px;">Dirección:'.$_SESSION['empdir'].'</div>
          </div>
          </div>

        <div class="container" style="text-align: left"><table width="100%">
              <tr>        <th style="width: 33%; padding: 8px; background: 	#c15a3a; font-family: Georgia; border-bottom: 1px solid #fff; color: #FFFFFF; ">Producto</th>
                  <th style="padding: 8px;background: 	#c15a3a; font-family: Georgia;  border-bottom: 1px solid #fff; color: #FFFFFF; ">Cantidad</th>
                  <th style="padding: 8px;background: 	#c15a3a; font-family: Georgia;  border-bottom: 1px solid #fff; color: #FFFFFF; ">Monto</th>

              </tr>',3);
        $sql = "SELECT c.nomprod as nomprod, b.cantidadProd as cant, b.ValorTotal as valor, b.idPedido as idpedido, a.fechaped FROM tblpedido a, tbldetallepedido b, tblproducto c where b.idProducto=c.id and a.id='$idpedido' and b.idPedido = a.id and a.idcliente='$idcliente'";
        $resultado = $mysqli -> query($sql);

        while ($fila = $resultado -> fetch_assoc()){

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
$sql = "SELECT sum(b.ValorTotal) as total FROM tblpedido a, tbldetallepedido b where  a.id='$idpedido' and b.idPedido = a.id and a.idcliente='$idcliente'";
$resultado = $mysqli -> query($sql);
if($fila = $resultado -> fetch_assoc()){
  $total = $fila['total'];
  $valort=number_format($total,2);//Precio total formateado
 $valort2=str_replace(",","",$valort);//Reemplazo las comas
}
         $mpdf->WriteHTML('<div style="text-align: right; padding: 8px;background: 	#c15a3a; font-family: Georgia;  border-bottom: 1px solid #fff; color: #FFFFFF; ">Total a pagar: '.$valort2.'</div>',2);



        $mpdf->Output('pedidocod'.$idpedido.'fecha'.$fechaped.'.pdf','I');
        exit;
    } // CIERRE DE IF GENERAR
?>
