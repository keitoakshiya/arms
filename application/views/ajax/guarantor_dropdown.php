<?php
	
			echo "
		Company:
		<select class='form-control' name='company'>
			<option selected disabled>Select Company</option>";
			if($_GET['value']){
				$sql = "SELECT * FROM guarantor WHERE type=".$_GET['value'];
				$con = mysqli_connect('localhost','root','','arms');
				$query = mysqli_query($con,$sql); 

				while ($row = mysqli_fetch_array($query)) {
					echo "<option value='".$row['id']."' >".$row['name']."</option>";
				}
			}
		echo "<select>";
	
	

?>