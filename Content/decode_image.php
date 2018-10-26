<?php include('../Users/server.php'); ?>
<?php
	$data = $_SESSION['image_tmp'];
	$type = $_SESSION['image_type'];
	$ret = "<img id='theimg' style='width: 70%; height: 100%; object-fit: contain' alt=Embedded Image src=\"data:".$type.";base64,".$data."\" />";
	$_SESSION['src'] = "\"data:".$type.";base64,".$data."\" />";
	echo $ret;
?>