
<form method="post" action="insert_receipt" onsubmit="sub()">
				<!-- page content -->
            				Guarantor:
            				<select name="type" class="form-control" onchange="companydropdown(this.value);" required="" oninvalid="this.setCustomValidity('Select Guarantor Type')" oninput="this.setCustomValidity('')"/>
			                   	<option selected disabled value="">Select Guarantor Type</option>
								<option value="1">HMO</option>
								<option value="2">Corporate</option>
								<option value="3">Government</option>
							</select>
							<div id="companydropdown"></div>

		                    OR Date:<input type="text" name="or_date" class="form-control" readonly="" required="" id="selectdate">
            				OR Number:<a id="p1" style="color: red; display: none;">This Official Receipt Number already exist *</a>
            				<input type="text" name="or_number" class="form-control" required="" oninvalid="this.setCustomValidity('Enter Official Receipt Number')" oninput="this.setCustomValidity('')" onkeyup="checkduplicate(this.value)"/>
            				OR Amount:<input type="text" name="or_amount" class="form-control" required="" oninvalid="this.setCustomValidity('Enter Official Receipt Amount')" oninput="this.setCustomValidity('')"/>
            				&nbsp
            				<input type="submit" onclick="return submit()" name="submit" class="btn btn-success form-control" value="Submit" id="submit">
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

<script>
function checkduplicate(name1) {
  //alert("Successfuly Added");
  var table = 'receipt';
  var column = 'or_number';
  $.ajax({url: "../application/views/ajax/check_duplicate.php?table="+table+"&column="+column+"&name="+name1, success: function(result){
      if (result==1){
      	$("#submit").attr("disabled", "disabled");
      	$("#submit").addClass("btn-danger");
      	$("#submit").removeClass("btn-success");
      	$("#p1").show();
      }
      else {
      	$("#submit").removeAttr("disabled", "disabled");
      	$("#submit").addClass("btn-success");
      	$("#submit").removeClass("btn-danger");
      	$("#p1").hide();
      }
    }});

}
</script>

<script>
function sub() {
  alert("Successfuly Added");
}
</script>
