<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Chat Rooms</title>

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<style>
	.title {
		color: lightblue;
		font-size: x-large;
		float: right;
		margin-right: 30px;
	}
</style>
<?php require 'fetch_coins.php' ?>
<nav class="navbar navbar-default">
	<div class="container-fluid">
		<div class="navbar-header">
			<a class="navbar-brand" href="./index.php"></a>
		</div>
		<?php if ($coins <= 0) { ?>
			<ul class="nav navbar-nav">
				<li><a href="index.php"><span><img src="./images/favicon.png" alt="logo" width="25"></span><span class="title" style="color: #aa6c39 ;">Raptor Gambling</span> </a></li>
			</ul>

			<ul class="nav navbar-nav navbar-right">
				<li><a href="./index.php" data-toggle="modal">
						<span><i class='fab fa-btc'></i></span> Roulette Game
					</a></li>
				<li class="nav-item">
					<a class="nav-link disabled" href="#" data-toggle="tooltip" title="NO COINS 😞"><span><i class="fas fa-dollar-sign"></i></span> Betting</a>
				</li>
				<li class="divider"></li>
				<li><a href="./chatpage.php" data-toggle="modal">
						<span><i class='fas fa-comment-dots'></i></span> Chat Rooms
					</a></li>
				<li class="divider"></li>
				<li><a href="#" data-toggle="modal" data-toggle="tooltip" title="ASK ADMIN FOR COINS">
						<span><i class="fas fa-coins"></i></span> Coins <?php echo $coins ?>
					</a></li>
				<li class="divider"></li>
				<li><a href="#account" data-toggle="modal"><span class="glyphicon glyphicon-lock"></span> <?php echo $user; ?></a></li>

				<li class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
					<ul class="dropdown-menu">

						<li><a href="#photo" data-toggle="modal"><span class="glyphicon glyphicon-picture"></span> Update Profile Photo</a></li>
						<li class="divider"></li>
						<li><a href="#logout" data-toggle="modal"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
					</ul>
				</li>
			</ul>
	</div>
</nav>
<?php
		} else {
?>
	<ul class="nav navbar-nav">
		<li><a href="index.php"><span><img src="./images/favicon.png" alt="logo" width="25"></span><span class="title" style="color: #aa6c39 ;">Raptor Gambling</span> </a></li>
	</ul>

	<ul class="nav navbar-nav navbar-right">
		<li><a href="./index.php" data-toggle="modal">
				<span><i class='fab fa-btc'></i></span> Roulette Game
			</a></li>
		<li><a href="./betting.php" data-toggle="modal">
				<span><i class="fas fa-dollar-sign"></i></span> Betting
			</a></li>
		<li class="divider"></li>
		<li><a href="./chatpage.php" data-toggle="modal">
				<span><i class='fas fa-comment-dots'></i></span> Chat Rooms
			</a></li>
		<li class="divider"></li>
		<li><a href="#" data-toggle="modal" data-toggle="tooltip" title="ASK ADMIN FOR MORE COINS">
				<span><i class="fas fa-coins"></i></span> <span >Coins </span><?php echo $coins ?>
			</a></li>
		<li class="divider"></li>
		<li><a href="#account" data-toggle="modal"><span class="glyphicon glyphicon-lock"></span> <?php echo $user; ?></a></li>

		<li class="dropdown">
			<a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
			<ul class="dropdown-menu">

				<li><a href="#photo" data-toggle="modal"><span class="glyphicon glyphicon-picture"></span> Update Profile Photo</a></li>
				<li class="divider"></li>
				<li><a href="#logout" data-toggle="modal"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
			</ul>
		</li>
	</ul>
	</div>
	</nav>
<?php
		}
?>

<script>
	$(function() {
		$('[data-toggle="tooltip"]').tooltip()
	})
</script>