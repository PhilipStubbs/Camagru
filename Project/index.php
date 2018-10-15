<!DOCTYPE html>
<?php include('./Users/user_reg.php'); ?>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type ="text/css" href="./Users/reg_style.css">
</head>
<body>
	<div class="header">
		<h2>Home Page</h2>
	</div>
	<div class="content">
		<?php if (isset($_SESSION['success'])) : ?>
			<div class="error success">
				<h3> 
					<?php
						echo $_SESSION['success'];
						unset($_SESSION['success']);
					?>
				</h3>
			</div>
		<?php endif ?>
		<?php if (isset($_SESSION['username'])): ?>
			<p>Welcome <strong><?php echo $_SESSION['firstname']; ?></strong></p>
			<p><a href="index.php?logout='1'" style="color: red;">Logout</a></p>
		<?php endif ?>
		<?php if (!isset($_SESSION['username'])): ?>
			<p><a href="./Users/login.php?" >Login</a></p>
			<p><a href="./Users/register.php?">sign up</a></p>
		<?php endif ?>
		
	</div>
	
</body>
</html>