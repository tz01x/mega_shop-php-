<?php
session_start();

	unset($_SESSION['user_id']);
	unset($_SESSION['first_name']);
	unset($_SESSION['last_name']);

header( "Location: index.php" ); die;
?>
<!-- user_id
first_name
last_name -->
