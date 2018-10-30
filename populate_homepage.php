<?php
	if (isset($_POST['next_page']))
	{
		if(isset($_SESSION['date']))
		{
			$prevdate = $_SESSION['date'];
			$query = $conn->prepare("SELECT * FROM $dbname.images WHERE date < '$prevdate' ORDER BY date DESC LIMIT 5");
			$query->execute();
			$res = $query->fetchAll();
			if (count($res) == 5)
				$_SESSION['date'] = $res[4]['date'];
		}
	}
	else if (isset($_POST['prev_page']))
	{
		if(isset($_SESSION['date']))
		{
			$prevdate = $_SESSION['date'];
			$query = $conn->prepare("SELECT * FROM $dbname.images WHERE date >= '$prevdate' ORDER BY date DESC LIMIT 5");
			$query->execute();
			$res = $query->fetchAll();
			if (count($res) == 5)
				$_SESSION['date'] = $res[4]['date'];
		}
	}
	else
	{
		$query = $conn->prepare("SELECT * FROM $dbname.images ORDER BY date DESC LIMIT 5");
		$query->execute();
		$res = $query->fetchAll();
		if ([$res[4]['date']] != NULL)
		{
			$_SESSION['date'] = $res[4]['date'];
		}
	}

	$type = "image/jpg";
	foreach ($res as $tmp)
	{
		$info = $tmp;
		$data = $info['image'];
		$id = "id_".$info['id'];
		echo $id ;
		$ret = "
					<img id='$id' class='userimage' style='width: 19%; object-fit: contain' onclick='comment_box(this.id)' alt=Embedded Image src=\"data:".$type.";base64,".$data."\" />
				";
		echo $ret;
	}
	
?>
