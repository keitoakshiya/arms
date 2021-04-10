<table id="company_list" class="display" style="width:100%">
	<thead>
		<th>Patient name</th>
		<th>Date of transaction</th>
		<th>hospital_bill_payment</th>
		<th>professional_bill_payment</th>
		<th></th>

	</thead>
	<tbody>

		        <?php
			if ($result) {
				foreach ($result as $key => $row) {
					echo "<tr>";
						echo "<td><a>".$row->first_name." ".$row->middle_name." ".$row->last_name."</a></td>";
						echo "<td><a>".$row->date_created."</a></td>";
						echo "<td><a>".$row->hospital_bill_payment."</a></td>";
						echo "<td><a>".$row->professional_bill_payment."</a></td>";
						echo "<td><a href='delete_transaction/".$row->id."'>undo</td>";
					echo "</tr>";

				}
			}
		?>

	</tbody>
</table>

<script type="text/javascript">
	$(document).ready( function () {
	    $('#company_list').DataTable({
	    	"order": [[ 1, "desc" ]]
	    });
	} );
</script> 

