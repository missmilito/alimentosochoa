
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
        $mpdf->SetHTMLFooter($pie);
        $mpdf->WriteHTML('<div  style="text-align: center;"><img style="text-align: right;" src="../images/headermini.png"/></div>');

        $contenido='<div class="container" style="text-align: Justify;  background: #e8edff; width: 1px;
         border-bottom: 10px solid #fff; color: black; height: 100px; ">
        <div style="margin: 10px;"></p>Nº de Pedido: '.$idpedido .'</p></div><br>
        <div style="margin: 10px;"></p>Cliente: '.$_SESSION['nombreusu'].' '.$_SESSION['apeusu'].'</p></div></div>';


        $mpdf->WriteHTML($contenido,5);

        $sql = "SELECT c.nomprod as nomprod, b.cantidadProd as cant, b.ValorTotal as valor, b.idPedido as idpedido, a.fechaped FROM tblpedido a, tbldetallepedido b, tblproducto c where a.idcliente='$idcliente' and b.idProducto=c.id and a.fechaped=DATE_FORMAT(CURRENT_DATE, '%Y-%m-%d') and a.id= '$idpedido' and b.idPedido = a.id";
        $resultado = $mysqli -> query($sql);


        $mpdf->WriteHTML('<div class="container" style="text-align:center;"><table  style="margin: 0 auto;" class="table-hover table-responsive table-striped">
            <tr>

                <th style="padding: 8px;background: #b9c9fe; border-top: 4px solid #aabcfe; border-bottom: 1px solid #fff; color: #039; ">Producto</th>
                <th style="padding: 8px;background: #b9c9fe; border-top: 4px solid #aabcfe; border-bottom: 1px solid #fff; color: #039; ">Cantidad</th>
                <th style="padding: 8px;background: #b9c9fe; border-top: 4px solid #aabcfe; border-bottom: 1px solid #fff; color: #039; ">PrecioTotal</th>
                <th style="padding: 8px;background: #b9c9fe; border-top: 4px solid #aabcfe; border-bottom: 1px solid #fff; color: #039; ">IdPedido</th>
            </tr>',3);
        while ($fila = $resultado -> fetch_assoc()){

            $mpdf->WriteHTML('
              <tr>
                    <td style="text-align: center; padding: 8px;background: #e8edff;border-bottom: 1px solid #fff; color: #669; border-top: 1px solid transparent;">' .$fila['nomprod'] .'</td>

                    <td style="text-align: center;  padding: 8px;background: #e8edff;border-bottom: 1px solid #fff; color: #669; border-top: 1px solid transparent;">' .$fila['cant'] .'</td>

                    <td style="text-align: center;  padding: 8px;background: #e8edff;border-bottom: 1px solid #fff; color: #669; border-top: 1px solid transparent;">' .$fila['valor'] .'</td>

                    <td style="text-align: center;  padding: 8px; background: #e8edff;border-bottom: 1px solid #fff; color: #669; border-top: 1px solid transparent;">' .$fila['idpedido'] .'</td>


                </tr>
                ', 2);
        }
        $mpdf->WriteHTML('</table></div>',2);
//$mpdf->WriteHTML('L','','','','',50,50,50,50,150,10);



        $mpdf->Output('archivo.pdf','I');
        exit;
    } // CIERRE DE IF GENERAR
?>
