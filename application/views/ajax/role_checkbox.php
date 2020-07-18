<form method="post">

	<?php

		if($_GET['value']){
			$sql = "SELECT * FROM `user` WHERE id = '".$_GET['value']."'";
			$con = mysqli_connect('localhost','root','','arms');
			$query = mysqli_query($con,$sql); 


			while ($row = mysqli_fetch_array($query)) {
				echo "<p>View Data:  <input type='checkbox' name='view_data'";
				echo $row['view_data'] == 0 ?  ">" :  "checked>"; 
				echo "<br>  Add Data:  <input type='checkbox' name='add_data'";
				echo $row['add_data'] == 0 ?  ">" :  "checked>";
				echo "<br>  Edit Data:  <input type='checkbox' name='edit_data'";
				echo $row['edit_data'] == 0 ?  ">" :  "checked>";
				echo "<br>  Delete Data:  <input type='checkbox' name='delete_data'";
				echo $row['delete_data'] == 0 ?  ">" :  "checked> </p>";
			}
			echo "<input type='submit' class='btn btn-success'>";
		}

	?>

</form>