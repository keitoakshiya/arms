<!DOCTYPE html>
<html>
<head>
   <title>ARMS Login</title>

   <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
   <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
   <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
   <!------ Include the above in your HEAD tag ---------->

   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

   <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
   <!-- Meta, title, CSS, favicons, etc. -->
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">


   <!-- Bootstrap -->
   <!-- <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet"> -->

   <!-- Font Awesome -->
   <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
   <!-- NProgress -->
   <link href="vendors/nprogress/nprogress.css" rel="stylesheet">
   <!-- Animate.css -->
   <link href="vendors/animate.css/animate.min.css" rel="stylesheet">

   <!-- Custom Theme Style -->
   <!-- <link href="build/css/custom.min.css" rel="stylesheet"> -->
   <link href="../application/build/css/design.css" rel="stylesheet">

   <!-- Favicon -->
   <link rel="shortcut icon" type="image/x-icon" href="../application/views/assets/images/logo.png" />

   <style>
      body {
       font-family: "Lato", sans-serif;
    }



    .main-head{
       height: 150px;
       background: #FFF;

    }

    .sidenav {
       height: 100%;
       background-image: url('build/images/hosplogo3.png'); /*Black*/
       background-repeat: no-repeat;
       overflow-x: hidden;
       padding-top: 20px;
       background-size: cover;
    }


    .main {
       padding: 0px 10px;
    }

    @media screen and (max-height: 450px) {
       .sidenav {padding-top: 15px;}
    }

    @media screen and (max-width: 450px) {
       .login-form{
        margin-top: 10%;
     }

     .register-form{
        margin-top: 10%;
     }
  }

  @media screen and (min-width: 768px){
    .main{
     margin-left: 40%; 
  }

  .sidenav{
     width: 40%;
     position: fixed;
     z-index: 1;
     top: 0;
     left: 0;
  }

  .login-form{
     margin-top: 80%;
  }

  .register-form{
     margin-top: 20%;
  }
}


.login-main-text{
 margin-top: 20%;
 padding: 60px;
 color: #000 /*#fff*/;
}

.login-main-text h3{
 font-weight: 300;
 font-family:verdana;
 font-size: 20px;
}

.btn-black{
 background-color: #000 !important;
 color: #fff;
}

img{
   width: 25%;
   height:25%;
   float:right;
   margin-top:5%;
   margin-right: 5%;
}
</style>
</head>
<body>


   <div class="sidenav">
      
   </div>
   <div class="main">
      <div class="col-md-6 col-sm-12">
         <div class="login-form login-main-text">
            <img src="build/images/logo_circle.png" alt="arms logo">
            <h3>Accounts Receivable <br>Management System</h3>  
            <p>Login Page</p>
            <br>
            <section class="login_content">
               <form method="post" action="/arms/main/login_validation">
                  <div class="form-group">
                     <label>User Name</label>
                     <input type="text" class="form-control" placeholder="Username" name="username" required="" />
                  </div>
                  <div class="form-group">
                     <label>Password</label>
                     <input type="password" class="form-control" placeholder="Password" name="password" required="" />
                  </div>
                  <div>
                   <input type="submit" name="login" class="form-control btn btn-success submit-btn" value="Login">
                   <!-- <a class="reset_pass" href="#">Lost your password?</a> -->
                </div>
                <br>
                <div>
                  <!-- <p>Not a member? <a href="#">Sign Up</a></p> -->
                  <p>Forgot <a href="Welcome">Password?</a></p> 
               </div>
               <div class="right">
                  
               </div>
            </form>
         </section>
      </div>
   </div>
</div>
</body>
</html>