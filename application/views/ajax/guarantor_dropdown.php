<?php
	include '../../config/database2.php';
			echo "
		Company:
		<select class='form-control' name='company' required>
			<option selected disabled value=''>Select Company</option>";
			if($_GET['value']){
				$sql = "SELECT * FROM guarantor WHERE type=".$_GET['value'];
				
				//By default, password is blank
				$query = mysqli_query($con,$sql); 

				while ($row = mysqli_fetch_array($query)) {
					echo "<option value='".$row['id']."' >".$row['name']."</option>";
				}
			}
		echo "<select>";
	
	

?>