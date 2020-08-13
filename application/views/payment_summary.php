<table id="payment_summary" class="display" style="width:100%">
	<thead>
		<th>Company</th>
		<th>Full Name</th>
		<th>Patient Type</th>
		<th>Hospital Bill</th>
		<th>Paid Hospital Bill</th>
		<th>Professional Bill</th>
		<th>Paid Professional Bill</th>
		<th>Total Paid Bill</th>

	</thead>
	<tbody>
		        <?php
			if ($result) {
				foreach ($result as $key => $row) {
					echo "<tr>";
						echo "<td>".$row->name."</td>";
						echo "<td>".$row->first_name." ".$row->middle_name." ".$row->last_name."</td>";

						if ($row->patient_type==0) {
							echo "<td>Not Registered</td>";
						}

						else if ($row->patient_type==1) {
							echo "<td>Inpatient</td>";
						}

						else if ($row->patient_type==2) {
							echo "<td>Outpatient</td>";
						}

						else if ($row->patient_type==3) {
							echo "<td>Emergency</td>";
						}

						else{
							echo "<td></td>";
						}

						echo "<td>&#8369;".$row->hospital_bill."</td>"; /*DON"T FORGET TO ADD PESO SIGN ON OTHER PAGES*/
						echo "<td>&#8369;".$row->hospital_bill_payment."</td>";
						echo "<td>&#8369;".$row->professional_bill."</td>";
						echo "<td>&#8369;".$row->professional_bill_payment."</td>";
						echo "<td>&#8369;".($row->hospital_bill_payment+$row->professional_bill_payment)."</td>";



					echo "</tr>";
				}
			}
		?>

	</tbody>
</table>

<script type="text/javascript">


        $('#payment_summary').DataTable( {
                                dom: 'Bfrtip',
        buttons: [
            'copy', 'excel', 'pdf', 'print'
        ],

        initComplete: function () {
            this.api().columns([0,2]).every( function () {
                var column = this;
                var select = $('<select><option value="">All</option></select>')
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

