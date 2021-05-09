<form method="post" action="../update_company" onsubmit="return confirm('Are you sure you want to save the changes?');">
	<?php
	foreach ($result as $key => $row) {
		echo "Guarantor Type:";
			echo '	
				<input type="hidden" name="id" value="'.$row->guarantor_id.'">

				<select name="type" class="form-control">
					<option selected disabled value="">Select Guarantor Type</option>
					<option '.($row->type ? 'selected' : '').' value="1">HMO</option>
					<option '.($row->type ? 'selected' : '').' value="2">Corporate</option>
					<option '.($row->type ? 'selected' : '').' value="3">Government</option>
				</select>

				Company:<input type="text" class="form-control" name="name" value="'.$row->name.'">
				Address:<input type="text" class="form-control" name="address" value="'.$row->address.'">
				Contact Person:<input type="text" class="form-control" name="contact_person" value="'.$row->contact_person.'">
				Contact Number:<input type="text" class="form-control" name="contact_number" value="'.$row->contact_number.'">		
				
				<br>
				<input type="submit" class="form-control btn btn-success" name="submit">
				


			';
		}
	?>
	


</form>
