<?php
session_start();
include("connection.php");

// define variables for validation
$username = ""; $username_err="";
$email =""; $email_err="";
$password =""; $password_err="";


if($_SERVER["REQUEST_METHOD"] == "POST") {
	// username validation
	if(empty($_POST["username"])) {
		$username_err = "Please enter a username";
	} else {
		$username = validate_data($_POST["username"]);
	}
	// email validation 
	if(empty($_POST["email"])) {
		$email_err = "Please enter an email";
	} else {
		$email = validate_data($_POST["email"]);
	}

	// password validation 
	if(empty($_POST["password"])) {
		$password_err = "Please enter a password";
	} else {
		$password = validate_data($_POST["password"]);
	}

	echo $username;
	echo $password;
	echo $email;


}

function validate_data($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toshi Login</title>
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="../css/util.css">
	<link rel="stylesheet" type="text/css" href="../css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<!--Toshi image-->
				<span class="login100-form-title p-b-26">
					Welcome to
				</span>
				<img src="../assets/ToshiWithSlogan1.png" alt="Toshi Logo" width = "340">
				<!--Login Form-->
				<form class="login100-form validate-form" method="POST" action="">
					<!--username-->
					<div class="wrap-input100 validate-input" data-validate="Enter username">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
						<input class="input100" type="text" name="username" id="username">
						<span class="focus-input100" for="username" data-placeholder="Username"></span>
						<span><?php echo $username_err?></span>
					</div>
					<!--Email-->
					<div class="wrap-input100 validate-input" data-validate = "Valid email is: a@b.c">
						<input class="input100" type="text" name="email" id="username">
						<span class="focus-input100" data-placeholder="Email"></span>
					</div>
					<!--Password-->
					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
						<input class="input100" type="password" name="password" id="password">
						<span class="focus-input100" data-placeholder="Password"></span>
					</div>

					<!--Submit -->
					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
								<button class="login100-form-btn">
									<input class="login100-form-bgbtn" type="submit" value="LOGIN">
								</button>
						</div>
					</div>
				</form>
				<div class="text-center p-t-115">
					<span class="txt1">
						Don’t have an account?
					</span>

					<a class="txt2" href="register.html">
						Sign Up
					</a>
				</div>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>