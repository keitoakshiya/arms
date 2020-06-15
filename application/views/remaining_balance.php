<table id="remaining_balance_list" class="display" style="width:100%">
	<thead>
		<th>Full Name</th>
		<th>Patient Type</th>
		<th>Hospital Bill</th>
		<th>Hospital Bill Balance</th>
		<th>Professional Bill</th>
		<th>Professional Bill Balance</th>
		<th>Total Remaining Balance</th>

	</thead>
	<tbody>
		        <?php
			if ($result) {
				foreach ($result as $key => $row) {
					echo "<tr>";
						echo "<td>".$row->first_name." ".$row->middle_name." ".$row->last_name."</td>";
						echo "<td>".$row->patient_type."</td>";
						echo "<td>&#8369; ".$row->hospital_bill."</td>"; /*DON"T FORGET TO ADD PESO SIGN ON OTHER PAGES*/
						echo "<td></td>";
						echo "<td>&#8369; ".$row->professional_bill."</td>";
						echo "<td></td>";
						echo "<td></td>";


					echo "</tr>";
				}
			}
		?>

	</tbody>
</table>
<script type="text/javascript">
	$(document).ready( function () {
	    $('#remaining_balance_list').DataTable();
	} );
</script>