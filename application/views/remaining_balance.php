<table id="remaining_balance" class="display" style="width:100%">
	<thead>
        <th>Guarantor Type</th>
		<th>Company</th>
		<th>Total Bill</th>
		<th>Total Balance</th>


	</thead>
	<tbody>
		        <?php
			if ($result) {
				foreach ($result as $key => $row) {
					echo "<tr>";
                    if ($row->type == 1) {
                        echo "<td>HMO</td>";
                    }
                    if ($row->type == 2) {
                        echo "<td>Corporate</td>";
                    }
                    if ($row->type == 3) {
                        echo "<td>Government</td>";
                    }
						echo "<td><a style='color:blue'  href='remaining_balance2/".$row->guarantor_id."'>".$row->name."</td>";
                        //echo "<td>&#8369;".$row->hospital_bill_total."</td>";
                        //echo "<td>&#8369;".$row->professional_bill_total."</td>";
                        echo "<td>&#8369;".$row->total_bill."</td>";
                        //echo "<td>&#8369;".$row->total_hospital_paid."</td>";
                        //echo "<td>&#8369;".$row->total_professional_paid."</td>";
                        //echo "<td>&#8369;".$row->total_paid."</td>";
                        //echo "<td>&#8369;".$row->hospital_bill_balance."</td>";
                        //echo "<td>&#8369;".$row->professional_bill_balance."</td>";
                        echo "<td>&#8369;".$row->total_balance."</td>";




					echo "</tr>";
				}
			}
		?>

	</tbody>
    <tfoot>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tfoot>
</table>

<script type="text/javascript">


        $('#remaining_balance').DataTable( {
                                dom: 'Bfrtip',
        buttons: [
            'copy', 'excel', 'pdf', 'print'
        ],

        initComplete: function () {
            this.api().columns([0]).every( function () {
                var column = this;
                var select = $('<select><option value="">Select Guarantor Type</option></select>')
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

