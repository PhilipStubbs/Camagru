<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "camagru_db";


$conn = mysqli_connect($servername, $username, $password);

$users = "CREATE TABLE $dbname.users (
	id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	username VARCHAR (255) UNIQUE,
	firstname VARCHAR (255),
	sirname VARCHAR (255),
	email VARCHAR (255) UNIQUE,
	password VARCHAR (255),
	confirmed BIT DEFAULT 0 NOT NULL,
	connumber VARCHAR(50))";

	

$sqldb = "CREATE DATABASE $dbname";
$deleteDB = " DROP DATABASE $dbname";

mysqli_query($conn, $deleteDB);


if (mysqli_query($conn, $sqldb) === TRUE)
{

	echo "Database created successfully\n <BR />";
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