<form method="post" action="/arms/main/insert_patient" onsubmit="myFunction()">
	<div class="row">
		<div class="col-md-6">
			Guarantor type:
			<select name="patient-type" class="form-control" onchange="show_guarantors(this.value)" required>
				<option selected disabled value="">Select Guarantor Type</option>
				<option value="1">HMO</option>
				<option value="2">Corporate</option>
				<option value="3">Government</option>
			</select>
			<div id="guarantor_dropdown"></div>
		</div>
		<div class="col-md-6">
			Patient Type:
			<select name="patient_type" class="form-control" required>
				<option selected disabled value="">Select Patient Type</option>
				<option value="1">Inpatient</option>
				<option value="2">Outpatient</option>
				<option value="3">Emergency</option>
			</select>
		</div>						
	</div>

	<div class="row">
		<div class="col-md-4">
			First Name: <input type="text" name="first-name" class="form-control" minlength="2" required>
		</div>
		<div class="col-md-3">
			Middle Name: <input type="text" name="middle-name" class="form-control">	
		</div>

		<div class="col-md-4">
			Last Name: <input type="text" name="last-name" class="form-control" minlength="2" required>
		</div>

		<div class="col-md-1">
			Suffix: <input type="text" name="suffix" class="form-control">
		</div>							
	</div>


	<div class="row">
		<div class="col-md-6">

			Hospital Bill: <input type="number" oninput="this.value = 
			!!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null" class="form-control" min="0" name="hospital_bill" required="">
			
		</div>
		<div class="col-md-6">
			Professional Fee: <input type="number" oninput="this.value = 
			!!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null" class="form-control"  min="0"  name="professional_bill" required="">
			
		</div>						
	</div>
	Registry No. <input type="text" name="registry_no" class="form-control" minlength="8" required>

	Date Registered: <input type="text" name="date" class="form-control" readonly="" required="" id="selectdate">
	
	<input type="submit" name="submit" class="form-control btn btn-success submit-btn" value="Submit">
</form>


<script>
	$(function() {
		$('#selectdate').daterangepicker({
			singleDatePicker: true
		});
	});
</script>

<script type="text/javascript">
	function show_guarantors(val) {

		var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				document.getElementById("guarantor_dropdown").innerHTML = this.responseText;
			}
		};

		xhttp.open("GET", "../application/views/ajax/guarantor_dropdown.php?value="+val, true);
		xhttp.send();
	}
</script>
<script>
function myFunction() {
  alert("Successfuly Added");
}
</script>


