<?php include('../Users/server.php'); ?>
<?php
	$data = $_SESSION['image_tmp'];
	$ret = "<img style='width: 100%; height: 100%; object-fit: contain' alt=Embedded Image src=\"data:image/png;base64,".$data."\" />";
	echo $ret;
?>