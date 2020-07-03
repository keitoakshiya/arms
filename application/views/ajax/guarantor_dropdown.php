<?php
	
			echo "
		Company:
		<select class='form-control'>
			<option selected disabled>Select Company</option>";
			if($_GET['value']){
				$sql = "SELECT * FROM guarantor WHERE type=".$_GET['value'];
				$con = mysqli_connect('localhost','root','','arms');
				$query = mysqli_query($con,$sql); 

				while ($row = mysqli_fetch_array($query)) {
					echo "<option>".$row['name']."</option>";
				}
			}
		echo "<select>";
	
	

?>