<form method="post" action="../update_patient" onsubmit="return confirm('Are you sure you want to save the changes?');">


<?php

	
		foreach ($result as $key => $row) {
			echo '	
			<input type="hidden" name="id" value="'.$row->patient_id.'">
	

				First Name:<input type="text" class="form-control" name="fname" value="'.$row->first_name.'" required="">
				Middle Name:<input type="text" class="form-control" name="mname" value="'.$row->middle_name.'" required="">
				Last Name:<input type="text" class="form-control" name="lname" value="'.$row->last_name.'" required="">
				Suffix:<input type="text" class="form-control" name="suffix" value="'.$row->suffix.'" required="">		
				
				<br>
				<input type="submit" class="form-control btn btn-success" name="submit">
				


			';
		}
	?>
	


</form>
