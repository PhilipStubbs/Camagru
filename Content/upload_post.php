<!DOCTYPE html>

<?php include_once("../base.php"); 
?>

<html>

<head>
	<title>New Post</title>
	<script src="/Content/scripts.js"></script>
	<link rel="stylesheet" type ="text/css" href="../Users/reg_style.css">
	<link rel="stylesheet" type ="text/css" href="/Content/content_style.css">

</head>
<body>
	<?php include_once('../header_template.php'); ?>
	<div class="header" style="width: 60%">
	
		<h2>New Post</h2>
			<form method="post" action="/Content/image_to_db.php">
					<button type="submit" name="submit" class="postbtn">Submit Post</button>
			</form>
	</div>
	<div class="body">
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
		<!-- <img id="theimg" src="data:image/jpeg;base64,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 "> -->
		<canvas id="myCanvas">

		</canvas>
		<script>
			var canvas = document.getElementById("myCanvas");
			var ctx = canvas.getContext('2d');

			var image = document.getElementById("theimg");
			ctx.drawImage(image,0,0);
		</script>
		</div>
		<!-- <?php include_once("decode_image.php"); ?> -->

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

<?php
if (!$_SESSION)
	header('Location: ../../index.php');
?>