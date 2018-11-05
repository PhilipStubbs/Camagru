


<!DOCTYPE html>
<?php include('./Users/server.php'); ?>
<?php include_once("base.php"); ?>
<html>

<head>
	<title>Camagru</title>
	
	<script language="JavaScript" type="text/javascript" src="index_scripts.js"></script>
	<link rel="stylesheet" type ="text/css" href="./Users/reg_style.css">
</head>
<body>
	<?php include_once('header_template.php'); ?>
	<div class="header" style="width: 90%">
	
		
		<h2>Home Page</h2>
		<?php if (isset($_SESSION['username'])): ?>
			<a href="/Content/select_post_type.php">
			<div class="addcontent_btn">
				<h3>New Post</h3>
			</div>
		</a>	
	<?php endif ?>
	</div>
	<div class="content" style="width: 90%" id="homepage">
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
		<div id="myModal" class="modal">
			<?php if (isset($_SESSION['username'])) : ?>
				<form>
					<button class="btn" onclick="Ajaxdelete()">Delete Post as <?php echo $_SESSION['username']?>?</button>
				</form>
			<?php endif ?>
				<span class="close">&times;</span>
				<img class="modal-content" id="img01" style="max-width: 20%;">
				<?php if (isset($_SESSION['username'])) : ?>
					<center>
						<input id="the_comment" type=text pattern="[^()/><\][\\\x22,;|]+">
						<button  class="btn" onclick="Ajaxcomment()">Post Comment</button>
						
						<button class="btn" onclick="Ajaxlike()" >Like</button>
						<br />
					</center>
				<?php endif ?>
				<p id="caption" style="padding: auto;"></p>
		</div>
		<?php include_once('populate_homepage.php')?>
		<form method="post" action="index.php" >
			<div >
				<button type="submit" name="prev_page" class="btn">Starting Page</button>
				<button type="submit" name="next_page" class="btn">Next Page</button>
			</div>
			
		</form>
	
		
		<script>
		
		</script>


	</div>
	<?php include_once('footer_template.php'); ?>
	
</body>
</html>






		