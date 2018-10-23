<!DOCTYPE html>
<?php include('../Users/server.php'); ?>
<?php include_once("../base.php"); 
if (!$_SESSION)
	header('Location: ../../index.php');
?>

<html>

<head>
	<title>New Post</title>
	<script src="/Content/scripts.js"></script>
	<link rel="stylesheet" type ="text/css" href="/Users/reg_style.css">
	<link rel="stylesheet" type ="text/css" href="/Content/content_style.css">

</head>
<body>
	<?php include_once('../header_template.php'); ?>
	<div class="header" style="width: 60%">
	
		
		<h2>New Post</h2>
		<a href="index.php">
			<div class="postit_btn" >
				<h3>Post!</h3>
			</div>
		</a>
	</div>
	<div class="content" style="width: 60%; height: 100%">
		<?php if (isset($_SESSION['message'])) : ?>
			<div class="error success">
				<h3> 
					<?php
						echo $_SESSION['message'];
						unset($_SESSION['message']);
					?>
				</h3>
			</div>
		<?php endif ?>
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
		<div class="mainview">
		<!-- <center><video id="video()" width="640" height="480" autoplay></video></center> -->
			<p>test</p>
		</div>
		<div class="sidemenu">
			<p>test</p>
		</div>
		<div class="bottommenu">
			<p>test</p>
		</div>
		
	</div>
	<?php include_once('../footer_template.php'); ?>
</body>
</html>

