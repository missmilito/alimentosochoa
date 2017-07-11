
    <?php

    	require_once "mpdf/mpdf.php";
    	require_once "php/conectari.php";

    	$mysqli = conectar();

    	// SI PULSAMOS GENERAR PDF
    	if (isset($_POST["generar"])) {
          $nomcliente = mysqli_real_escape_string($mysqli, $_POST['nomcliente']);
            $cabecera = "<span><img src='ruta_imagen' width='100px' height='50px'/><b>Informe PDF</b></span>";
            $pie = "<span>Descripción pie</span>";
            $mpdf=new mPDF();
            //$style=file_get_contents('../css/tabla.css');
            //$mpdf->WriteHTML($style, 1);
            $mpdf->SetHTMLHeader($cabecera);
            $mpdf->SetHTMLFooter($pie);

            $sql = "SELECT a.id, b.id as idCliente from tblpedido a, tblcliente b where b.nomcliente ='$nomcliente' and a.idcliente = b.id";
            $resultado = $mysqli -> query($sql);

    $mpdf->WriteHTML('  <td>' .$S_SESSION['nomcliente'] .'</td>',2);
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
                        <td>' .$fila['id'] .'</td>
                        <td>' .$fila['idCliente'] .'</td>
                        <td>' .$fila['campoDb3'] .'</td>
                        <td>' .$fila['campoDb4'] .'</td>
                    </tr>
                    ', 2);
            }
            $mpdf->WriteHTML('</table>',2);
            $mpdf->Output('archivo.pdf','I');
            exit;
        } // CIERRE DE IF GENERAR
    ?>
