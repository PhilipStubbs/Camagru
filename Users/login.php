<!DOCTYPE html>
<?php include('user_reg.php'); ?>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type ="text/css" href="reg_style.css">
	<link rel="stylesheet" type ="text/css" href="../template_style.css">
</head>
<body>
	<?php include_once('../header_template.php'); ?>
	<div class="header">
		<h2>Login</h2>
	</div>

	<form method="post" action="login.php" id="regform">
		<?php include('reg_errors.php'); ?>
		<div class="input-group">
			<label>Username</label>
			<input type="text" name="username">
		</div>
		<div class="input-group">
			<label>Password</label>
			<input type="password" name="password">
		</div>
		<div class="input-group">
			<button type="submit" name="login" class="btn">Login</button>
		</div>
		<p>
			Not yet a member? <a href="register.php">Sign up</a>
		</p>
	</form>
	<?php include_once('../footer_template.php'); ?>
</body>

</html>