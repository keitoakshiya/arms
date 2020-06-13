<table id="patient_list" class="display" style="width:100%">
        <thead>
            <tr>
                <th>first_name</th>
                <th>last_name</th>
                <th>middle_name</th>
                <th>date_created</th>
            </tr>
        </thead>
</table>
<script type="text/javascript">
    $(document).ready(function() {
        $('#patient_list').DataTable( {
            "dataSrc": 'patient_json'
        } );
    } );
</script>