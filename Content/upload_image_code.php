<?php include('../Users/server.php'); ?>
<?php

if (isset($_POST['uploadsubmit']))
{
	echo "1";
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
				echo "3";
				if ($fileError === 0)
				{
					if ($fileSize < 5000000)
					{
						$fileNameNew = uniqid('', true).".".$fileActualExt;
						

						$fileDest = 'upload_test/'.$fileNameNew;
						// move_uploaded_file($fileTmpName, $fileDest);
						$imagedata = file_get_contents($fileTmpName);
						
			
						$base64 = base64_encode($imagedata);
						// $_SESSION['image'] = $fileTmpName.".".$fileActualExt;
						$_SESSION['image_tmp'] = $base64;
						$_SESSION['image_type'] = strtolower($fileType);
						header("Location: /Content/upload_post.php");



		// 				$im = file_get_contents('filename.gif');
        // 				$imdata = base64_encode($im); 
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