
    <?php

    	require_once "mpdf/mpdf.php";
    	require_once "php/conectari.php";
      session_start();
       $_SESSION['idusuario'];
    	$mysqli = conectar();

    	// SI PULSAMOS GENERAR PDF
    	if (isset($_SESSION['idusuario']))  {
          $idcliente = mysqli_real_escape_string($mysqli, $_SESSION['idusuario']);
            $cabecera = "<span><img src='ruta_imagen' width='100px' height='50px'/><b>Informe PDF</b></span>";
            $pie = "<span>Descripción pie</span>";
            $mpdf=new mPDF();
            //$style=file_get_contents('../css/tabla.css');
            //$mpdf->WriteHTML($style, 1);
            $mpdf->SetHTMLHeader($cabecera);
            $mpdf->SetHTMLFooter($pie);

            $sql = "SELECT a.id as idpedido, b.id as idcliente, b.nomcliente as nom  from tblpedido a, tblcliente b where b.id ='$idcliente' and a.idcliente = b.id";
            $resultado = $mysqli -> query($sql);

    $mpdf->WriteHTML('  <td>' .$_SESSION['nombreusu'] .'</td>',2);
            $mpdf->WriteHTML('<table class="table-hover table-responsive table-striped">
                <tr>
                    <th></th>
                    <th>CABECERA 2</th>
                    <th>CABECERA 3</th>
                    <th>CABECERA 4</th>
                </tr>',2);
            while ($fila = $resultado -> fetch_assoc()){

                $mpdf->WriteHTML('
                	<tr>
                        <td>' .$fila['idpedido'] .'</td>
                        <td>' .$fila['idcliente'] .'</td>
                        <td>' .$fila['nom'] .'</td>
                        <td>' .$fila['campoDb4'] .'</td>
                    </tr>
                    ', 2);
            }
            $mpdf->WriteHTML('</table>',2);
            $mpdf->Output('archivo.pdf','I');
            exit;
        } // CIERRE DE IF GENERAR
    ?>
