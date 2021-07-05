Guarantor:
<form method="post" action="/arms/main/insert_company" onsubmit="sub()">
	<select name="type" class="form-control" required="" oninvalid="this.setCustomValidity('Select Guarantor Type')" oninput="this.setCustomValidity('')"/>
		<option selected disabled value="">Select Guarantor Type</option>
		<option value="1">HMO</option>
		<option value="2">Corporate</option>
		<option value="3">Government</option>
	</select>
	Company Name: <a id="p1" style="color: red; display: none;">This company already exist *</a>
	<input type="text" class="form-control" name="name" required="" oninvalid="this.setCustomValidity('Enter Company Name')" oninput="this.setCustomValidity('')" onkeyup="checkduplicate(this.value)"/>
	Address: <input type="text" class="form-control" name="address" required="" oninvalid="this.setCustomValidity('Enter Company Address')" oninput="this.setCustomValidity('')"/>
	Contact Person: <input type="text" class="form-control" name="contact_person" required="" oninvalid="this.setCustomValidity('Enter Company Contact Person')" oninput="this.setCustomValidity('')"/>
	Contact Number: <input type="text" class="form-control" name="contact_number" required="" oninvalid="this.setCustomValidity('Enter the Contact Number')" oninput="this.setCustomValidity('')"/>
	<input type="submit" value="Add Company" class=" form form-control btn btn-success submit-btn" value="Submit" id="submit">
</form>

<script>
function checkduplicate(name1) {
  //alert("Successfuly Added");
  var table = 'guarantor';
  var column = 'name';
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