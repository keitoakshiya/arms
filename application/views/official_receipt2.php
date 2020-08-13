<table id="official_receipt2" class="display" style="width:100%">
	<thead>
		<th>Company</th>
		<th>Full Name</th>
		<th>Patient Type</th>
		<th>Total Paid Bill</th>


	</thead>
	<tbody>
		        <?php
			if ($result) {
				foreach ($result as $key => $row) {
					echo "<tr>";
						echo "<td>".$row->guarantor_name."</td>";
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
						echo "<td>&#8369;".($row->hospital_bill_payment+$row->professional_bill_payment)."</td>";
						



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


        $('#official_receipt2').DataTable( {
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