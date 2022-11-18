<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Tags', 'Post Count'],
          <?php echo $tagsData?>
        ]);
        var options = {
          title: 'Tags By Post',
          pieHole: 0.4,
        };
        var chart = new google.visualization.PieChart(document.getElementById('piechart'));
        chart.draw(data, options);
        }
    </script>

     <div id="piechart" style="height: 500px; width: 100%;"></div>

    
    

