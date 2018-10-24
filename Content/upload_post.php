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
		<div class="mainview" id="mainview">
			
			<?php include_once("decode_image.php"); ?>
			<!-- <img class="overlayImage" src="Stickers/baboon.png"> -->
		</div>
		<div class="sidemenu">
			<div>
				<img class="thumbnail" src="Stickers/baboon.png">
				<input type="submit" id="submit" onclick="addSticker('Stickers/baboon.png')" value="Add">
			</div>
			<div>
				<img class="thumbnail" src="Stickers/camel.png">
				<input type="submit" id="submit" onclick="addSticker('Stickers/camel.png')" value="Add">
			</div>
			<div>
				<img class="thumbnail" src="Stickers/dog.png">
				<input type="submit" id="submit" onclick="addSticker('Stickers/dog.png')" value="Add">
			</div>
			<div>
				<img class="thumbnail" src="Stickers/duck.png">
				<input type="submit" id="submit" onclick="addSticker('Stickers/duck.png')" value="Add">
			</div>
			<div>
				<img class="thumbnail" src="Stickers/fish.png">
				<input type="submit" id="submit" onclick="addSticker('Stickers/fish.png')" value="Add">
			</div>
			
		</div>
		<div class="bottommenu">
			
		</div>
		
	</div>
	<?php include_once('../footer_template.php'); ?>
</body>
</html>

