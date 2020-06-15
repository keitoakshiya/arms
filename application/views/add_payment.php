<table id="add_payment" class="display" style="width:100%">
	<thead>
		<th>Company</th>
		<th>Full Name</th>
		<th>Patient Type</th>
		<th>Total Paid Bill</th>
		<th></th>

	</thead>
	<tbody>
		        <?php
			if ($result) {
				foreach ($result as $key => $row) {
					echo "<tr>";
						echo "<td></td>";
						echo "<td>".$row->first_name." ".$row->middle_name." ".$row->last_name."</td>";
						echo "<td>".$row->patient_type."</td>";
						echo "<td></td>"; /*DON"T FORGET TO ADD PESO SIGN ON OTHER PAGES*/
						echo "<td><button class='btn-success'>View</button></td>"; 


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