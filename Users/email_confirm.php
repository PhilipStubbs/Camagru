
<?php
	session_start();
	require('connect_database.php');

	$username = $_GET['username'];
	$confirmcode = $_GET['code'];

	$query = "SELECT * FROM $dbname.users WHERE username='$username' AND confirmcode='$confirmcode'";
	$result = mysqli_query($db, $query);
	if (mysqli_num_rows($result) == 1)
	{
		$update_con = "UPDATE $dbname.users SET confirmed=1 WHERE username='$username' AND confirmcode='$confirmcode'";
		if (mysqli_query($db, $update_con))
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
