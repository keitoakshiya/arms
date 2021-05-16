<form method="post" action="../update_or" onsubmit="return confirm('Are you sure you want to save the changes?');">
	<?php
	foreach ($result as $key => $row) {
		echo "Guarantor Type:";
			echo '	
				<input type="hidden" name="id" value="'.$row->receipt_id.'">

				<select name="type" class="form-control">
					<option selected disabled value="">Select Guarantor Type</option>
					<option '.($row->name ? 'selected' : '').' value="1">HMO</option>
					<option '.($row->name ? 'selected' : '').' value="2">Corporate</option>
					<option '.($row->name ? 'selected' : '').' value="3">Government</option>
				</select>

				OR Date:<input type="text" name="or_date" class="form-control" readonly="" required="" id="selectdate">
            				OR Number:<input type="text" name="or_number" class="form-control" required="" oninvalid="this.setCustomValidity("Enter Official Receipt Number")" oninput="this.setCustomValidity("")"/>
            				OR Amount:<input type="text" name="or_amount" class="form-control" required="" oninvalid="this.setCustomValidity("Enter Official Receipt Amount")" oninput="this.setCustomValidity("")"/>
            				&nbsp
            				<input type="submit" onclick="return submit()" name="submit" class="btn btn-success form-control">


			';
		}
	?>
	


</form>
