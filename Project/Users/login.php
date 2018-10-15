<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type ="text/css" href="Reg_style.css">
</head>
<body>
	<div class="header">
		<h2>Login</h2>
	</div>

	<form methon="post" action="login.php" id="regform">
		<div class="input-group">
			<label>Username</label>
			<input type="text" name="username">
		</div>
		<div class="input-group">
			<label>Password</label>
			<input type="password" name="password_1">
		</div>
		<div class="input-group">
			<button type="submit" name="login" class="btn">Login!</button>
		</div>
		<p>
			Not yet a member? <a href="register.php">Sign up</a>
		</p>
	<form>
</body>
</html>