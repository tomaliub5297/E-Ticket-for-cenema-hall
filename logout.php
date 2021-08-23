
<?php 

if (!session_id()) {
	# code...
	session_start();
}

session_destroy();
header('Location: index.php');

?>