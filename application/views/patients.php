
<link href="../application/build/css/ew.css" rel="stylesheet">

<table id="patient_list" class="display" style="width:100%; color: #292929;" >
        <thead>
            <tr>
                <th>Patient ID</th>
                <th>Company</th>
                <th>First Name</th>
                <th>Middle Name</th>
                <th>Last Name</th>
                <th>Date Registered</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php
            if (!isset($result)) {

            }
			else if ($result) { //query result from model of a table which then will be passed in to $row to show individual comlumns from db table
				foreach ($result as $key => $row) { //fat arrow
					echo "<tr>";
                        echo "<td>".sprintf('%08d', $row->patient_id)."</td>";
                        echo "<td>".$row->guarantor_name."</td>";
						echo "<td>".$row->first_name."</td>";
						echo "<td>".$row->middle_name."</td>";
						echo "<td>".$row->last_name."</td>";
						echo "<td>".$row->date_created."</td>";
						echo "<td><button style='border: none;' onclick=\"location.href = 'edit_patient/".$row->patient_id."' \"><i class='fa fa-edit' 
                        style=' font-size: 16px'></i></button>
                        <button style='border: none;' onclick='archive_patient(".$row->patient_id.")'><i class='fa fa-trash' 
                        style='color: #c93434; font-size: 16px;'></i></button></td>";
					echo "</tr>";
				}
			}
		?>
        <tfoot>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tfoot>
        </tbody>
</table>

<script type="text/javascript">


        $('#patient_list').DataTable( {
                                dom: 'Bfrtip',
        buttons: [
            'copy', 'excel', 'pdf', 'print'
        ],

        initComplete: function () {
            this.api().columns([1]).every( function () {
                var column = this;
                var select = $('<select><option value="">Select Company</option></select>')
                    .appendTo( $(column.footer()).empty() )
                    .on( 'change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );
 
                        column
                            .search( val ? '^'+val+'$' : '', true, false )
                            .draw();
                    } );
 
                column.data().unique().sort().each( function ( d, j ) {
                    select.append( '<option value="'+d+'">'+d+'</option>' )
                } );
            } );
        }
    } );
</script>

<script type="text/javascript">
$(function() {

    var start = moment().subtract(29, 'days');
    var end = moment();

    function cb(start, end) {
        $('#date span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        document.getElementById("start").value = start.format('YYYY-MM-DD HH:mm:s');
        document.getElementById("end").value = end.format('YYYY-MM-DD HH:mm:s');

    }

    $('#date').daterangepicker({
        startDate: start,
        endDate: end,
          locale: {
            format: 'YYYY/MM/DD HH:mm'
          },
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


<script type="text/javascript">
    function archive_patient(id) {
          var r = confirm("Are you sure you want to deleted this patient? All bills and transactions of this patient will also be deleted. THIS ACTION CAN'T BE UNDONE");
  if (r == true) {
    window.location.href ="archive_patient/"+id ;
  } else {
    //window.location.href ="patients";
  }
    }


</script>

