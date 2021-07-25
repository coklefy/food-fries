<?php include('server.php') ?>
  <!DOCTYPE html>
  <html>
    <head>
      <title>Register</title>
    	<meta charset="UTF-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
    <!--===============================================================================================-->
    	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
    <!--===============================================================================================-->
    	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    	<link rel="stylesheet" type="text/css" href="css/util.css">
    	<link rel="stylesheet" type="text/css" href="css/main.css">
    <!--===============================================================================================-->
</head>
<body>
  <div class="limiter">
   <div class="container-register">
    <div class="wrap">
      <div class="pic js-tilt" data-tilt>
        <img src="images/register.png" alt="IMG">
      </div>

      <form class="form validate-form" method="post" action="server.php">
        <span class="form-title">
          Client registration
        </span>

         <div class="wrap-input validate-input" data-validate = "Valid email is required: ex@abc.xyz" action="server.php" method = "post">
            <input class="input" type="text" name="email" id="email" placeholder="Email">
            <span class="focus-input"></span>
            <span class="symbol-input">
              <i class="fa fa-envelope" aria-hidden="true"></i>
            </span>
          </div>

          <div class="wrap-input validate-input" data-validate="Password is required" action="server.php" method = "post">
						<input class="input" type="password" name="password" id="password" placeholder="Password">
						<span class="focus-input"></span>
						<span class="symbol-input">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>

          <div class="wrap-input" data-validate ="Name is required" action="server.php" method = "post">
            <input class="input" type="text" name="name" id="name" placeholder="Name">
            <span class="focus-input"></span>
            <span class="symbol-input">
              <i class="fa fa-user-o" aria-hidden="true"></i>
            </span>
          </div>

          <div class="wrap-input" data-validate ="Surname is required" action="server.php" method = "post">
            <input class="input" type="text" name="surname" id="surname" placeholder="Surname">
            <span class="focus-input"></span>
            <span class="symbol-input">
              <i class="fa fa-user-o" aria-hidden="true"></i>
            </span>
          </div>

          <div class="container-form-btn" action="server.php" method="post">
						<button class="form-btn" type="submit" id="register_user" name="register_user">
							Register
						</button>
					</div>
  	      <p>
  		       Already a member? <a href="login.php">Sign in</a>
  	      </p>
        </form>
        </div>
       </div>
      </div>
     </body>
    </html>
