<?php
include('database.php');
if (isset($_POST['value']) && $_POST['value'] == $dbpassword)
{

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
		
	}
	else
	{
		echo "Error creating database: " . $conn->error;
	}
}
?>

<html>
<head>
	<title>Database Controls</title>
	<?php include_once("../base.php"); ?>
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