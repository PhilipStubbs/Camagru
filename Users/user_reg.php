<?php
	require('connect_database.php');
	session_start();

	$username = "";
	$firstname = "";
	$surname = "";
	$email = "";
	$errors = array();


	if (isset($_POST['reg_user']))
	{
		$secret = '6LfatnUUAAAAAMZLInZrUL3RVhHojCeHuLKA9den';
		if (isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response']) && !is_null($_POST['g-recaptcha-response']))
		{
			$response = $_POST["g-recaptcha-response"];
			$url = 'https://www.google.com/recaptcha/api/siteverify';
			$data = array(
				'secret' => '6LfatnUUAAAAAMZLInZrUL3RVhHojCeHuLKA9den',
				'response' => $_POST["g-recaptcha-response"]
			);
			$options = array(
				'http' => array (
					'method' => 'POST',
					'content' => http_build_query($data)
				));
			$context  = stream_context_create($options);
			$verify = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret={$secret}&response={$response}");
			$captcha_success=json_decode($verify);
			if ($captcha_success->success==false) {
				array_push($errors, "reCAPTCHA Error, Please try again");
			}
		}
		else
		{
			array_push($errors, "Are you a Robot? Confirm to proceed.");
		}

		$username = mysqli_real_escape_string($db, $_POST['username']);
		$firstname = mysqli_real_escape_string($db, $_POST['firstname']);
		$surname = mysqli_real_escape_string($db, $_POST['surname']);
		$email = mysqli_real_escape_string($db, $_POST['email']);
		$password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
		$password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

		$username_query = "SELECT * FROM $dbname.users WHERE username='$username'";
			$result_1 = mysqli_query($db, $username_query);
		$email_equery = "SELECT * FROM $dbname.users WHERE email='$email'";
			$result_2 = mysqli_query($db, $email_equery);

		if (mysqli_num_rows($result_1) > 0)
			array_push($errors, "Username already in use");
		if (mysqli_num_rows($result_2) > 0)
			array_push($errors, "Email already in use");
		if (empty($username))
			array_push($errors, "Username is required");
		if (empty($firstname))
			array_push($errors, "Firstname is required");
		if (empty($surname))
			array_push($errors, "Surname is required");
		if (empty($email))
			array_push($errors, "Email is required");
		if (empty($password_1) || empty($password_2))
			array_push($errors, "Password is required");
		if ($password_1 != $password_2)
			array_push($errors, "Passwords do not match");
		if (count($errors) == 0)
		{
			$password = hash("whirlpool", $password_1);

			$confirmcode = hash("ripemd160", $username);
			// $confirmcode = rand();
			$insert = "INSERT INTO $dbname.users (username, firstname, surname, email, password, confirmcode) 
						VALUES('$username', '$firstname', '$surname', '$email', '$password', '$confirmcode')";
			mysqli_query($db, $insert);

			$headers = "From: noreplay@philipstubbs.co.za"  . "\r\n" . "Content-Type: text/html; charset=ISO-8859-1\r\n";
			$message = " 
			<h1>Activate Your Account.</h1>
			Click the link below to Verify your account <br />
			<br />
				For <strong>Localhost Activation </strong> use the following : <br />
					http://localhost:8080/Camagru/Users/email_confirm.php?username=$username&code=$confirmcode <br />
			<br />
				For  <strong>Server Activation </strong> use the following : <br />
					http://philipstubbs.co.za/Users/email_confirm.php?username=$username&code=$confirmcode <br />

			<h2>Enjoy</h2>
			";
			mail($email, "Activation email", $message , $headers);
			$login_message = "Check Your Email for the Activation link";
			$_SESSION['message'] = $login_message;
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
			$password = hash("whirlpool", $password);
			$query = "SELECT * FROM $dbname.users WHERE username='$username' AND password='$password'";
			$result = mysqli_query($db, $query);

			$is_confirm = "SELECT * FROM $dbname.users WHERE username='$username' AND password='$password' AND confirmed='1'";
			$is_confirmed_res = mysqli_query($db, $is_confirm);
			if (mysqli_num_rows($result) == 1 && mysqli_num_rows($is_confirmed_res) == 1)
			{
				$findfirstname = "SELECT firstname FROM $dbname.users WHERE username='$username' AND password='$password'";
				$findemail = "SELECT email FROM $dbname.users WHERE username='$username' AND password='$password'";
				$firstname = mysqli_query($db, $findfirstname);
				$email = mysqli_query($db, $findemail);
				$tmp_name = mysqli_fetch_array($firstname);
				$tmp_name2 = mysqli_fetch_array($email);

				$_SESSION['username'] = $username;
				$_SESSION['firstname'] = $tmp_name['firstname'];
				$_SESSION['email'] = $tmp_name2['email'];
				$login_message = "You are now logged in";
				$_SESSION['message'] = $login_message;
				header('Location: ../index.php');
			}
			else if (mysqli_num_rows($result) == 0)
			{
				array_push($errors, "The Username/Password is incorrect");
			}
			else if (mysqli_num_rows($result) == 1 && mysqli_num_rows($is_confirmed_res) == 0)
			{
				array_push($errors, "Account is not active! Check your email.");
			}
		}
	}

	if (isset($_GET['logout']))
	{
		session_destroy();
		unset($_SESSION['username']);
		unset($_SESSION['firstname']);
		unset($_SESSION['email']);
		header('location: index.php');
	}
	
?>