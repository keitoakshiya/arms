<table id="add_payment" class="display" style="width:100%">
	<thead>
		<th>Receipt</th>
		<th>OR Date</th>
		<th>Amount</th>
		<th>Amount Applied</th>
		<th>Company id</th>
		<th></th>
		<th></th>
	</thead>
	<tbody>

		        <?php
			if ($result) {
				foreach ($result as $key => $row) {
					echo "<tr>";
						echo "<td>".$row->or_number."</a></td>";
						echo "<td>".$row->or_date."</a></td>";
						echo "<td>".$row->or_amount."</a></td>";
						echo "<td>".$row->amount_applied."</a></td>";
						echo "<td>".$row->name."</a></td>";
						echo "<td><a href='../add_patient_to_receipt/".$row->company."/".$row->receipt_id."' >Add</a>						</td>";
						echo "<td><a href='../mark_receipt/".$row->receipt_id."'>Mark as Distributed</a></td>";
					echo "</tr>";

				}
			}
		?>

	</tbody>
</table>

<script type="text/javascript">
	$(document).ready( function () {
	    $('#add_payment').DataTable();
	} );
</script> 