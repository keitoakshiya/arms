<table id="list_company" class="display" style="width:100%; color: #292929;">
	<thead>
		<tr>
            <th>Guarantor Type</th>
            <th>Company</th>
			
		</tr>
	</thead>
	<tbody>

		        <?php
			if ($result) {
				foreach ($result as $key => $row) {
					echo "<tr>";
					if ($row->type == 1) {
                        echo "<td>HMO</td>";
                    }
                    if ($row->type == 2) {
                        echo "<td>Corporate</td>";
                    }
                    if ($row->type == 3) {
                        echo "<td>Government</td>";
                    }
						echo "<td>".$row->name."</td>";

					echo "</tr>";

				}
			}
		?>

	</tbody>

	<tfoot>
		<td></td>
		<td></td>
	</tfoot>
</table>

<script type="text/javascript">
	$(document).ready( function () {
	    $('#list_company').DataTable();
	} );
</script> 

<script type="text/javascript">


        $('#list_company').DataTable( {
                                dom: 'Bfrtip',
        buttons: [
            'copy', 'excel', 'pdf', 'print'
        ],

        initComplete: function () {
            this.api().columns([0]).every( function () {
                var column = this;
                var select = $('<select><option value="">Select Guarantor Type</option></select>')
                    .appendTo( $(column.footer()).empty() )
                    .on( 'change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );
 
                        column
                            .search( val ? '^'+val+'$' : '', true, false )
                            .draw();
                    } );
 
                column.data().unique().sort().each( function ( d, j ) {
                    select.append( '<option value="'+d+'">'+d+'</option>' )
                } );
            } );
        }
    } );
</script>