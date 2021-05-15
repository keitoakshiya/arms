
<table id="or_list" class="display" style="width:100%">
	<thead>
		<th>Company</th>
		<th>Official Receipt</th>
		<th>Official Receipt Date</th>
		<th>Official Receipt Amount</th>
		<th>Amount Applied</th>

	</thead>
	<tbody>

		        <?php
			if ($result) {
				foreach ($result as $key => $row) {
					echo "<tr>";
						echo "<td>".$row->name."</a></td>";
						echo "<td><a style='color:blue' href='or_list_patient/".$row->or_number."'>".$row->or_number."</td>";
						echo "<td>".$row->or_date."</a></td>";
						echo "<td>&#8369;".$row->or_amount."</a></td>";
						echo "<td>&#8369;".$row->amount_applied."</a></td>";
					echo "</tr>";
				}
			}
		?>

	</tbody>
</table>

<script type="text/javascript">
	$(document).ready( function () {
	    $('#or_list').DataTable({
	    	"order": [[ 2, "desc" ]],
	    	dom: 'Bfrtip',
        buttons: [
            'copy', 'excel', 'pdf', 'print'
        ],
	    });
	} );
</script> 





