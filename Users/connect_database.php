<?php

$servername = "178.128.45.163";
$dbuser = "notroot";
$dbpassword = "123456";
$dbname = "camagru_db";


$opt = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];


$db = mysqli_connect($servername, $dbuser, $dbpassword, $dbname);
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $dbuser, $dbpassword, $opt);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if (!$db) {
	die("Connection failed: " . mysqli_connect_error());
}
return ($db);

?>