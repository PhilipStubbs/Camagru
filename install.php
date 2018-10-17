<?php
// include('connect_database.php');
$servername = "178.128.45.163";
$username = "notroot";
$password = "123456";
$dbname = "camagru_db";
$port = "3306";

echo rand()."<br>";
$conn = mysqli_connect($servername, $username, $password, $port);

// $users = "CREATE TABLE $dbname.users (
// 	id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
// 	username VARCHAR (255) UNIQUE,
// 	firstname VARCHAR (255),
// 	surname VARCHAR (255),
// 	email VARCHAR (255) UNIQUE,
// 	password VARCHAR (255))";


$users = "CREATE TABLE $dbname.users (
	id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	username VARCHAR (255) UNIQUE,
	firstname VARCHAR (255),
	surname VARCHAR (255),
	email VARCHAR (255) UNIQUE,
	password VARCHAR (1024),
	confirmed BIT DEFAULT 0,
	confirmcode VARCHAR (1024))";
	

$sqldb = "CREATE DATABASE $dbname";
$deleteDB = " DROP DATABASE $dbname";

mysqli_query($conn, $deleteDB);


if (mysqli_query($conn, $sqldb) === TRUE)
{

	echo "Database created successfully\n ".rand(0,100)."<BR /> ";
	if (mysqli_query($conn, $users) === TRUE)
	{
		
		echo "User Table created successfully\n <BR />";
	}
	else
	{
		echo "User Table FAILED\n <BR />"; 
	}
	
	
}
else
{
	echo "Error creating database: " . $conn->error;
}
$conn->close();

?>