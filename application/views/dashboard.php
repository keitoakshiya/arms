


<div class="row" style="display: inline-block; align-content: center;">
	<div class="top_tiles">

		<?php
			$this->db->select('company.name, COUNT(*) as count');
			$this->db->from('patient');
			$this->db->join('company', 'patient.company_id = company.id', 'left');
			$this->db->group_by("name");
			$this->db->limit(10); 
			$query = $this->db->get();

			  $i=0;
			foreach ($query->result() as $row) 
			{
			$i++;
				echo '
				<div class="animated flipInY col-lg-4 col-md-4 col-sm-6 " style="width:200px; height:100px;">
				<div style="background:#fff">	
					<div class="tile-stats" style ="width:100%;height:100px">

							<p style="font-size:10px"> Top '. $i .'  </p>
							<h3 style="font-size:20px">'. $row->name.'</h3>
							<div class="count" style="font-size:15px; ">'. $row->count.' patients</div>
						</div>
					</div>
				</div>';

                      
			}
		?>


</div>
</div>

    <!--Load the AJAX API-->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">

      // Load the Visualization API and the corechart package.
      google.charts.load('current', {'packages':['corechart']});

      // Set a callback to run when the Google Visualization API is loaded.
      google.charts.setOnLoadCallback(drawChart);

      // Callback that creates and populates a data table,
      // instantiates the pie chart, passes in the data and
      // draws it.
      function drawChart() {

        // Create the data table.
  var data = google.visualization.arrayToDataTable([
         ['Element', 'Density', ],
         ['Guarantor Sample',69],
         		<?php
			$this->db->select('company.name, COUNT(*) as count');
			$this->db->from('patient');
			$this->db->join('company', 'patient.company_id = company.id', 'left');
			$this->db->group_by("name");
			$this->db->order_by('name', 'ASC');
			$query = $this->db->get();

			  $i=0;
			foreach ($query->result() as $row) 
			{
				echo "['".$row->name."',";
				echo "".$row->count."],";
			}
		?>

      ]);

        // Set chart options
        var options = {'title':'Guarantor distribution',
                       width: ($(window).width())/1.3,
                       'height':300};

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
        chart.draw(data, options);



			function resizeChart () {
			    chart.draw(data, options);
			}
			if (document.addEventListener) {
			    window.addEventListener('resize', resizeChart);
			}
			else if (document.attachEvent) {
			    window.attachEvent('onresize', resizeChart);
			}
			else {
			    window.resize = resizeChart;
			}
      }
    	

    </script>

<div class="row" style="width: 5px;">
	<div style="margin-top: 10px;margin-bottom: 20px; margin-left: 10px;">
		 <div id="chart_div" style="width: 90%; height: 20%;"></div>
	</div>
</div>



</div>