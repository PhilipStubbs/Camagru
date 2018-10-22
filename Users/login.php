<!DOCTYPE html>
<?php include('user_reg.php'); ?>
<html>
<head>
	<title>Login</title>
	<base href="http://localhost:8080/">
	<!-- <base href="philipstubbs.co.za/"> -->
	<link rel="stylesheet" type ="text/css" href="/Users/reg_style.css">
	<link rel="stylesheet" type ="text/css" href="/template_style.css">
</head>
<body>
	<?php include_once('../header_template.php'); ?>
	<div class="header">
		<h2>Login</h2>
	</div>

	<form method="post" action="/Users/login.php" id="regform">
		<?php include('reg_errors.php'); ?>
		<div class="input-group">
			<label>Username</label>
			<input type="text" name="username"  pattern="[^()/><\][\\\x22,;|]+">
		</div>
		<div class="input-group">
			<label>Password</label>
			<input type="password" name="password"  pattern="[^()/><\][\\\x22,;|]+">
		</div>
		<div class="input-group">
			<button type="submit" name="login" class="btn">Login</button>
		</div>
		<p>

			Cant login? <a href="/Users/cant_login.php">Reset Your Password</a>
		</p>
		<br />
		<p>
			Not yet a member? <a href="/Users/register.php">Sign up</a>
		</p>
	</form>
	<?php include_once('../footer_template.php'); ?>
</body>

</html>