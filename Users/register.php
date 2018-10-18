<?php include('user_reg.php'); ?>
<!DOCTYPE html>
<script src='https://www.google.com/recaptcha/api.js'></script>
<html>
<head>
	<title>Register</title>
	<link rel="stylesheet" type ="text/css" href="reg_style.css">
	<link rel="stylesheet" type ="text/css" href="../template_style.css">
</head>
<body>
	<?php include_once('../header_template.php'); ?>
	<div class="header">
		<h2>Register</h2>
	</div>

	<form method="post" action="register.php" id="regform">
		<?php include('reg_errors.php'); ?>
		<div class="input-group">
			<label>Username</label>
			<input type="text" name="username" value="<?php echo $username; ?>">
		</div>
		<div class="input-group">
			<label>First name</label>
			<input type="text" name="firstname" value="<?php echo $firstname; ?>">
		</div>
		<div class="input-group">
			<label>Surname</label>
			<input type="text" name="surname" value="<?php echo $surname; ?>">
		</div>
		<div class="input-group">
			<label>Email</label>
			<input type="text" name="email" value="<?php echo $email; ?>">
		</div>
		<div class="input-group">
			<label>Password</label>
			<input type="password" name="password_1">
		</div>
		<div class="input-group">
			<label>Confirm Password</label>
			<input type="password" name="password_2">
		</div>
		<div class="g-recaptcha" data-sitekey="6LfatnUUAAAAANLQGyIaJpbHz-1RRQtVLVFws4Lj"></div>
		<div class="input-group">
			<button type="submit" name="reg_user" class="btn">Register</button>
		</div>
		<p>
			Already a member? <a href="login.php">Sign in</a>
		</p>
	<form>
	<?php include_once('../footer_template.php'); ?>
</body>
</html>