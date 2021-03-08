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
      title: 'Percentage of patients under \n Inpatient, Outpatient and Emergency'
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
      title: 'Total percentage of \n paid bills '
    };

    var chart = new google.visualization.PieChart(document.getElementById('piechart2'));

    chart.draw(data, options);
  }
</script>

<script type="text/javascript">
  google.charts.load('current', {'packages':['corechart']});
  google.charts.setOnLoadCallback(drawChart);

  function drawChart() {

    var data = google.visualization.arrayToDataTable([
     <?php echo "['Guarantor name','Count'],";
     foreach ($result4 as $key => $row) {
       echo "['".$row->name."',";
       echo $row->patient_count."],";
     }
     ?>
     ]);

    var options = {
    	width: '100%',
        height: '100%',
                bar: { groupWidth: '60%' },
      title: '\n Patient count per Guarantor',

    };

    var chart = new google.visualization.BarChart(document.getElementById('patient_count_per_guarantor'));

    chart.draw(data, options);
  }
</script>


<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
  google.charts.load('current', {'packages':['bar']});
  google.charts.setOnLoadCallback(drawChart);

  function drawChart() {
    var data = google.visualization.arrayToDataTable( 
     <?php echo "[['Company','Hospital Balance','Professional Balance'],";
     foreach ($result5 as $key => $row) {
       echo "['".$row->name."',";
       echo $row->hospital_balance.",";
       echo $row->professional_balance."],";
     }
     echo "]";
     ?>
     );

      var options = {
        width: '100%',
        height: '100%',
        legend: { position: 'top', maxLines: 3 },
        bar: { groupWidth: '75%' },
        isStacked: true,
        series: {
			  0:{color:'#ff9900'},
			  1:{color:'#dc3912'},
			  2:{color:'#3366cc'},
		},
		chart: {
			title: 'Top 10 guarantors with highest balance'
		}

      };

    var chart = new google.charts.Bar(document.getElementById('guarantor_balance'));

    chart.draw(data, google.charts.Bar.convertOptions(options));
  }
</script>
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
        width: '100%',
        height: '100%',
        legend: { position: 'top', maxLines: 3 },
        bar: { groupWidth: '75%' },
        isStacked: true,
        series: {
			  0:{color:'#ff9900'},
			  1:{color:'#dc3912'},
			  2:{color:'#3366cc'},
		},
		chart: {
			title: 'Top 10 guarantors with highest bill'
		}

      };

    var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

    chart.draw(data, google.charts.Bar.convertOptions(options));
  }
</script>


<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      <div id="columnchart_material" style="height: 360px; width: 100%;">
      </div>
    </div>
    <!-- <div class="col-md-6">
      <div id="piechart2" style="height: 360px; width: 100%;">
      </div>
    </div> -->
    <div class="col-md-6"><br><br>
      <div id="piechart" style="height: 360px; width: 100%;">
      </div>
    </div>

    <div class="col-md-6">
      <div id="patient_count_per_guarantor" style="height: 460px; width: 100%;">
      </div>
    </div>
  
  	<div class="col-md-12">
      <div id="guarantor_balance" style="height: 440px; width: 100%;">
      </div>
    </div>
  
</div>
<!-- <img src="../application/build/images/back_disabled.png"> -->


