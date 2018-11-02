<?php 
	include('../Users/server.php');
	if (!$_SESSION)
		header('Location: ../../index.php');
?>

<?php

if (isset($_POST['save']))
{
	$image = $_POST['image_final'];
	$username = $_SESSION['username'];



	$query = $conn->prepare("INSERT INTO $dbname.images (image ,username) VALUES( :img, :usr)");
	$query->execute(["img"=>$image , "usr"=>$username]);
	
	$_SESSION['message'] = 'Image Posted!';
	unset($_POST['save']);
	header("Location: ../index.php");

}
if (isset($_POST['image_final']))
{
	
	$image = $_POST['image_final'];
	$username = $_SESSION['username'];
	echo $username;


	$query = $conn->prepare("INSERT INTO $dbname.images (image ,username) VALUES( :img, :usr)");
	$query->execute(["img"=>$image , "usr"=>$username]);
	
	unset($_SESSION['image_tmp']);
	unset($_SESSION['image_final']);
	$_SESSION['message'] = 'Image Posted!';
	header("Location: ../index.php");
}
else
{
	$_SESSION['error'] = "Error uploading"; 
	header("Location: ../index.php");
}

?>