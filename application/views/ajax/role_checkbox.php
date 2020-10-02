<form method="post">
<div class="row" style="padding-top: 20px; font-family:verdana; font-size: 14px" >
	<?php

		if($_GET['value']){
			$sql = "SELECT * FROM `user` WHERE id = '".$_GET['value']."'";
			$con = mysqli_connect('localhost','root','','arms');
			$query = mysqli_query($con,$sql); 


			while ($row = mysqli_fetch_array($query)) {
				echo "<div class='col-md-3'>";
				echo "View Data:  <input type='checkbox' name='view_data'";
				echo $row['view_data'] == 0 ?  ">" :  "checked>"; 
				echo "</div>";
				echo "<div class='col-md-3'>";
				echo "Add Data:  <input type='checkbox' name='add_data'";
				echo $row['add_data'] == 0 ?  ">" :  "checked>";
				echo "</div>";
				echo "<div class='col-md-3'>";
				echo "Edit Data:  <input type='checkbox' name='edit_data'";
				echo $row['edit_data'] == 0 ?  ">" :  "checked>";
				echo "</div>";
				echo "<div class='col-md-3'>";
				echo "Delete Data:  <input type='checkbox' name='delete_data'";
				echo $row['delete_data'] == 0 ?  ">" :  "checked> ";
				echo "</div>";

			}
			echo "<br>";
			echo "<br>";
			echo "<div class='col-md-12'>";
			echo "<input type='submit' class='btn btn-success'>";
			echo "</div>";
		}

	?>
</div>
</form>
      

            <!-- menu profile quick info -->
            
              
              
                

                </div>
                <div class="col-md-6" style="color: white; padding-left: 1px;">
                 

                </div>
                
              </div>