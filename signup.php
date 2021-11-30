<!DOCTYPE html>
<html>

<head>
	<title>Raptor Gambling</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<style>
		#signup_form {
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
	<?php error_reporting(E_ERROR | E_PARSE); ?>
	<?php require './steamauth/steamauth.php' ?>
	<?php require './steamauth/userInfo.php' ?>


	<div class="container">
		<div id="signup_form" class="well">
			<h2>
				<center><span></span> <img src="./images/steamlogo.png" width="150"></center>
			</h2>
			<hr>
			<form method="POST" action="register.php">
				<center><?php echo loginbutton() ?></center>
				<?php
				if (isset($_SESSION['steamid'])) {
				?>
					<br>
					<center><img src="<?php echo $steamprofile['avatar'] ?>" alt="avatar"></center>
					<h1 style="font-size: small; color:#fff">Steam Name:</h1> <input type="text" name="name" class="form-control" value="<?php echo $steamprofile['personaname'] ?>" readonly>
					<div style="height: 10px;"></div>
					<h1 style="font-size: small; color:#fff">Username: </h1><input type="text" name="username" class="form-control" value="<?php echo $steamprofile['personaname'] ?>" required>
					<div style="height: 10px;"></div>
					<h1 style="font-size: small; color:#fff">Password:</h1> <input type="password" name="password" class="form-control" required>
				<?php
				} else {
				?>
					<h1 style="font-size: small; color:#fff">Steam Name: </h1><input type="text" name="name" class="form-control" value="Login with steam first" readonly>
					<div style="height: 10px;"></div>
					<h1 style="font-size: small; color:#fff">Username:</h1> <input type="text" name="username" class="form-control" value="Login with steam first" readonly>
					<div style="height: 10px;"></div>
					<h1 style="font-size: small; color:#fff">Password: </h1><input type="password" name="password" class="form-control" readonly>
				<?php
				}
				?>
				<div style="height: 10px;"></div>
				<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Sign Up</button> <a href="index.php"> Back to Login</a>
			</form>
			<div style="height: 15px;"></div>
			<div style="color: red; font-size: 15px;">
				<center>
					<?php
					// session_start();
					if (isset($_SESSION['sign_msg'])) {
						echo $_SESSION['sign_msg'];
						unset($_SESSION['sign_msg']);
					}
					?>
				</center>
			</div>
		</div>
	</div>
</body>

</html>