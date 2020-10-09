
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
        	<?php echo "['Guarantor name','Count'],";
        		foreach ($result3 as $key => $row) {
        			echo "['".$row->patient_type2."',";
        			echo $row->count."],";
        		}



        	 ?>
        ]);

        var options = {
          title: 'Total % of patients under Inpatient, Outpatient and Emergency'
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
        	<?php echo "['Guarantor name','Count'],";
        		foreach ($result2 as $key => $row) {
        			echo "['".$row->name."',";
        			echo $row->count."],";
        		}

        	 ?>

        ]);

        var options = {
          title: 'Total % of Paid Bills '
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
        	<?php echo "[['Company','Inpatient','Outpatient','Emergency'],";
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
            subtitle: 'This Column Chart shows the top 10 companies with the highest amount of Bill',
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


  <!-- <img src="../application/build/images/back_disabled.png"> -->

    

    

