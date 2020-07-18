<form method="post" action="edit_roles">
	<div style="font-size: 16px;"><p> You are logged in as: <b> 
		<?php echo $this->session->userdata('username');?> </p></b></div>

	<p><select onchange="get_role(this.value)" name="id" class="form-control">
		<option >Please select a user</option>
		<?php
		    if (!isset($result)) {

		     }
			else if ($result) {
				foreach ($result as $key => $row) {
					echo "<option value='".$row->id."'>".$row->username."</option>";	
				}
			}
		?>

	</select></p>

	<div id="checkboxes" style="font-size: 15px;"></div>

</form>



<script type="text/javascript">
	function get_role(val) {

  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
     document.getElementById("checkboxes").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "../application/views/ajax/role_checkbox.php?value="+val, true);
  xhttp.send();
}
</script>

