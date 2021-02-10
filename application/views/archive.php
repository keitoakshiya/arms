<table id="patient_list" class="display" style="width:100%; color: #292929;">
        <thead>
            <tr>
                <th>Company</th>
                <th>Full Name</th>
                <th>Date and Time Deleted</th>
                <th></th>
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
						echo "<td>".$row->first_name." ".$row->middle_name." ".$row->last_name."</td>";
						echo "<td>".$row->date_deleted."</td>";
						echo "<td><button style='border: none;' onclick='restore_patient(".$row->patient_id.")'><i class='fa fa-window-restore' style='color: green; font-size: 16px;'></i></button></td>";
             echo "<td><button style='border: none;' onclick='delete_patient(".$row->patient_id.")'><i class='fa fa-trash' style='color: red; font-size: 16px;'></i></button></td>";
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

</script>


<script type="text/javascript">
    function restore_patient(id) {
          var r = confirm("Are you sure you want to retrieve this patient? \nAll bills and transactions of this patient will also be retrieved");
  if (r == true) {
    window.location.href ="restore_patient/"+id ;
  } else {
    //window.location.href ="patients";
  }
    }

</script>


<script type="text/javascript">
    function delete_patient(id) {
          var r = confirm("This action can't be undone. \nAre you sure you want to permanently delete this patient? All bills and transactions of this patient will also be permanently deleted");
  if (r == true) {
    window.location.href ="delete_patient/"+id ;
  } else {
    //window.location.href ="patients";
  }
    }

</script>