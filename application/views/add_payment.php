<table id="add_payment" class="display" style="width:100%">
	<thead>
		<th>Date of Transaction</th>
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
						echo "<td>".$row->transaction_datecreated."</td>";
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
						
						echo "<td><button class='btn-success'><a href='../view_bill_by_patient/".$row->patient_id."' style = 'color:white;'>Add Payment</a></button></td>"; 


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