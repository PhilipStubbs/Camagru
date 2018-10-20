<!DOCTYPE html>
<?php include('user_reg.php'); ?>

<?php
	include('connect_database.php');
?>


<html>
<head>
	<title>Account Settings</title>
	<link rel="stylesheet" type ="text/css" href="reg_style.css">
	<link rel="stylesheet" type ="text/css" href="../template_style.css">
</head>
<body>
	<?php include_once('../header_template.php'); ?>
	<div class="account_settings">
		<h2>Account Settings</h2>
	</div>

	<div id="regform" style="width: 60%;">
		<a href="/Users/account_settings/ac_settings_gen.php" >
			<div class="ac_setting_btn">
				<p>General</p>
			</div>
		</a>
		<a href="/Users/account_settings/ac_settings_psw.php" >
			<div class="ac_setting_btn">
				<p>Password</p>
			</div>
		</a>
	</div>

	<?php include_once('../footer_template.php'); ?>
</body>

</html>




	<!-- <div class="input-group">
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
			<input type="email" name="email" value="<?php echo $email; ?>">
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
			<button type="submit" name="reg_user" style="width:97%" class="btn">Update</button>
		</div>
		 -->