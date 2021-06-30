Guarantor:
<form method="post" action="/arms/main/insert_company" onsubmit="myFunction()">
	<select name="type" class="form-control" required="" oninvalid="this.setCustomValidity('Select Guarantor Type')" oninput="this.setCustomValidity('')"/>
		<option selected disabled value="">Select Guarantor Type</option>
		<option value="1">HMO</option>
		<option value="2">Corporate</option>
		<option value="3">Government</option>
	</select>
	Company Name: <input type="text" class="form-control" name="name" required="" oninvalid="this.setCustomValidity('Enter Company Name')" oninput="this.setCustomValidity('')"/>
	Address: <input type="text" class="form-control" name="address" required="" oninvalid="this.setCustomValidity('Enter Company Address')" oninput="this.setCustomValidity('')"/>
	Contact Person: <input type="text" class="form-control" name="contact_person" required="" oninvalid="this.setCustomValidity('Enter Company Contact Person')" oninput="this.setCustomValidity('')"/>
	Contact Number: <input type="text" class="form-control" name="contact_number" required="" oninvalid="this.setCustomValidity('Enter the Contact Number')" oninput="this.setCustomValidity('')"/>
	<input type="submit" value="Add Company" class=" form form-control btn btn-success submit-btn" value="Submit">
</form>

<script>
function myFunction() {
  alert("Successfuly Added");
}
</script>