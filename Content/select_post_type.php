<!DOCTYPE html>
<?php include('../Users/server.php'); ?>
<?php include_once("../base.php"); ?>

<?php
	if (!$_SESSION)
		header('Location: ../../index.php');
	include('../Users/connect_database.php');
?>

<html>
<head>
	<title>Post Type</title>
	<link rel="stylesheet" type ="text/css" href="/Users/reg_style.css">
	<link rel="stylesheet" type ="text/css" href="/template_style.css">
</head>
<body>
	<?php include_once('../header_template.php'); ?>
	<div class="account_settings">
		<h2>Post Type</h2>
	</div>

	<div id="regform" style="width: 60%;">
		<a href="/Content/webcam_post.php" style="text-decoration: none;" >
			<div class="ac_setting_btn">
				<p>Webcam</p>
			</div>
		</a>
		<a href="/Content/upload_image.php" style="text-decoration: none;" >
			<div class="ac_setting_btn">
				<p>Upload Image</p>
			</div>
		</a>
	</div>
	
	<?php include_once('../footer_template.php'); ?>
</body>

</html>