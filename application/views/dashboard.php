
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['Inpatient',     11],
          ['Outpatient',      2],
          ['Emergency',  2],
        ]);

        var options = {
          title: 'Total percentage of patients under Inpatient, Outpatient, Emergency'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>


    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['HMO',     5],
          ['Government',      2],
          ['Corporate',  2],

        ]);

        var options = {
          title: 'Total percentage of paid bills of HMO, Government, Corporate '
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart2'));

        chart.draw(data, options);
      }
    </script>


    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable( 
        	<?php echo "[['guarantorID','Inpatient','Outpatient','Emergency'],";
        		foreach ($result as $key => $row) {
        			echo "['".$row->g_name."',";
        			echo $row->inpatient.",";
        			echo $row->outpatient.",";
        			echo $row->emergency."],";
        		}
        		echo "]";
        	 ?>
        	);

        var options = {
          chart: {
            title: 'Top 10 Company',
            subtitle: 'This Column Chart shows the top 10 companies with the highest total amount of bill',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>

    <div id="columnchart_material" style="width: 100%; height: 300px;"></div>




  	<div class="row" style="padding-top: 50px">

  		<div class="col-md-6">
  			<div id="piechart2" style="width: 100%; height: 300px;"></div>
  		</div>
  		<div class="col-md-6">
  			<div id="piechart" style="width: 100%; height: 300px;"></div>
  		</div>

  		
  	</div>


  	<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Year', 'Sales', 'Expenses', 'Profit'],
          ['2014', 1000, 400, 200],
          ['2015', 1170, 460, 250],
          ['2016', 660, 1120, 300],
          ['2017', 1030, 540, 350]
        ]);

        var options = {
          chart: {
            title: 'Company Performance',
            subtitle: 'Sales, Expenses, and Profit: 2014-2017',
          },
          bars: 'horizontal' // Required for Material Bar Charts.
        };

        var chart = new google.charts.Bar(document.getElementById('barchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
  </head>
  <body>
    <div id="barchart_material" style="width: 100%; height: 500px;"></div>
  </body>
</html>

    

    

