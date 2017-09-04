
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
        <div style="margin: 20px; font-weight: bold; text-align: center"></p>REPORTE: AUDITORIA DE PROCESOS.</p></div><br>
        </div>
      ';


        $mpdf->WriteHTML($contenido,5);
        $sql = "select id, iduser,seccion, idseccion, operacion, fecha FROM tbl_auditoria group by fecha";
        $resultado = $mysqli -> query($sql);


        $mpdf->WriteHTML('<div class="container" style="text-align:center;"><table  style="margin: 0 auto;" class="table-hover table-responsive table-striped">
            <tr>

                <th style="padding: 8px;background: #b9c9fe; border-top: 4px solid #aabcfe; border-bottom: 1px solid #fff; color: #010101; ">Id del empleado.</th>
                <th style="padding: 8px;background: #b9c9fe; border-top: 4px solid #aabcfe; border-bottom: 1px solid #fff; color: #010101; ">Modulo</th>
                <th style="padding: 8px;background: #b9c9fe; border-top: 4px solid #aabcfe; border-bottom: 1px solid #fff; color: #010101; ">Id de operacióm</th>
                <th style="padding: 8px;background: #b9c9fe; border-top: 4px solid #aabcfe; border-bottom: 1px solid #fff; color: #010101; ">Operación</th>
            <th style="padding: 8px;background: #b9c9fe; border-top: 4px solid #aabcfe; border-bottom: 1px solid #fff; color: #010101; ">Fecha</th>
            </tr>',3);
        while ($fila = $resultado -> fetch_assoc()){

            $mpdf->WriteHTML('
              <tr>
                    <td style="text-align: center; padding: 8px;background: #e8edff;border-bottom: 1px solid #fff; color: #010101; border-top: 1px solid transparent;">' .$fila['iduser'] .'</td>

                    <td style="text-align: center;  padding: 8px;background: #e8edff;border-bottom: 1px solid #fff; color: #010101; border-top: 1px solid transparent;">' .$fila['seccion'] .'</td>

                    <td style="text-align: center;  padding: 8px;background: #e8edff;border-bottom: 1px solid #fff; color: #010101; border-top: 1px solid transparent;">' .$fila['idseccion'] .'</td>

                    <td style="text-align: center;  padding: 8px; background: #e8edff;border-bottom: 1px solid #fff; color: #010101; border-top: 1px solid transparent;">' .$fila['operacion'] .'</td>
                    <td style="text-align: center;  padding: 8px; background: #e8edff;border-bottom: 1px solid #fff; color: #010101; border-top: 1px solid transparent;">' .$fila['fecha'] .'</td>



                </tr>
                ', 2);
        }
        $mpdf->WriteHTML('</table></div>',2);
//$mpdf->WriteHTML('L','','','','',50,50,50,50,150,10);



        $mpdf->Output('archivo.pdf','I');
        exit;
    } // CIERRE DE IF GENERAR
?>
