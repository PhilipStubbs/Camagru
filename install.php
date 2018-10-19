<?php
// include('connect_database.php');
if (isset($_POST['value']))
{
	$dbservername = "178.128.45.163";
	$dbuser = "notroot";
	$dbpassword = $_POST['value'];
	$dbname = "camagru_db";

	// $conn = mysqli_connect($dbservername, $dbuser, $dbpassword);


	$opt = [
		PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
		PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
		PDO::ATTR_EMULATE_PREPARES   => false,
	];
	
	
	$conn = new PDO("mysql:host=$dbservername", $dbuser, $dbpassword);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


		


	$deleteDB = " DROP DATABASE $dbname";
	
	$sqldb = "CREATE DATABASE $dbname";

	$users = "CREATE TABLE $dbname.users (
		id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
		username VARCHAR (255) UNIQUE,
		firstname VARCHAR (255),
		surname VARCHAR (255),
		email VARCHAR (255) UNIQUE,
		password VARCHAR (1024),
		confirmed BIT DEFAULT 0,
		confirmcode VARCHAR (1024))";

	$conn->exec($deleteDB);


	if ($conn->exec($sqldb))
	{
		echo "Database created successfully\n ".rand(0,100)."<BR /> ";
		$conn->exec($users);
		echo "User Table created successfully\n <BR />";
		// if ($conn->exec($users))
		// {
			// echo "User Table created successfully\n <BR />";
		// }
		// else
		// {
		// 	echo "User Table FAILED\n <BR />"; 
		// }
		
		
	}
	else
	{
		echo "Error creating database: " . $conn->error;
	}
	$conn->close();
}
?>

<html>
<head>
	<title>Database Controls</title>
	<link rel="stylesheet" type ="text/css" href="./Users/reg_style.css">
</head>
<body>
	<div class="header">
		<h1>Database Controls</h1>
		<h2>Reset Database?</h2>
	</div>

		<form method="post" action="" id="regform">
		<div >
			<center>
				<h3> Enter Database Password? </h3>				
				<input type="password" name="value">
				<input type="submit">
			</center>
		</div>
		</form>
</body>
</html>