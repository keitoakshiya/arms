<table id="company_list" class="display" style="width:100%">
	<thead>
		<th>Company List</th>
	</thead>
	<tbody>

		        <?php
			if ($result) {
				foreach ($result as $key => $row) {
					echo "<tr>";
						echo "<td><a href='official_receipt_list/".$row->id."'>".$row->name."</a></td>";
					echo "</tr>";

				}
			}
		?>

	</tbody>
</table>

<script type="text/javascript">
	$(document).ready( function () {
	    $('#company_list').DataTable();
	} );
</script> 