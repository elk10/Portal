<?php
//Start session
SESSION_START();
if(!isset($_SESSION['username'])){
	echo"Please log in to continue";
	die("<br /><a href='index.php'>Log In</a>");
} 
include ('header.php'); ?>
<body>
	<div id="site-container">
		<div class="site-inner">
			<?php
			$username = $_SESSION['username'];
			echo 'Hello'. " " . $username;
			?>
		</div>
	</div>
</body>
</html>