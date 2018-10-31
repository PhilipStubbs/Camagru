
<?php 
include_once("../Users/server.php");

$_SESSION['message'] ="fghfgh liked!";
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
	else
	{
		$comment = $_POST['comment'];
		$user = $_SESSION['firstname'];
		$insert = "INSERT INTO $dbname.comments (image_id, comment, comment_user) 
				VALUES('$id', '$comment', '$user')";
		$conn->exec($insert);
		$_SESSION['message'] ="Posted : " .$comment;
	}
}

	
?>
