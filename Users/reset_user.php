

<?php
	session_start();
	require('connect_database.php');

	$username = $_GET['username'];
	$confirmcode = $_GET['code'];

	$query = $conn->prepare("SELECT * FROM $dbname.users WHERE username = :usr AND confirmcode = :con ");
	$query->execute(["usr"=>$username , "con"=>$confirmcode]);
	$result = $query->fetchAll();

		
	if (count($result) == 1)
	{
		$update_con = "UPDATE $dbname.users SET confirmed=1 WHERE username='$username' AND confirmcode='$confirmcode'";
		if ($conn->exec($update_con))
		{
			$login_message = "Your account is active! You can now login!";
			$_SESSION['message'] = $login_message;
		}
		else
		{
			$_SESSION['error'] = "Error Authenticating";
		}
		header('Location: ../index.php');
	}
	else
	{
		$error = "Problem Authenticating";
		$_SESSION['error'] = $error;
		header('Location: ../index.php');
	}
?>


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

	<form method="post" action="reset_users.php" id="regform">
		<?php include('reg_errors.php'); ?>
		<div class="input-group">
			<label>Email</label>
			<input type="text" name="email">
		</div>
		<div class="input-group">
			<button type="submit" name="login" class="btn">Login</button>
		</div>

		<br />
		<p>
			Not yet a member? <a href="register.php">Sign up</a>
		</p>
	</form>
	<?php include_once('../footer_template.php'); ?>
</body>

</html>