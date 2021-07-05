
<table id="or_list" class="display" style="width:100%">
	<thead>
		<th>Company</th>
		<th>Official Receipt</th>
		<th>Official Receipt Date</th>
		<th>Official Receipt Amount</th>
		<th>Amount Applied</th>
		<th></th>


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

						echo "<td>";

            if ($delete == 1) {
            echo "
                    <button style='border: none; background-color: Transparent; background-repeat:no-repeat; overflow: hidden; outline:none;' onclick='delete_official_receipt(".$row->receipt_id.")'><i class='fa fa-trash' style='color:red; font-size: 16px'></i></button>";
                  }
             /*if ($edit == 1) {
                        echo "
                    <button style='border: none; background-color: Transparent; background-repeat:no-repeat; overflow: hidden; outline:none;' onclick=\"location.href = 'edit_official_receipt/".$row->receipt_id."' \"><i class='fa fa-edit' style=' font-size: 16px'></i></button>";
                  }*/
              if ($void == 1) {

                  if($row->is_void == 0){ //User can void Official Receipt
                    echo "<button style='border: none; background-color: Transparent; background-repeat:no-repeat; overflow: hidden; outline:none;' onclick=\"location.href = 'void_official_receipt/".$row->or_number."' \"><i class='fa fa-ban' style=' font-size: 16px'></i></button>";
                  }
                  if($row->is_void == 1){ //User can undo the void of Official Receipt
                    echo "<button style='border: none; background-color: Transparent; background-repeat:no-repeat; overflow: hidden; outline:none;' onclick=\"location.href = 'unvoid_official_receipt/".$row->or_number."' \"><i class='fa fa-undo' style=' font-size: 16px'></i></button>";
                  }
                  if($row->is_void == 2){ //User can void the Official Receipt one last time
                    echo "<button style='border: none; background-color: Transparent; background-repeat:no-repeat; overflow: hidden; outline:none;' onclick=\"location.href = 'permavoid_official_receipt/".$row->or_number."' \"><i class='fa fa-ban' style=' font-size: 16px'></i></button>";
                  }
                  if($row->is_void == 3){ //User cannot undo void of Official Receipt. Official Receipt can no longer be use
                  }
                }
                echo "</td>";

					echo "</tr>";
				}
			}
		?>

	</tbody>

	<tfoot>
		
		<td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
	</tfoot>
</table>


<script type="text/javascript">
	$(document).ready( function () {
	    $('#or_list').DataTable();
	} );
</script> 

<script type="text/javascript">


        $('#or_list').DataTable( {
        "order": [[ 2, "desc" ]],
	    	dom: 'Bfrtip',
        buttons: [
            'copy', 'excel', 'pdf', 'print'
        ],

        initComplete: function() {
      this.api().columns([0]).every(function() {
        var column = this;
        //added class "mymsel"
        var select = $('<select class="mymsel" ><option value="">Select Any</option></select>')
          .appendTo($(column.footer()).empty())
          .on('change', function() {
            var vals = $('option:selected', this).map(function(index, element) {
              return $.fn.dataTable.util.escapeRegex($(element).val());
            }).toArray().join('|');

            column
              .search(vals.length > 0 ? '^(' + vals + ')$' : '', true, false)
              .draw();
          });

        column.data().unique().sort().each(function(d, j) {
          select.append('<option value="' + d + '">' + d + '</option>')
        });
      });
      //select2 init for .mymsel class
      $(".mymsel").select2();
    }
  });
</script>

<script type="text/javascript">
    function delete_official_receipt(id) {
      var r = confirm("Are you sure you want to permanently delete this Official Receipt?");
      var r = confirm("Are you sure you want to continue?");
      if (r == true) {
        window.location.href ="delete_official_receipt/"+id ;
    } else {
    //window.location.href ="patients";
}
}

</script>