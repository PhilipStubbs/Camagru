<?php

$servername = "localhost";
$dbuser = "root";
$dbpassword = "";
$dbname = "camagru_db";
$db = mysqli_connect($servername, $dbuser, $dbpassword, $dbname);

if (!$db) {
	die("Connection failed: " . mysqli_connect_error());
}
return ($db);

?>