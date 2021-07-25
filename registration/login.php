<?php include('server.php');

	if(isset($_SESSION['user_id'])){
		header("Location: ../foodfries/foodfries/home.php");
	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
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
		<div class="container-login">
			<div class="wrap">
				<div class="pic js-tilt" data-tilt>
					<img src="images/logo2.png" alt="IMG">
				</div>
				<!--
				<div class="pic-dish" >
					<img src="images/dish.png" alt="IMG">
				</div>
				-->
				<form class="form validate-form" action="server.php" method="post">
					<span class="form-title">
						Member Login
					</span>

					<div class="wrap-input validate-input"  action= "server.php" method = "post">
						<input class="input" type="text" name="email" id="email" placeholder="ID" required>
						<span class="focus-input"></span>
						<span class="symbol-input">
							<i class="fa fa-id-card" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input validate-input" data-validate = "Password is required" action= "server.php" method = "post">
						<input class="input" type="password" name="password" id="password"  placeholder="Password" required>
						<span class="focus-input"></span>
						<span class="symbol-input">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>

					<div class="container-form-btn" action= "server.php" method = "post">
						<button class="form-btn" type="submit" name="log_in" id="log_in">
							Login
						</button>
					</div>

					<div class="text-center p-t-136">
						<a class="txt2" href="register.php">
							Create your Account
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>




<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="js/main_login.js"></script>

</body>
</html>
