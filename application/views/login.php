<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Login</title>

    <!-- Bootstrap -->
    <!-- <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet"> -->

    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="build/css/custom.min.css" rel="stylesheet">

  <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="../application/views/assets/images/logo.png" />

  <style>
  .modal-header, h4, .close {
    background-color: #bf1f1f;
    color:white !important;
    text-align: center;
    font-size: 30px;
    padding: 5px;
  }

  </style>
</head>
<body>

    <div style="background-image: url('build/images/hosplogo.png'); padding: 100px 100px; background-repeat: no-repeat; background-size: 100% auto">
    <div class="modal-dialog">

    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="font-family:verdana; padding:25px ;">
          
          <h4></h4>
          <h3><span>Accounts Receivable Management System</span></h3>
            <img src="build/images/logo2.png" alt="arms logo" width="80" height="70">
          

        </div>

        <div class="modal-body" style="padding:30px 50px;">
          <section class="login_content">
            <form method="post" action="/arms/main/login_validation">
              
              <div>
                <input type="text" class="form-control" placeholder="Username" name="username" required="" />
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" name="password" required="" />
              </div>
              <div style="padding-left: 10px;">
                <input type="submit" name="login" class="form-control btn btn-success submit-btn" value="Login" style="float: right; ">
                <!-- <a class="reset_pass" href="#">Lost your password?</a> -->
              </div>
              <br>
                <div>
          
          
         <!-- <p>Not a member? <a href="#">Sign Up</a></p> -->
          <p>Forgot <a href="Welcome">Password?</a></p> 
        </div>
              
            </form>
          </section>
          </div>
        </div>
      </div>
 
<script>
$(document).ready(function(){
  $("#myBtn").click(function(){
    $("#myModal").modal();
  });
});
</script>
</div>
</body>
</html>
