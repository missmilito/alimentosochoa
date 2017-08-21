google.load("visualization", "1", {packages:["corechart"]});
 google.setOnLoadCallback(dibujarGrafico);
 function dibujarGrafico() {
   // Tabla de datos: valores y etiquetas de la gráfica
   var data = google.visualization.arrayToDataTable([
     ['Pedido', 'Tiempo de respuesta'],
     <?php $result = mysql_query($SQLDatos);
      while($row = mysql_fetch_row($result)){?>
        [ '<?php echo $row[1]; ?>', [<?php  echo $row[0]; ?>]],
        <?php } ?>
   ]);
     var options = {
       title: 'Tiempo de respuesta entre pendiente - procesado',
       width: 450,
       height: 400,
     }
     // Dibujar el gráfico
     new google.visualization.ColumnChart(
     //ColumnChart sería el tipo de gráfico a dibujar
       document.getElementById('GraficoGoogleChart-ejemplo-1')
     ).draw(data, options);
   }
