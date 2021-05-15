<table id="official_receipt_list" class="display" style="width:100%; color: #292929;">
	<thead>
		<th>Official Receipt</th>
		<th>Official Receipt Date</th>
		<th>Official Receipt Amount</th>
		<th>Company</th>
		<th>Amount Applied</th>
		<th>Applied Status</th>
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
						echo "<td><a style='color:blue' href='../add_patient_to_receipt/".$row->company."/".$row->receipt_id."' >Add Payment</a>						</td>";
						//echo "<td><a href='../mark_receipt/".$row->receipt_id."'><i class='fa fa-check' aria-hidden='true'></i></a></td>";
					echo "</tr>";

				}
			}
		?>

	</tbody>
</table>

<script type="text/javascript">
	$(document).ready( function () {
	    $('#official_receipt_list').DataTable({
		    dom: 'Bfrtip',
	        buttons: [
	            'copy', 'excel', 'pdf', 'print'
	        ],
	    });
	} );
</script> 