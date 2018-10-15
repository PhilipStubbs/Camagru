<?php
	require('connect_database.php');
	// $db = mysqli_connect($servername, $dbuser, $dbpassword, $dbname);
	session_start();

	$username = "";
	$firstname = "";
	$surname = "";
	$email = "";
	$errors = array();


	if (isset($_POST['reg_user']))
	{
		$username = mysqli_real_escape_string($db, $_POST['username']);
		$firstname = mysqli_real_escape_string($db, $_POST['firstname']);
		$surname = mysqli_real_escape_string($db, $_POST['surname']);
		$email = mysqli_real_escape_string($db, $_POST['email']);
		$password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
		$password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

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
			mysqli_query($db, $insert);
			$_SESSION['username'] = $username;
			$_SESSION['firstname'] = $firstname;
			$login_message = "You are now logged in";
			$_SESSION['success'] = $login_message;
			header('Location: ../index.php');
		}
	}

	if (isset($_POST['login']))
	{
		$username = mysqli_real_escape_string($db, $_POST['username']);
		$password = mysqli_real_escape_string($db, $_POST['password']);

		if (empty($username))
		{
			array_push($errors, "Username is required");
		}
		if (empty($password))
		{
			array_push($errors, "Password is required");
		}
		if (count($errors) == 0)
		{
			echo "TEST";
			$password = md5($password);
			$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
			$result = mysqli_query($db, $query);
			if (mysqli_num_rows($result) == 1)
			{
				$_SESSION['username'] = $username;
				$_SESSION['firstname'] = $firstname;
				$login_message = "You are now logged in";
				$_SESSION['success'] = $login_message;
				header('Location: ../index.php');
			}
			else
			{
				array_push($errors, "The Username/Password is incorrect");
			}
		}
	}

	if (isset($_GET['logout']))
	{
		session_destroy();
		unset($_SESSION['username']);
		unset($_SESSION['firstname']);
		header('location: ../index.php');
	}
	
?>