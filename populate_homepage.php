<?php
	$query = $conn->prepare("SELECT * FROM $dbname.images");
	$query->execute();
	$res = $query->fetchAll();

	// for($i = 0; count($res) ; $i++)
	// {
	// echo '<script type="text/javascript">',
	// 	'decodeimage($);',
	// 	'</script>';
	// }
	$type = "image/jpg";
	foreach ($res as $tmp)
	{
		$info = $tmp;
		$data = $info['image'];
		$ret = "<img style='width: 70%; height: 100%; object-fit: contain' alt=Embedded Image src=\"data:".$type.";base64,".$data."\" />";
		echo $ret;
	}
	// echo (count($res));
?>
