<?php
	if (isset($_POST['next_page']))
	{
		if(isset($_SESSION['date']))
		{
			$prevdate = $_SESSION['date'];
			// $query = $conn->prepare("SELECT * FROM $dbname.images LEFT JOIN $dbname.comments ON $dbname.comments.image_id  = $dbname.images.id WHERE date < '$prevdate' ORDER BY date DESC LIMIT 10");
			$query = $conn->prepare("SELECT * FROM $dbname.images WHERE date < '$prevdate' ORDER BY date DESC LIMIT 10");
			$query->execute();
			$res = $query->fetchAll();
			if (count($res) == 10)
				$_SESSION['date'] = $res[9]['date'];
		}
	}
	else if (isset($_POST['prev_page']))
	{
		if(isset($_SESSION['date']))
		{
			$prevdate = $_SESSION['date'];
			// $query = $conn->prepare("SELECT * FROM $dbname.images LEFT JOIN $dbname.comments ON $dbname.comments.image_id  = $dbname.images.id WHERE date >= '$prevdate' ORDER BY date DESC LIMIT 10");
			$query = $conn->prepare("SELECT * FROM $dbname.images WHERE date >= '$prevdate' ORDER BY date DESC LIMIT 10");
			$query->execute();
			$res = $query->fetchAll();
			if (count($res) == 10)
				$_SESSION['date'] = $res[9]['date'];
		}
	}
	else
	{
		// $query = $conn->prepare("SELECT * FROM $dbname.images LEFT JOIN $dbname.comments ON $dbname.comments.image_id  = $dbname.images.id  ORDER BY images.date DESC LIMIT 10");
		$query = $conn->prepare("SELECT * FROM $dbname.images ORDER BY images.date DESC LIMIT 10");
		$query->execute();
		$res = $query->fetchAll();
		if ([$res[9]['date']] != NULL)
		{
			$_SESSION['date'] = $res[9]['date'];
		}
	}

	$type = "image/jpg";
	foreach ($res as $tmp)
	{
		$info = $tmp;
		$data = $info['image'];
		$id = $info['id'];
		if (isset($comments))
			unset($comments);
		$comments = "";
		$comquery = $conn->prepare("SELECT * FROM $dbname.comments WHERE image_id = $id ORDER BY comment_date");
		$comquery->execute();
		$comres = $comquery->fetchAll();
		if (count($comres) > 0)
		{
			foreach ($comres as $comtmp)
			{
				$comments .= "<strong>". $comtmp['comment_user']."</strong>" ." says : ". $comtmp['comment']." <br />";
			}
		}
		$id = "id_".$info['id'];
		$likes = $info['likes'];
		$ret = "
					<img id='$id' class='userimage' style='width: 19%; object-fit: contain' onclick='comment_box(this.id , $likes)' alt='$comments' Image src=\"data:".$type.";base64,".$data."\" />
				";
		echo $ret;
	}
	
?>
