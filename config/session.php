<?php
session_start();

//function to check if the session variable member_id is on set
function logged_in() {
	return isset($_SESSION['user_id']);
}

//Check user already logged in or not
function confirm_logged_in() {
	if (!logged_in()) {
		header( "Location: index.php" ); die;
	}
}

function logout_user(){
	unset($_SESSION['MEMBER_ID']);
	unset($_SESSION['FIRST_NAME']);
	unset($_SESSION['LAST_NAME']);
}
?>
<!-- user_id
first_name
last_name -->
