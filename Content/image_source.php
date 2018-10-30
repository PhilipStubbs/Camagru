
<?php
	$data = $_SESSION['image_tmp'];
	$type = $_SESSION['image_type'];
	$ret = "data:".$type.";base64,".$data;
	echo $ret;
?>