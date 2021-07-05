<?php
	include '../../config/database2.php';	

	$sql = "SELECT * FROM ".$_GET['table']." WHERE ".$_GET['column']."='".$_GET['name']."'";
	$query = mysqli_query($con,$sql); 

	echo mysqli_num_rows($query);


?>