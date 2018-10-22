<!DOCTYPE html>
<?php include('./Users/user_reg.php'); ?>
<?php include_once("base.php"); ?>

<html>

<head>
	<title>Login</title>
	<link rel="stylesheet" type ="text/css" href="./Users/reg_style.css">
</head>
<body>
	<?php include_once('header_template.php'); ?>
	<div class="header">
		<h2>Home Page</h2>
	</div>
	<div class="content">
		<?php if (isset($_SESSION['message'])) : ?>
			<div class="error success">
				<h3> 
					<?php
						echo $_SESSION['message'];
						unset($_SESSION['message']);
					?>
				</h3>
			</div>
		<?php endif ?>
		<?php if (isset($_SESSION['error'])) : ?>
			<div class="error">
				<h3> 
					<?php
						echo $_SESSION['error'];
						unset($_SESSION['error']);
					?>
				</h3>
			</div>
		<?php endif ?>
		
	</div>
	<?php include_once('footer_template.php'); ?>
</body>
</html>


	<!-- <?php if (isset($_SESSION['username'])): ?>
			<p>Welcome <strong><?php echo $_SESSION['firstname']; ?></strong> <br />
			<a href="index.php?logout='1'" style="color: red;">Logout</a></p>
			<?php endif ?>
		<?php if (!isset($_SESSION['username'])): ?>
			<p><a href="./Users/login.php?" >Login</a></p>
			<p><a href="./Users/register.php?">Sign up</a></p>
		<?php endif ?> -->