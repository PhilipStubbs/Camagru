<!DOCTYPE html>
<?php include('../user_reg.php'); ?>
<?php
	include('../connect_database.php');
	$username = $_SESSION['username'];
	$firstname = $_SESSION['firstname'];
	$surname = $_SESSION['surname'];
	$email = $_SESSION['email'];

	if (isset($_POST['username']) && $_POST['username'] != $username)
	{
		$new_username = $_POST['username'];
		$update_user = $conn->prepare("UPDATE $dbname.users SET username= :new WHERE username= :usr AND email= :email");
		$update_user->execute(["new"=>$new_username ,"usr"=>$username, "email"=>$email]);
		$_SESSION['username'] = $new_username;
		header('location: ac_settings_gen.php');
	};
	if (isset($_POST['firstname']) && $_POST['firstname'] != $firstname)
	{
		
		$new_firstname = $_POST['firstname'];
		$update_user = $conn->prepare("UPDATE $dbname.users SET firstname= :new WHERE username= :usr AND email= :email");
		$update_user->execute(["new"=>$new_firstname ,"usr"=>$username, "email"=>$email]);
		$_SESSION['firstname'] = $new_firstname;
		header('location: ac_settings_gen.php');
	};
	if (isset($_POST['surname']) && $_POST['surname'] != $surname)
	{
		$new_surname = $_POST['surname'];
		$update_user = $conn->prepare("UPDATE $dbname.users SET surname= :new WHERE username= :usr AND email= :email");
		$update_user->execute(["new"=>$new_surname ,"usr"=>$username, "email"=>$email]);
		$_SESSION['surname'] = $new_surname;
		header('location: ac_settings_gen.php');
	};
	if (isset($_POST['email']) && $_POST['email'] != $email)
	{
		$new_email = $_POST['email'];
		$update_user = $conn->prepare("UPDATE $dbname.users SET email= :new WHERE username= :usr AND email= :email");
		$update_user->execute(["new"=>$new_email ,"usr"=>$username, "email"=>$email]);
		$_SESSION['email'] = $new_email;
		header('location: ac_settings_gen.php');
	};
	
?>


<html>
<head>
	<title>General Account Settings</title>
	<link rel="stylesheet" type ="text/css" href="/Users/reg_style.css">
	<link rel="stylesheet" type ="text/css" href="/template_style.css">
</head>
<body>
	<?php include_once('../../header_template.php'); ?>
	<div class="account_settings">
		<h2>General Account Settings</h2>
	</div>

	<form method="post" action="ac_settings_gen.php" id="regform" style="width: 60%;">
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
			<input type="email" name="email" value="<?php echo $email; ?>">
		</div>

		<div class="input-group">
			<button type="submit" name="update_gen" class="btn">Update</button>
		</div>
	</form>
	
	<?php include_once('../../footer_template.php'); ?>
</body>

</html>