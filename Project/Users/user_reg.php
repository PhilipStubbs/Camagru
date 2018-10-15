<?php
	require('connect_database.php');
	// $db = mysqli_connect($servername, $dbuser, $dbpassword, $dbname);

	$username = "";
	$firstname = "";
	$surname = "";
	$email = "";
	$errors = array();


	if (isset($_POST['reg_user']))
	{
		$username = mysql_real_escape_string($_POST['username']);
		$firstname = mysql_real_escape_string($_POST['firstname']);
		$surname = mysql_real_escape_string($_POST['surname']);
		$email = mysql_real_escape_string($_POST['email']);
		$password_1 = mysql_real_escape_string($_POST['password_1']);
		$password_2 = mysql_real_escape_string($_POST['password_2']);

		if (empty($username))
		{
			array_push($errors, "Username is required");
		}
		if (empty($firstname))
		{
			array_push($errors, "Firstname is required");
		}
		if (empty($surname))
		{
			array_push($errors, "Surname is required");
		}
		if (empty($email))
		{
			array_push($errors, "Email is required");
		}
		if (empty($password_1) || empty($password_2))
		{
			array_push($errors, "Password is required");
		}
		if ($password_1 != $password_2)
		{
			array_push($errors, "Passwords do not match");
		}
		if (count($errors) == 0)
		{
			$password = md5($password_1);
			$insert = "INSERT INTO users (id, username, firstname, surname, email, password) 
						VALUES('', '$username', '$firstname', '$surname', '$email', '$password')";
			mysql_query($db, $insert);
		}
	}

?>