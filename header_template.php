<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type ="text/css" href="template_style.css">
</head>
<body>
	<div class="Theheader">
	<a href="/index.php" style="text-decoration: none; color:White">
		<h1 class="CamagruStyle">Camagru</h1>
	</a>
		<?php if (isset($_SESSION['username'])): ?>
			<p class="Weloutbut" style="text-align: Center;">Welcome <strong><?php echo $_SESSION['firstname']; ?></strong></p>
			
			<a href="index.php?logout='1'" >
				<div class="headerbutton" style="float: right">
					<p class="headerbut">Logout </p>
				</div>
			</a>
			<a href="/Users/account_settings.php">
				<div class="headerbutton" style="float: left">
					<p class="headerbut"> Account </p>
				</div>
			</a>
			
		<?php endif ?>
		<?php if (!isset($_SESSION['username'])): ?>
		<a href="/Users/login.php?">
			<div class="headerbutton" style="float: right">
				<p class="headerbut">Login </p>
			</div>
		</a>
			
		<a href="/Users/register.php? " >
			<div class="headerbutton" style="float: right">
				<p class="headerbut"> Sign up</p>
			</div>
		</a>
		<?php endif ?>
	</div>

	
</body>
</html>