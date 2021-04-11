
<link href="../application/build/css/design.css" rel="stylesheet">

<table id="patient_list" class="display" style="width:100%; color: #292929;" >
        <thead>
            <tr>
                <th>Patient ID</th>
                <th>Company</th>
                <th>Full Name</th>
                <th>Date Registered</th>
                <th>Registry No.</th>

                <th></th>
            </tr>
        </thead>
        <tbody>
            <script type="text/javascript">
            <?php
                if (isset($start)&&isset($end)) {
                    $start_time = strtotime($start); 
                    $end_time = strtotime($end); 
                    $start_date = date('m/d/y', $start_time);
                    $end_date = date('m/d/y', $end_time);

                    echo "
                    $(window).on('load', function() {
                        $('#daterange').data('daterangepicker').setStartDate('".$start_date."');
                        $('#daterange').data('daterangepicker').setEndDate('".$end_date."');
                    })
                    ";
                    echo "$('#daterange').val('".$start_date."'+' - '+'".$end_date."');";
                }
                else echo "$('#daterange').val(moment().startOf('year').calendar()+' - '+moment().format('L'));
                                            $('#start').val(moment().startOf('year').format('YYYY-MM-DD'));
                            $('#end').val(moment().format('YYYY-MM-DD'));";
            ?>
            </script>
            
        <?php
            if (!isset($result)) {

            }
			else if ($result) { //query result from model of a table which then will be passed in to $row to show individual comlumns from db table
				foreach ($result as $key => $row) { //fat arrow
					echo "<tr>";
                        echo "<td>".sprintf('%08d', $row->patient_id)."</td>";
                        echo "<td>".$row->guarantor_name."</td>";
						echo "<td>".$row->first_name." ".$row->middle_name." ".$row->last_name."</td>";
						echo "<td>".$row->date_created."</td>";
                        echo "<td>".$row->registry_no."</td>";
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
  $('input[name="daterange"]').daterangepicker({
    opens: 'left'
  }, function(start, end, label) {
    console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
    $('#start').val(start.format('YYYY-MM-DD') );
    $('#end').val(end.format('YYYY-MM-DD'));
  });
});


</script>


<script type="text/javascript">
    function archive_patient(id) {
          var r = confirm("Are you sure you want to delete this patient? \nAll bills and transactions of this patient will also be deleted.");
  if (r == true) {
    window.location.href ="archive_patient/"+id ;
  } else {
    //window.location.href ="patients";
  }
    }


</script>

