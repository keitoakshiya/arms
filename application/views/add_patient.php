<form method="post" action="/arms/main/insert_patient">
	First Name: <input type="text" name="first-name" class="form-control" required>
	Middle Name: <input type="text" name="middle-name" class="form-control">
	Last Name: <input type="text" name="last-name" class="form-control" required>
	Date Registered: <input type="text" name="date" class="form-control" readonly="" required="" id="selectdate">
	<input type="submit" name="submit" class="form-control btn btn-success submit-btn">
</form>


<script>
	$(function() {
	  $('#selectdate').daterangepicker({
	    singleDatePicker: true
	  });
	});
</script>


