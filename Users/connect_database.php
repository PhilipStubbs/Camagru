<?php

$servername = "178.128.45.163";
$dbuser = "notroot@localhost";
$dbpassword = "123456";
$dbname = "camagru_db";
$db = mysqli_connect($servername, $dbuser, $dbpassword, $dbname);

if (!$db) {
	die("Connection failed: " . mysqli_connect_error());
}
return ($db);

?>