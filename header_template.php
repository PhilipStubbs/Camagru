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
			<p class="Weloutbut"><a href="index.php?logout='1'" style="color: White;">Logout</a></p>
		<?php endif ?>
		<?php if (!isset($_SESSION['username'])): ?>
			<p class="RegLogbut"><a href="/Users/login.php?" style="color: White" >Login</a>
				Or 
			<a href="/Users/register.php? " style="color: White">Sign up</a></p>
		<?php endif ?>
	</div>

	
</body>
</html>