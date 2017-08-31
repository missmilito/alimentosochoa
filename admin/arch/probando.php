<?php

$HTML =<<<XYZ
<!--Load the AJAX API-->
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script type="text/javascript">

      // Load the Visualization API and the charts package.
      google.load('visualization', '1.0', {'packages':['corechart']});

      // Set a callback to run when the Google Visualization API is loaded.
      google.setOnLoadCallback(drawChart);

      // Callback that creates and populates a data table,
      // instantiates the pie chart, passes in the data and
      // draws it.
      function drawChart() {

        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Age Range');
        data.addColumn('number', 'Number');
        data.addRows('.$pie_chart_data.');

        // Set chart options
        var options = {title:'The Percent Of People Within Age Range',
         titleTextStyle: {fontName: 'Lato', fontSize: 18, bold: true},
                       height: 400,
                       is3D: true,
         colors:['#0F4F8D','#2B85C1','#8DA9BF','#F2C38D','#E6AC03','#F09B35', '#D94308', '#013453'],
         chartArea:{left:30,top:30,width:'100%',height:'80%'}};

        // Instantiate and draw our chart, passing in some options.
        var chart_div = document.getElementById('pie_chart_div');
        var chart = new google.visualization.PieChart(chart_div);

        // Wait for the chart to finish drawing before calling the getIm geURI() method.
        google.visualization.events.addListener(chart, 'ready', function ()      {
         chart_div.innerHTML = '<img src="' + chart.getImageURI() + '">';
        });

        chart.draw(data, options);
      }

      // Make the charts responsive
      jQuery(document).ready(function(){
        jQuery(window).resize(function(){
          drawChart();
        });
      });

    </script>

    <div id="pie_chart_div"></div>
XYZ;

    echo $HTML;

?>
