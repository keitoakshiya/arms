<table id="official_receipt_list2" class="display" style="width:100%; color: #292929;">
	<thead>
		<th>Official Receipt</th>
		<th>Official Receipt Date</th>
		<th>Official Receipt Amount</th>
		<th>Company</th>
		<th>Amount Applied</th>
		<th>Archive</th>
		<th></th>
		<!-- <th></th> -->
	</thead>
	<tbody>

		        <?php
			if ($result) {
				foreach ($result as $key => $row) {
					echo "<tr>";
						echo "<td>".$row->or_number."</a></td>";
						echo "<td>".$row->or_date."</a></td>";
						echo "<td>&#8369;".$row->or_amount."</a></td>";
						echo "<td>".$row->name."</a></td>";
						echo "<td>&#8369;".$row->amount_applied."</a></td>";
						echo "<td>
                        <button style='border: none;' onclick='archive_or(".$row->receipt_id.")'><i class='fa fa-trash' 
                        style='color: #c93434; font-size: 16px;'></i></button></td>";
						
/*						echo "<td><a href='add_patient_to_receipt/".$row->company."/".$row->receipt_id."' >Add</a>						</td>";
						echo "<td><a href='../mark_receipt/".$row->receipt_id."'>Mark as Distributed</a></td>";*/
					echo "</tr>";

				}
			}
		?>

	</tbody>
</table>



<script type="text/javascript">
	$(document).ready( function () {
	    $('#official_receipt_list2').DataTable();
	} );
</script> 

<script type="text/javascript">
    function archive_or(id) {
          var r = confirm("Are you sure you want to archive this Official Receipt?");
  if (r == true) {
    window.location.href ="archive_or/"+id ;
  } else {
    //window.location.href ="patients";
  }
    }


</script>