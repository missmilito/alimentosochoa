
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          <?php $resultado = mysql_query($sqlprod);
           while($row = mysql_fetch_row($resultado)){?>
             [ '<?php echo $row[0]; ?>', <?php  echo $row[2]; ?>],
             <?php } ?>
        ]);

        var options = {
          title: 'My Daily Activities',
          is3D: true,
          width: 450,
          height: 400,

        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
      }
