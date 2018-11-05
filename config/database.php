<?php

if ($_SERVER['REQUEST_URI'] == "/config/database.php")
	header('Location: ../../index.php');

$servername = "localhost";
$dbuser = "root";
$dbpassword = "";
$dbname = "camagru_db";


$opt = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];


$conn = new PDO("mysql:host=$servername;dbname=$dbname", $dbuser, $dbpassword, $opt);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}
return ($conn);

?>