<form method="post" action="/index/main/insert_patient">
	First Name: <input type="text" name="first-name" class="form-control">
	Middle Name: <input type="text" name="middle-name" class="form-control">
	Last Name: <input type="text" name="last-name" class="form-control">
	<input type="submit" name="submit" class="form-control btn btn-success submit-btn">
</form>
<script type="text/javascript">

	$(document).ready(function() {
    $(function () {
      		new PNotify({
	        title: 'Registered',
	        text: 'Prof fee bill'+
	        '<input type="" class="form-control">'+
	        'hosp fee bill'+
	        '<input type="" class="form-control">'+
	        '<input type="submit" class="form-control btn btn-success">',
	        type: 'success',
	        styling: 'bootstrap3'
	    });
    });
});
</script>