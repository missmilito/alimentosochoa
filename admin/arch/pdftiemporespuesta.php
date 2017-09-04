
<?php

  require_once "mpdf/mpdf.php";
  require_once "php/conectari.php";

session_start();

  $mysqli = conectar();

  // SI PULSAMOS GENERAR PDF
  if (isset($_SESSION['idusuario'])) {

        $cabecera = "<span><img src='../images/headermini.png'/><b>Informe PDF</b></span>";
        $pie = "<span>Descripción pie</span>";
        $mpdf=new mPDF();
        //$style=file_get_contents('../css/tabla.css');
        //$mpdf->WriteHTML($style, 1);
        $mpdf->setFooter('Pagina: {PAGENO}');

        $mpdf->WriteHTML('<div  style="text-align: center;"><img style="text-align: right;" src="../images/headermini.png"/></div>');

        $contenido='<div class="container" style="text-align: Justify;  background: #e8edff; width: 1px;
         border-bottom: 10px solid #fff; color: black; height: 100px; ">
        <div style="margin: 20px; font-weight: bold; text-align: center"></p>REPORTE: TIEMPO DE RESPUESTA EN LOS PEDIDOS.</p></div><br>
        </div>
      ';


        $mpdf->WriteHTML($contenido,5);
        $sql = "SELECT datepedido, dateresp, promedio as newprom, idpedido FROM tbltimestat  where promedio > '00:00:00' group by idpedido";
        $resultado = $mysqli -> query($sql);


        $mpdf->WriteHTML('<div class="container" style="text-align:center;"><table  style="margin: 0 auto;" class="table-hover table-responsive table-striped">
            <tr>

                <th style="padding: 8px;background: #b9c9fe; border-top: 4px solid #aabcfe; border-bottom: 1px solid #fff; color: #010101; ">Id del pedido.</th>
                <th style="padding: 8px;background: #b9c9fe; border-top: 4px solid #aabcfe; border-bottom: 1px solid #fff; color: #010101; ">Fecha/Hora del pedido.</th>
                <th style="padding: 8px;background: #b9c9fe; border-top: 4px solid #aabcfe; border-bottom: 1px solid #fff; color: #010101; ">Fecha/Hora de respuesta.</th>
                <th style="padding: 8px;background: #b9c9fe; border-top: 4px solid #aabcfe; border-bottom: 1px solid #fff; color: #010101; ">Promedio</th>
            </tr>',3);
        while ($fila = $resultado -> fetch_assoc()){

            $mpdf->WriteHTML('
              <tr>
                    <td style="text-align: center; padding: 8px;background: #e8edff;border-bottom: 1px solid #fff; color: #010101; border-top: 1px solid transparent;">' .$fila['idpedido'] .'</td>

                    <td style="text-align: center;  padding: 8px;background: #e8edff;border-bottom: 1px solid #fff; color: #010101; border-top: 1px solid transparent;">' .$fila['datepedido'] .'</td>

                    <td style="text-align: center;  padding: 8px;background: #e8edff;border-bottom: 1px solid #fff; color: #010101; border-top: 1px solid transparent;">' .$fila['dateresp'] .'</td>

                    <td style="text-align: center;  padding: 8px; background: #e8edff;border-bottom: 1px solid #fff; color: #010101; border-top: 1px solid transparent;">' .$fila['newprom'] .'</td>


                </tr>
                ', 2);
        }
        $mpdf->WriteHTML('</table></div>',2);
//$mpdf->WriteHTML('L','','','','',50,50,50,50,150,10);



        $mpdf->Output('archivo.pdf','I');
        exit;
    } // CIERRE DE IF GENERAR
?>
