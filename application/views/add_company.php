Guarantor:
<form method="post" action="/arms/main/insert_company">
	<select name="type" class="form-control" required>
		<option selected disabled value="">Select Guarantor Type</option>
		<option value="1">HMO</option>
		<option value="2">Government</option>
		<option value="3">Corporate</option>
	</select>
	Company Name: <input type="text" class="form-control" name="name">
	Address: <input type="text" class="form-control" name="address">
	Contact Person: <input type="text" class="form-control" name="contact_person">
	Contact Number: <input type="text" class="form-control" name="contact_number">
	<input type="submit" value="Add Company" class=" form form-control btn btn-success submit-btn">
</form>