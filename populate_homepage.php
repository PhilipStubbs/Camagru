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
		$ret = " <div style='width: 50%; height: 100%'>
					<img style='width: 50%; height: 100%; object-fit: contain' alt=Embedded Image src=\"data:".$type.";base64,".$data."\" />
					<input type='text' style='width: 50%; height: 100%' >
				</div>
				";
		echo $ret;
	}
	// echo (count($res));
?>
