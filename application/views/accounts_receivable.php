<table>
	<thead>
		<th>Full Name</th>
		<th>Patient Type</th>
		<th>Hospital Bill</th>
		<th>Professional Fee</th>
		<th>Total</th>
		<th>Date</th>
	</thead>
	<tbody>
		        <?php
			if ($result) {
				foreach ($result as $key => $row) {
					echo "<tr>";
						echo "<td>".$row->first_name." ".$row->middle_name." ".$row->last_name."</td>";
						echo "<td>".$row->patient_type."</td>";
						echo "<td>".$row->hospital_bill."</td>";
						echo "<td>".$row->professional_bill."</td>";
						echo "<td>".($row->hospital_bill+$row->professional_bill)."</td>";
						echo "<td>".$row->date."</td>";
						echo "<td><button class='btn-success'>View</button></td>";
					echo "</tr>";
				}
			}
		?>

	</tbody>
</table>