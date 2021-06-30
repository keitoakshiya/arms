<table id="official_receipt_list" class="display" style="width:100%; color: #292929;">
	<thead>
		<th>Official Receipt</th>
		<th>Official Receipt Date</th>
		<th>Official Receipt Amount</th>
		<th>Company</th>
		<th>Amount Applied</th>
		<th>Status</th>
		<th></th>
	</thead>
	<tbody>

		<?php
		if ($result) {
			foreach ($result as $key => $row) {
				echo "<tr>";
				echo "<td>".$row->or_number."</a></td>";
				echo "<td>".$row->or_date."</a></td>";
				echo "<td>&#8369;".$row->or_amount."</a></td>";
				echo "<td>".$row->name."</a></td>";
				echo "<td>&#8369;".$row->amount_applied."</a></td>";
				echo "<td>".$row->applied_stat."</a></td>";
				echo "<td>";
				if($row->applied_stat=="Unapplied"){
					echo "<a style='color:blue' href='../add_patient_to_receipt/".$row->company."/".$row->receipt_id."' >Add Payment</a>";
				}
				echo "</td>";
						//echo "<td><a href='../mark_receipt/".$row->receipt_id."'><i class='fa fa-check' aria-hidden='true'></i></a></td>";
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
		<td></td>
		<td></td>
		<td></td>
	</tfoot>
</table>

<script type="text/javascript">
	$(document).ready( function () {
		$('#official_receipt_list').DataTable();
	} );
</script> 

<script type="text/javascript">


	$('#official_receipt_list').DataTable( {
		dom: 'Bfrtip',
		buttons: [
		'copy', 'excel', 'pdf', 'print'
		],

		initComplete: function () {
			this.api().columns([5]).every( function () {
				var column = this;
				var select = $('<select><option value="">Select Status</option></select>')
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