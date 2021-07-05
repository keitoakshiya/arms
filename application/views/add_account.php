<html>
<body>
<form method="post" action="/arms/main/insert_account" onsubmit="sub()">

		Username: <a id="p1" style="color: red; display: none;">This username already exist *</a> 
		<input type="text" name="username" class="form-control" required="" oninvalid="this.setCustomValidity('Enter Username')" oninput="this.setCustomValidity('')" onkeyup="checkduplicate(this.value)"/>
		Password: <input type="password" id="pwd" name="password" class="form-control" minlength="8" required="" oninvalid="this.setCustomValidity('Enter Password. \nPassword should be at least 8 characters long.')" oninput="this.setCustomValidity('')"/>
		E-mail Address: <input type="text" name="email" class="form-control" required="" oninvalid="this.setCustomValidity('Enter E-mail Address')" oninput="this.setCustomValidity('')"/>
		<input type="submit" name="submit" class="form-control btn btn-success submit-btn" value="Submit" id="submit">
		
</form>
	

</body>
</html>


<script>
function checkduplicate(name1) {
  //alert("Successfuly Added");
  var table = 'user';
  var column = 'username';
  $.ajax({url: "../application/views/ajax/check_duplicate.php?table="+table+"&column="+column+"&name="+name1, success: function(result){
      if (result==1){
      	$("#submit").attr("disabled", "disabled");
      	$("#submit").addClass("btn-danger");
      	$("#submit").removeClass("btn-success");
      	$("#p1").show();
      }
      else {
      	$("#submit").removeAttr("disabled", "disabled");
      	$("#submit").addClass("btn-success");
      	$("#submit").removeClass("btn-danger");
      	$("#p1").hide();
      }
    }});

}
</script>

<script>
function sub() {
  alert("Successfuly Added");
}
</script>