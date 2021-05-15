
<table id="or_list_patient" class="display" style="width:100%">
	<thead>
		
		<th>Company Name</th>
		<th>Patient Name</th>
		<th>Date of Payment</th>
		<th>Official Receipt</th>
		<th>Amount Paid</th>

		

	</thead>
	<tbody>

		        <?php
			if ($result) {
				foreach ($result as $key => $row) {
					echo "<tr>";
						echo "<td>".$row->name."</a></td>";
						echo "<td>".$row->first_name." ".$row->middle_name." ".$row->last_name."</td>";
						echo "<td>".$row->pay_date."</td>";
						echo "<td>".$row->or_number."</td>";
						echo "<td>&#8369;".$row->amount_applied."</a></td>";

					echo "</tr>";
				}
			}
		?>
		<tfoot>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>

            

        </tfoot>
        </tbody>
</table>



<script type="text/javascript">
	$(document).ready( function () {
	    $('#or_list_patient').DataTable({
	    	"order": [[ 2, "desc" ]],
	    	dom: 'Bfrtip',
        buttons: [
            'copy', 'excel', 'pdf', 'print'
        ],
	    });
	} );
</script> 





