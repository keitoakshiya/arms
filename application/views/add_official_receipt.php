
<form method="post" action="insert_receipt">
				<!-- page content -->
            				Guarantor
            				<select name="type" class="form-control" onchange="companydropdown(this.value);" required>
			                   	<option selected disabled value="">Select Guarantor Type</option>
								<option value="1">HMO</option>
								<option value="2">Government</option>
								<option value="3">Corporate</option>
							</select>
							<div id="companydropdown"></div>

		                    OR Date<input type="text" name="or_date" class="form-control" readonly="" required="" id="selectdate">
            				OR number<input type="text" name="or_number" class="form-control" required="">
            				OR amount<input type="text" name="or_amount" class="form-control" required="">
            				&nbsp
            				<input type="submit" onclick="return submit()" name="submit" class="btn btn-success form-control">
		        <!-- /page content -->
</form>

<script type="text/javascript">
	function companydropdown(val) {


		  var xhttp = new XMLHttpRequest();
		  xhttp.onreadystatechange = function() {
		    if (this.readyState == 4 && this.status == 200) {
		     document.getElementById("companydropdown").innerHTML = this.responseText;
		    }
		  };
		  xhttp.open("GET", "../application/views/ajax/guarantor_dropdown.php?value="+val, true);
		  xhttp.send();
			
	}
</script>


<script>
	$(function() {
	  $('#selectdate').daterangepicker({
	    singleDatePicker: true
	  });
	});
	</script>


