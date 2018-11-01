
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

// header('Location: ../index.php');
?>
