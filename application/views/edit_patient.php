<form method="post" action="../update_patient">

	<?php
		foreach ($result as $key => $row) {
			echo '	
				<input type="hidden" name="id" value="'.$row->patient_id.'">

				First Name:<input type="text" class="form-control" name="fname" value="'.$row->first_name.'" required="">
				Middle Name:<input type="text" class="form-control" name="mname" value="'.$row->middle_name.'" required="">
				Last Name:<input type="text" class="form-control" name="lname" value="'.$row->last_name.'" required="">
				Suffix:<input type="text" class="form-control" name="suffix" value="'.$row->suffix.'" required="">
				Hospital Bill:<input type="text" class="form-control" name="hospital_bill" value="'.$row->hospital_bill.'" required="">
				Professional Bill:<input type="text" class="form-control" name="professional_bill" value="'.$row->professional_bill.'" required="">
				
				Company:<input type="text" class="form-control" name="name" value="'.$row->name.'" required="">
				<br>
				<input type="submit" class="form-control btn btn-success" name="submit">
			';
		}
	?>

	


</form>