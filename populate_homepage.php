<?php
	if(isset($_SESSION['date']))
	{
		$prevdate = $_SESSION['date'];
		$query = $conn->prepare("SELECT * FROM $dbname.images WHERE date > $prevdate ORDER BY date DESC");
		$query->execute();
		$res = $query->fetchAll();
		$tmp = $query->fetch();
		$_SESSION['date'] = $tmp['date'];
	}
	else
	{
		$query = $conn->prepare("SELECT * FROM $dbname.images ORDER BY date DESC");
		$query->execute();
		$res = $query->fetchAll();
		$tmp = $query->fetch();
		// $_SESSION['date'] = $tmp['date'];
	}


	$type = "image/jpg";
	foreach ($res as $tmp)
	{
		$info = $tmp;
		$data = $info['image'];
		$ret = " <div style='width: 40%; height: 100%'>
					<img style='width: 40%; height: 50%; object-fit: contain' alt=Embedded Image src=\"data:".$type.";base64,".$data."\" />
					<input type='text' style='width: 50%; height: 100%' >
				</div>
				";
		echo $ret;
	}
?>
