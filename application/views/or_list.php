
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
						echo "<td><button style='border: none;' onclick=\"location.href = 'edit_official_receipt/".$row->receipt_id."' \"><i class='fa fa-edit' 
                        style=' font-size: 16px'></i></button></td>";

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
      this.api().columns([0,2]).every(function() {
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

