<!DOCTYPE html>
<?php
require("config/session.php");
require("config/database.php");
confirm_logged_in();
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
