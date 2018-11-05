<!DOCTYPE html>
<?php include('../Users/server.php'); ?>
<?php 
	if (!$_SESSION || !isset($_SESSION['username']) || empty($_SESSION))
		header('Location: ../index.php');
?>

<?php include('../Users/server.php'); ?>
<?php include_once("../base.php"); ?>
<html>
<head>
	<title>Upload</title>
	<?php include_once("../base.php"); ?>
	<link rel="stylesheet" type ="text/css" href="/Users/reg_style.css">
	<link rel="stylesheet" type ="text/css" href="/template_style.css">
</head>
<body>
	<?php include_once('../header_template.php'); ?>
	<div class="header">
		<h2>Upload an Image</h2>
	</div>


	<form method="post" action="/Content/upload_image_code.php" id="regform" enctype="multipart/form-data">
	<?php if (isset($_SESSION['error'])) : ?>
			<div class="error">
				<h3> 
					<?php
						echo $_SESSION['error'];
						unset($_SESSION['error']);
					?>
				</h3>
			</div>
		<?php endif ?>
	<?php include('../Users/reg_errors.php'); ?>
		<input type="file" name="file">
		<button type="submit" name="uploadsubmit">Upload Image</button>
	</form>
	<?php include_once('../footer_template.php'); ?>
</body>
</html>


 <!-- Go to xampp config , locate php.ini file find for upload_max_filesize variable and increase the size.  -->