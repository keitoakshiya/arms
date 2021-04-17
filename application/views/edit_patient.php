<form method="post" action="../update_patient" onsubmit="return confirm('Are you sure you want to save the changes?');">


<?php
	echo "Current Guarantor type is " ;	

			if ($result) {
				foreach ($result as $key => $row) {
					echo "<tr>";

                    if ($row->guarantor_type == 1) {
                        echo "<td>HMO</td>";
                    }
                    if ($row->guarantor_type == 2) {
                        echo "<td>Corporate</td>";
                    }
                    if ($row->guarantor_type == 3) {
                        echo "<td>Government</td>";
                    }
		}
	}
		foreach ($result as $key => $row) {
			echo '	

				<input type="hidden" name="id" value="'.$row->guarantor_id.'">

				<br>
				<select name="type" class="form-control">
					<option selected disabled value="">Select Guarantor Type</option>
					<option value="1">HMO</option>
					<option value="2">Corporate</option>
					<option value="3">Government</option>
				</select>

				Company:<input type="text" class="form-control" name="name" value="'.$row->guarantor_name.'">
			';
		}
	?>

	<?php
	echo "Current Patient type is " ;	
	if ($result) {
		foreach ($result as $key => $row) {
			echo "<tr>";

			if ($row->patient_type == 1) {
				echo "<td><b> Inpatient </b></td>";
			}
			if ($row->patient_type == 2) {
				echo "<td><b> Outpatient </b> </td>";
			}
			if ($row->patient_type == 3) {
				echo "<td><b> Emergency </b></td>";
			}
			echo "</tr>";
		}
	}
		foreach ($result as $key => $row) {
			echo '	
			<input type="hidden" name="id" value="'.$row->patient_id.'">

			<select name="patient_type" class="form-control" required>
				<option selected disabled value="">Select Patient Type</option>
				<option value="1">Inpatient</option>
				<option value="2">Outpatient</option>
				<option value="3">Emergency</option>
			</select>


				First Name:<input type="text" class="form-control" name="fname" value="'.$row->first_name.'" required="">
				Middle Name:<input type="text" class="form-control" name="mname" value="'.$row->middle_name.'" required="">
				Last Name:<input type="text" class="form-control" name="lname" value="'.$row->last_name.'" required="">
				Suffix:<input type="text" class="form-control" name="suffix" value="'.$row->suffix.'" required="">
				Hospital Bill:<input type="text" class="form-control" name="hospital_bill" value="'.$row->hospital_bill.'" required="">
				Professional Bill:<input type="text" class="form-control" name="professional_bill" value="'.$row->professional_bill.'" required="">				
				
				<br>
				<input type="submit" class="form-control btn btn-success" name="submit">
				


			';
		}
	?>
	


</form>
