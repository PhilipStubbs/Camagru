<!DOCTYPE html>
<?php include('./Users/server.php'); ?>
<?php include_once("base.php"); ?>
<html>

<head>
	<title>Login</title>
	<script src="index_scripts.js"></script>
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
		<?php include_once('populate_homepage.php')?>
		<form method="post" action="index.php" >
			<div >
				<button type="submit" name="prev_page" class="btn">Previous Page</button>
				<button type="submit" name="next_page" class="btn">Next Page</button>
			</div>
			
		</form>

	</div>
	<?php include_once('footer_template.php'); ?>
</body>
</html>






		