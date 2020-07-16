<form method="post" action="edit_roles">
	<select onchange="get_role(this.value)" name="id">
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

	</select>
	<div id="checkboxes"></div>

</form>

<?php echo $this->session->userdata('username');?>

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

