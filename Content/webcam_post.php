<!DOCTYPE html>
<?php include('../Users/server.php'); ?>
<?php include_once("../base.php"); 
	if (!$_SESSION)
		header('Location: ../../index.php');
?>

<html>
<head>
	<title>New Post</title>
	<!-- <script src="/Content/webcam_script.js"></script> -->
	<script src="/Content/scripts.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<link rel="stylesheet" type ="text/css" href="/Users/reg_style.css">
	<link rel="stylesheet" type ="text/css" href="/Content/content_style.css">

</head>
<body>
	<?php include_once('../header_template.php'); ?>
	<div class="header" style="width: 60%">
	
		<h2>New Post</h2>
			<!-- <form > -->
				<a href="/Content/image_to_db.php">
					<button type="submit" class="postbtn" onclick="Ajaxsubmit()">Submit Post</button>
					</a>
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
		
		<div class="mainview" id="mainview" style="width: 70%;height: 100%;object-fit: contain">

			<canvas id="myCanvas" style="width: 100%;height: 100%;object-fit: contain; position: absolute;" ></canvas>
			<video style="width: 100%;height: 100%;object-fit: contain" id="videoElement">
			
			
			<script>
				var width = 0, height = 0;
				var canvas = document.getElementById('myCanvas'),
				ctx = canvas.getContext('2d');


				 var video = document.querySelector("#videoElement");

				if (navigator.mediaDevices.getUserMedia)
				{
					navigator.mediaDevices.getUserMedia({video: true})
						.then(function(stream)
						{
							video.srcObject = stream;
							return video.play();
						})
				}

				var width = 0, height = 0;

				var canvas = document.getElementById('myCanvas'),

				ctx = canvas.getContext('2d');
	
				function snapshot()
				{
					var snp = document.getElementById('bottommenu');
					var img = document.createElement('img');
					var context;
					var width = video.offsetWidth
						, height = video.offsetHeight;
					var can;
					can = document.createElement("canvas");
					can.width = width;
					can.height = height;
					context = can.getContext('2d');
					context.drawImage(video, 0, 0, width, height);
					context.drawImage(myCanvas, 0, 0, width, height);
					img.src = can.toDataURL('image/png');
					img.setAttribute("height", "100");
					console.log(img.src);
					snp.insertBefore(img, snp.firstChild);
					img.addEventListener("click", function() {
						Ajax_post(img.src);
						});
					console.log (img);
				}

				function Ajax_post(src)
				{
					if (confirm("Save Photo?"))
					{
		
					$.ajax({

						type:"POST",
						url:'/Content/image_to_db.php',
						
						data:{'action':'submit',
								'image_final':src},

						success:function(responsedata)
							{
							// process on data
							alert("Submited posted!");
							window.location = "index.php";
							}
						})
					}
					
				}
			</script>

				
		</div>
		<button type="submit" name="snapshot" onclick="snapshot()" class="btn" align="centre" title="Snapshot"> Snapshot</button>

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
		<div class="bottommenu" id="bottommenu">
			
		</div>
		<a href="/Content/upload_image.php">
			<button class="btn" >Upload an Image Rather?</button>
		</a>
		</center>
	</div>
	<?php include_once('../footer_template.php'); ?>
</body>
</html>
