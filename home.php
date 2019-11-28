<!DOCTYPE html>
<?php
session_start();
require("config/database.php");
// function to check if the session variable member_id is on set
function logged_in() {
	return isset($_SESSION['user_id']);
}

// Check user already logged in or not
function confirm_logged_in() {
	if (!logged_in()) {
		header( "Location: index.php" ); die;
	}
}
?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <?php include'index_header.html' ?>
    <title></title>
    <?php include'nav.php' ?>

  </head>

  <body>
<div class="mtg_t">
  <h1>this is home page</h1>
  <h2>Welcome
  <?php echo $_SESSION['first_name']." ".$_SESSION['last_name']?> - Web Developer
  <small>Since 2011</small>

</div>

  </h2>
  </body>
</html>
<!-- user_id
first_name
last_name -->
