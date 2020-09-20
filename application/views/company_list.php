<table id="add_payment" class="display" style="width:100%">
	<thead>
		<th>Guarantor</th>
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
	    $('#add_payment').DataTable();
	} );
</script> 