<?php
if (is_dir('/portal/en/')) 
// is_dir - tells whether the filename is a directory
{
header("Location: http://localhost/portal/en/index.php");
}
elseif (is_dir('/portal/cy/')) {
	header("Location: http://localhost/portal/cy/index.php");
}
?>


