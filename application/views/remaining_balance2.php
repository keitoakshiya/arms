<table id="remaining_balance2" class="display" style="width:100%; color: #292929;">
    <thead>
        <th>Patient Name</th>
        <th>Date Registered</th>
        <!-- <th>Latest Payment Date</th> -->
        <th>Hospital Bill Balance</th>
        <th>Professional Bill Balance</th>
        <th>Total Balance</th>
        <th>Day Count<div style="font-size:8pt;"> Latest payment up to present date</div></th>
    </thead>
    <script type="text/javascript">
            <?php
                if (isset($start)&&isset($end)) {
                    $start_time = strtotime($start); 
                    $end_time = strtotime($end); 
                    $start_date = date('m/d/y', $start_time);
                    $end_date = date('m/d/y', $end_time);

                    echo "
                    $(window).on('load', function() {
                        $('#daterange').data('daterangepicker').setStartDate('".$start_date."');
                        $('#start').val('".$start_date."');
                        $('#daterange').data('daterangepicker').setEndDate('".$end_date."');
                        $('#end').val('".$end_date."');
                    })
                    ";
                    echo "$('#daterange').val('".$start_date."'+' - '+'".$end_date."');";
                }
                else echo "$('#daterange').val(moment().startOf('year').calendar()+' - '+moment().format('L'));
                            $('#start').val(moment().startOf('year').format('YYYY-MM-DD'));
                            $('#end').val(moment().format('YYYY-MM-DD'));
                ";

            ?>
            </script>
    <tbody>
                <?php
            if ($result) {
                foreach ($result as $key => $row) {
                    echo "<tr>";


                        echo "<td>".$row->first_name." ".$row->middle_name." ".$row->last_name."</td>";
                        echo "<td>".$row->bill_date."</td>";
                        //echo "<td>".$row->pay_date."</td>";
                        //echo "<td>".$row->hospital_bill."</td>";
                        //echo "<td>".$row->professional_bill."</td>";
                        //echo "<td>".$row->total_bill."</td>";
                        //echo "<td>".$row->total_hospital_bill_payment."</td>";
                        //echo "<td>".$row->total_professional_bill_payment."</td>";
                        //echo "<td>".$row->total_payment."</td>";
                        echo "<td>&#8369;".$row->hospital_balance."</td>";
                        echo "<td>&#8369;".$row->professional_balance."</td>";
                        echo "<td>&#8369;".$row->total_balance."</td>";
                        echo "<td>".$row->day_count."</td>";


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


$('#remaining_balance2').DataTable( {
    dom: 'Bfrtip',
    buttons: [
    'copy', 'excel', 'pdf', 'print'
    ],

    initComplete: function () {
        this.api().columns([]).every( function () {
            var column = this;
            var select = $('<select><option value="">All</option></select>')
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

<script type="text/javascript">

$(function() {
  $('input[name="daterange"]').daterangepicker({
    opens: 'left'
  }, function(start, end, label) {
    console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
    $('#start').val(start.format('YYYY-MM-DD') );
    $('#end').val(end.format('YYYY-MM-DD'));
  });
});


</script>
