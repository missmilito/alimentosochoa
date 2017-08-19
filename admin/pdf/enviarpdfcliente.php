
    <!--CONTENIDO-->

          <div class="form-group">
          	<fieldset>
          		<legend><span>Alta, baja y modificación de Clientes</span></legend>

          		<form class="form" action="pdfcliente.php" method="POST" enctype="multipart/form-data"
                      action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

          				<tr><td colspan="6">Dar de alta un nuevo Cliente: </td></tr>
                       <div> <input type="text" name="nomcliente" id="nomcliente" value=""></div>


          		<?php

          			echo '<tr><td colspan="2"><button type="submit" class="btn btn-default" name="generar"/>Generar PDF</button></td>';
          			echo '</tr>';

          			echo "</form>"
          		?>
          	</fieldset>


          </div>
