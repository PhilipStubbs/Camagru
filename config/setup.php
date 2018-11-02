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
		confirmcode VARCHAR (1024),
		notify BIT DEFAULT 1,
		date TIMESTAMP NOT NULL default CURRENT_TIMESTAMP)";

	$images = "CREATE TABLE $dbname.images (
		id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
		image LONGTEXT,
		likes INT DEFAULT 0,
		username VARCHAR (255),
		baboon BIT DEFAULT 0,
		camel BIT DEFAULT 0,
		dog BIT DEFAULT 0,
		duck BIT DEFAULT 0,
		fish BIT DEFAULT 0,
		date TIMESTAMP NOT NULL default CURRENT_TIMESTAMP)";

	$comments = "CREATE TABLE $dbname.comments (
		comment_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
		image_id INT NOT NULL,
		comment LONGTEXT,
		comment_user VARCHAR (255),
		comment_date TIMESTAMP NOT NULL default CURRENT_TIMESTAMP)";

	$conn->exec($deleteDB);


	if ($conn->exec($sqldb))
	{
		echo "Database created successfully\n ".rand(0,100)."<BR /> ";
		$conn->exec($users);
		echo "User Table created successfully\n <BR />";
		$conn->exec($images);
		echo "image Table created successfully\n <BR />";
		$conn->exec($comments);
		echo "comments Table created successfully\n <BR />";
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