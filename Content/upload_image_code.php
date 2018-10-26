<?php include('../Users/server.php'); ?>
<?php
	include('merge_picture.php');
if (isset($_POST['uploadsubmit']))
{
	if (isset($_FILES['file']['name']) && !empty($_FILES['file']['name']))
	{
		$file = $_FILES['file'];

		$fileName = $file['name'];
		$fileTmpName = $file['tmp_name'];
		$fileSize = $file['size'];
		$fileError = $file['error'];
		$fileType = $file['type'];

		$fileExt = explode('.', $fileName);
		$fileActualExt = strtolower(end($fileExt));

		$sizeCheck = getimagesize($fileTmpName);

		$allowed = array('jpg', 'jpeg', 'png');
		if (in_array($fileActualExt, $allowed))
		{
			if ($sizeCheck)
			{
				if ($fileError === 0)
				{
					if ($fileSize < 5000000)
					{
						// merge_picture($fileTmpName, "../Stickers/baboon.png", '../tmp.jpg', 0 , 0);
						test($fileTmpName, "../Stickers/baboon.png", '../tmp.jpg');
						$imagedata = file_get_contents('../tmp.jpg');
						$base64 = base64_encode($imagedata);
						$_SESSION['image_tmp'] = $base64;
						$_SESSION['image_type'] = strtolower($fileType);
						header("Location: /Content/upload_post.php");
					}
					else
					{
						$_SESSION['error'] = "Your File is too big, 5mb max";
						header("Location: /Content/upload_image.php?Size_fail");
					}
				}
				else
				{
					$_SESSION['error'] = "Error Uploading";
					header("Location: /Content/upload_image.php?Upload_fail");
				}
			}
			else 
			{
				$_SESSION['error'] = "Conflicting ext types";
				header("Location: /Content/upload_image.php?Ext_fail");
			}
		}
		else
		{
			$_SESSION['error'] = "$fileActualExt is not allowed! <br />
			jpg, jpeg or png ONLY";
			header("Location: /Content/upload_image.php?Ext_fail");
		}
	}
		
	
	else
	{
		$_SESSION['error'] = "Require a file!";
		header("Location: /Content/upload_image.php?Input_fail");
	}

}

?>