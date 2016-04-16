<?php
session_start();
session_destroy();
include('header.php');
?>
<div id="page-wrapper">
	<div id="page" class="container">
<?php
echo 'You have been logged out. <a href="parent/index.php">Go back</a>';
?>
</div>
</div>
<?php
include('footer.php');
