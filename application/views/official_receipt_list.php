<table id="add_payment" class="display" style="width:100%">
	<thead>
		<th>Receipt</th>
		<th>OR Date</th>
		<th>Amount</th>
		<th>Company ID(join mo)</th>
	</thead>
	<tbody>

		        <?php
			if ($result) {
				foreach ($result as $key => $row) {
					echo "<tr>";
						echo "<td>".$row->or_number."</a></td>";
						echo "<td>".$row->or_date."</a></td>";
						echo "<td>".$row->or_amount."</a></td>";
						echo "<td>".$row->company."</a></td>";
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