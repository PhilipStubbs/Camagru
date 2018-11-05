<!DOCTYPE html>
<?php 
	if (!$_SESSION || !isset($_SESSION['username']) || empty($_SESSION))
		header('Location: ../index.php');
?>

<?php 
include_once("../base.php"); 
include_once("../Users/server.php"); 
?>

<html>

<head>
	<title>New Post</title>
	<script src="/Content/scripts.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<link rel="stylesheet" type ="text/css" href="../Users/reg_style.css">
	<link rel="stylesheet" type ="text/css" href="/Content/content_style.css">

</head>
<body>
	<?php include_once('../header_template.php'); ?>
	<div class="header" style="width: 60%">
	
		<h2>New Post</h2>
			<!-- <form > -->
				<!-- <a href="/Content/image_to_db.php"> -->
					<button type="submit" class="postbtn" onclick="Ajaxsubmit()">Submit Post</button>
					<!-- </a> -->
			<!-- </form> -->
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
			<?php include_once("decode_image.php") ?>
			<canvas id="myCanvas" ></canvas>

			<script>
				var c = document.getElementById("myCanvas");
				var ctx = c.getContext("2d");
				var img = document.getElementById("userimage");
				c.style.width  = '70%';
				c.style.height = '100%';
				// c.setAttribute("width", '70%');
		
				c.setAttribute("object-fit", 'contain');
				c.width = img.width;
				c.height = img.height;

				var hRatio = c.width / img.width;
				var vRatio = c.height / img.height;
				var ratio  = Math.min ( hRatio, vRatio );
				ctx.drawImage(img, 0,0, img.width, img.height, 0,0,img.width*ratio, img.height*ratio);

			</script>


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

<?php
if (!$_SESSION)
	header('Location: ../../index.php');
?>

<!-- <?php include_once("decode_image.php"); ?> -->