<?php 
	include('../Users/server.php');
	if (!$_SESSION)
		header('Location: ../../index.php');
?>

<?php
if (isset($_POST['submit']))
{
	
	$image = $_SESSION['image_tmp'];
	$username = $_SESSION['username'];
	$baboon = 0;
	$camel = 0;
	$dog = 0;
	$duck = 0;
	$fish = 0;
	echo $username;


	$query = $conn->prepare("INSERT INTO $dbname.images (image ,username) VALUES( :img, :usr)");
	$query->execute(["img"=>$image , "usr"=>$username]);
	
	unset($_SESSION['image_tmp']);
	header("Location: ../index.php");
}

?>