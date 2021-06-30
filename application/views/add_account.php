<html>
<body>
<form method="post" action="/arms/main/insert_account" onsubmit="myFunction()">

		Username: <input type="text" name="username" class="form-control" required="" oninvalid="this.setCustomValidity('Enter Username')" oninput="this.setCustomValidity('')"/>
		Password: <input type="password" id="pwd" name="password" class="form-control" minlength="8" required="" oninvalid="this.setCustomValidity('Enter Password. \nPassword should be at least 8 characters long.')" oninput="this.setCustomValidity('')"/>
		E-mail Address: <input type="text" name="email" class="form-control" required="" oninvalid="this.setCustomValidity('Enter E-mail Address')" oninput="this.setCustomValidity('')"/>
		<input type="submit" name="submit" class="form-control btn btn-success submit-btn" value="Submit">
		
</form>
	

</body>
</html>


<script>
function myFunction() {
  alert("Successfuly Added");
}
</script>