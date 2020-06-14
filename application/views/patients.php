<table id="patient_list" class="display" style="width:100%">
        <thead>
            <tr>
                <th>First name</th>
                <th>Middle name</th>
                <th>Last name</th>
                <th>Date created</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        <?php
			if ($result) {
				foreach ($result as $key => $row) {
					echo "<tr>";
						echo "<td>".$row->first_name."</td>";
						echo "<td>".$row->middle_name."</td>";
						echo "<td>".$row->last_name."</td>";
						echo "<td>".$row->date_created."</td>";
						echo "<td><button class='btn-success'>View</button></td>";
					echo "</tr>";
				}
			}
		?>
        </tbody>
</table>
<script type="text/javascript">
	$(document).ready( function () {
	    $('#patient_list').DataTable();
	} );
</script>