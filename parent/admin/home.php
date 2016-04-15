<?php
//Start session
SESSION_START();
if(!isset($_SESSION['username'])){
	echo"Please log in to continue";
	die("<br /><a href='index.php'>Log In</a>");
} 
include ('header.php'); ?>
<div id="page-wrapper">
	<div id="page" class="container">
		<div class="title">
			<h2>Home</h2>
		</div>
		<div id="site-container">
			<div class="site-inner">
				<?php
				$username = $_SESSION['username'];
				echo 'Hello'. " " . $username;
				?>
			</div>
		</div>
	</div>
</div>

<?php include ('footer.php'); ?>
