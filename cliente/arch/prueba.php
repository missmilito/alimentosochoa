<?php

  require_once "mpdf/mpdf.php";
  require_once "php/conectari.php";


session_start();

  $mysqli = conectar();
$_SESSION['idpedido'];
  // SI PULSAMOS GENERAR PDF
  if (isset($_SESSION['idusuario'])) {
 $idcliente = mysqli_real_escape_string($mysqli, $_SESSION['idusuario']);
$idpedido =  mysqli_real_escape_string($mysqli, $_SESSION['idpedido']);

        $cabecera = "<span><img src='../images/headermini.png'/><b>Informe PDF</b></span>";
        $pie = "<span>Descripción pie</span>";
        $mpdf=new mPDF();
        //$style=file_get_contents('../css/tabla.css');
        //$mpdf->WriteHTML($style, 1);

        $mpdf->SetHTMLFooter('<div style="text-align: right">Distribuidora Alimentos Ochoa F.P. Contacto: (0243)2379363 / (0424)1392972 |Página: {PAGENO}</div>');

        $mpdf->defaultfooterfontsize=10;
        $mpdf->WriteHTML('<HTML><BODY><div  style="text-align: center;"><img style="text-align: right;" src="../images/headermini.png"/></div>');
        $sql = "SELECT c.nomprod as nomprod, b.cantidadProd as cant, b.ValorTotal as valor, b.idPedido as idpedido, a.fechaped FROM tblpedido a, tbldetallepedido b, tblproducto c where b.idProducto=c.id and a.id=(select MAX(id) from tblpedido where idcliente='$idcliente') and b.idPedido = a.id and a.idcliente='$idcliente'";
        $resultado = $mysqli -> query($sql);
        $mpdf->WriteHTML('<div class="container" style="text-align: Justify;
         border-bottom: 10px solid #fff; color: black;">
        <div border: 1px solid; style="margin: 15px; font-family: Courier New; font-weight: bold;">
        <tr>
        <th style="font-size: 20px; border: 1px solid ">Fecha del pedido:10/08/2017</th>
        </tr>
        <p >Nº de Pedido:'. $idpedido .'</p>
        </div>


        <div  style="width:300px; height:50px; font-family: Courier New; font-weight: bold; margin: 10px; background-color:#e6d3a8; ">
        <div style="margin-left: 30px; margin-top: 5px;">Cliente:'.$_SESSION['nombreusu'].' '.$_SESSION['apeusu'].'</div>
        <div style="margin-left: 30px;">Empresa:'.$_SESSION['empusu'].'</div>
        <div style="margin-left: 30px;">Dirección:'.$_SESSION['empdir'].'</div>
        </div>
        </div>

      <div class="container" style="text-align: left"><table width="100%">
            <tr>

                <th style="width: 33%; padding: 8px; background: 	#c15a3a; font-family: Georgia; border-bottom: 1px solid #fff; color: #FFFFFF; ">Producto</th>
                <th style="padding: 8px;background: 	#c15a3a; font-family: Georgia;  border-bottom: 1px solid #fff; color: #FFFFFF; ">Cantidad</th>
                <th style="padding: 8px;background: 	#c15a3a; font-family: Georgia;  border-bottom: 1px solid #fff; color: #FFFFFF; ">Monto</th>

            </tr>');
            while ($fila = $resultado -> fetch_assoc()){
                $mpdf->WriteHTML('<tr>
                    <td width="70%" style=" font-family: Georgia; text-align: center; padding: 8px;border-bottom: 1px solid #fff; color: #000000; border-top: 1px solid transparent;">' .$fila['nomprod'] .'</td>

                    <td style="text-align: center;  font-family: Georgia; padding: 8px;border-bottom: 1px solid #fff; color: #000000; border-top: 1px solid transparent;">' .$fila['cant'] .'</td>

                    <td style="text-align: center; font-family: Georgia;  padding: 8px;border-bottom: 1px solid #fff; color: #000000; border-top: 1px solid transparent;">' .$fila['valor'] .'</td>



                </tr>');
              }
                $mpdf->WriteHTML('</table></div><BODY></HTML>',2);
//$mpdf->WriteHTML('L','','','','',50,50,50,50,150,10);
$mpdf->WriteHTML(file_get_contents('../vendor/bootstrap/bootstrap.min.css'), 1);


        $mpdf->Output('archivo.pdf','I');
        exit;
?>
