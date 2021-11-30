<!DOCTYPE html>
<html>

<head>
	<title>Raptor Gambling</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<style>
		#login_form {
			width: 300px;
			height: 100%;
			top: 15rem;
			margin: auto;
			/* margin-right: -25px; */
			/* padding: auto; */
			position: relative;
			background: linear-gradient(to bottom,
					rgba(101, 70, 214, 0.774) 0%,
					rgba(10, 10, 10, 0.849) 100%);
		}

		body {
			position: relative;
			height: 100%;
			background-image: url("images/backround1.jpg");
			background-size: cover;
			overflow: auto;

		}
	</style>
</head>

<body>
	<div class="container">
		<div id="login_form" class="well">
			<h2>
				<center><span><img src="./images/steamlogo.png" alt="steamlogo" width="150"></span><br> <span style="color: #fff;">Please Login<span></center>
			</h2>
			<hr>
			<form method="POST" action="login.php">
				<h1 style="font-size: small; color:#fff">Username:</h1> <input type="text" name="username" class="form-control" required>
				<div style="height: 10px;"></div>
				<h1 style="font-size: small; color:#fff">Password:</h1> <input type="password" name="password" class="form-control" required>
				<div style="height: 10px;"></div>
				<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-log-in"></span> Login</button> <span style="color: #fff;"> No account? </span><a href="signup.php"> Sign up</a>
			</form>
			<div style="height: 15px;"></div>
			<div style="color: red; font-size: 15px;">
				<center>
					<?php
					session_start();
					if (isset($_SESSION['msg'])) {
						echo $_SESSION['msg'];
						unset($_SESSION['msg']);
					}
					?>
				</center>
			</div>
		</div>
	</div>
</body>

</html>