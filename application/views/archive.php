<table id="patient_list" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Company</th>
                <th>First name</th>
                <th>Middle name</th>
                <th>Last name</th>
                <th>Date created</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        <?php
            if (!isset($result)) {

            }
			else if ($result) {
				foreach ($result as $key => $row) {
					echo "<tr>";
                        echo "<td>".$row->guarantor_name."</td>";
						echo "<td>".$row->first_name."</td>";
						echo "<td>".$row->middle_name."</td>";
						echo "<td>".$row->last_name."</td>";
						echo "<td>".$row->date_created."</td>";
						echo "<td><a href='restore_patient/".$row->patient_id."'><i class='fa fa-window-restore' 
                        style='color: #40b336; font-size: 16px'></i></a></td>";
					echo "</tr>";
				}
			}
		?>
        </tbody>
</table>

<script type="text/javascript">
	$(document).ready( function () {
	    $('#patient_list').DataTable();
	} );
</script>

<script type="text/javascript">
$(function() {

    var start = moment().subtract(29, 'days');
    var end = moment();

    function cb(start, end) {
        $('#date span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        document.getElementById("start").value = start.format('YYYY-MM-DD');
        document.getElementById("end").value = end.format('YYYY-MM-DD');
/*        document.getElementById('form-id').action = "patients_filtered/"+document.getElementById('start').value+"/"+document.getElementById('end').value;*/
        //document.getElementById("form-id").submit();
    }

    $('#date').daterangepicker({
        startDate: start,
        endDate: end,
        ranges: {
           'Today': [moment(), moment()],
           'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
           'Last 7 Days': [moment().subtract(6, 'days'), moment()],
           'Last 30 Days': [moment().subtract(29, 'days'), moment()],
           'This Month': [moment().startOf('month'), moment().endOf('month')],
           'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        }
    }, cb);


    cb(start, end);


});
</script>

