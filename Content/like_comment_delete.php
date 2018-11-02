
<?php 
include_once("../Users/server.php");


if (isset($_POST['action']) && isset($_POST['image_id']))
{
	$action = $_POST['action'];
	$raw_id = $_POST['image_id'];
	$id =  substr($raw_id,3);
	if ($action == 'like')
	{
		$liked = $conn->prepare("UPDATE $dbname.images SET likes = likes + :new WHERE id = :img_id");
		$liked->execute(["new"=>1 ,"img_id"=>$id]);
		$_SESSION['message'] ="Image Liked!";

		$find_email =  $conn->prepare("SELECT * FROM images INNER JOIN users ON users.username = images.username WHERE images.id = :img_id");
		$find_email->execute(["img_id"=>$id]);
		$res= $find_email->fetchAll();
			

		foreach ($res as $tmp)
		{
			$email = $tmp["email"];
			$notify = $tmp['notify'];
		}

		if ($notify == 1)
		{
			sendmail($_SESSION['firstname'] ,$email, $comment, 0);
		}


	}
	else if ($action == 'comment')
	{
		$comment = $_POST['comment'];
		if (!empty($comment))
		{
			$user = $_SESSION['firstname'];
			$insert = "INSERT INTO $dbname.comments (image_id, comment, comment_user) 
					VALUES('$id', '$comment', '$user')";
			$conn->exec($insert);
			$_SESSION['message'] ="Posted : " .$comment;

			$find_email =  $conn->prepare("SELECT * FROM images INNER JOIN users ON users.username = images.username WHERE images.id = :img_id");
			$find_email->execute(["img_id"=>$id]);
			$res= $find_email->fetchAll();
				

			foreach ($res as $tmp)
			{
				$email = $tmp["email"];
				$notify = $tmp['notify'];
			}
			if ($notify == 1)
			{
				sendmail($_SESSION['firstname'] ,$email, $comment, 1);
			}
		}
		else
			$_SESSION['error'] = "No Comment";
	}
	else if ($action == 'delete')
	{
		$username = $_SESSION['username'];
		$query = $conn->prepare("SELECT * FROM $dbname.images WHERE username = :usr AND id = :img_id");
		$query->execute(["usr"=>$username, "img_id"=>$id]);
		$result = $query->fetchAll();
		if (count($result) == 1)
		{
			$query = $conn->prepare("DELETE FROM $dbname.images WHERE username = :usr AND id = :img_id");
			$query->execute(["usr"=>$username, "img_id"=>$id]);
			$_SESSION['message'] = "Post Deleted";
			header("Location : /index.php");
		}
		else
		{
			$_SESSION['error'] = "Error deleting, Not your post?";
			header("Location : /index.php");
		}
	}
}

function sendmail($user ,$address, $user_message, $switch)
{
	$headers = "From: noreply@philipstubbs.co.za\r\n";
	$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

	if ($switch == 1)
	{
		$message = " 
		<h1> $user commented on one of your posts!.</h1>
		
		They Said ".$user_message."<br />

		<h2>Enjoy</h2>
		";
	}
	else 
		$message = " <h1> $user Liked one of your posts!.</h1>
		
		<h2>Enjoy</h2>
		";
	mail($address, "Notification", $message , $headers);
}
// header('Location: ../index.php');
?>
