<table id="official_receipt_list2" class="display" style="width:100%">
	<thead>
		<th>Official Receipt</th>
		<th>Official Receipt Date</th>
		<th>Official Receipt Amount</th>
		<th>Company</th>
		<th>Amount Applied</th>
		<th></th>
<!-- 		<th></th>
		<th></th> -->
	</thead>
	<tbody>

		        <?php
			if ($result) {
				foreach ($result as $key => $row) {
					echo "<tr>";
						echo "<td>".$row->or_number."</a></td>";
						echo "<td>".$row->or_date."</a></td>";
						echo "<td>".$row->or_amount."</a></td>";
						echo "<td>".$row->name."</a></td>";
						echo "<td>".$row->amount_applied."</a></td>";
						echo "<td>ARCHIVE PAALALA MO</td>";
/*						echo "<td><a href='add_patient_to_receipt/".$row->company."/".$row->receipt_id."' >Add</a>						</td>";
						echo "<td><a href='../mark_receipt/".$row->receipt_id."'>Mark as Distributed</a></td>";*/
					echo "</tr>";

				}
			}
		?>

	</tbody>
</table>

<script type="text/javascript">
	$(document).ready( function () {
	    $('#official_receipt_list2').DataTable();
	} );
</script> 