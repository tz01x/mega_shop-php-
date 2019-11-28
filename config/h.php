<?php

function logged_in() {
	return isset($_SESSION['user_id']);
}

// Check user already logged in or not
function confirm_logged_in() {
	if (!logged_in()) {
		header( "Location: index.php" ); die;
	}
}

function confirm_user_is_stuff_or_suberuser()
{
  if(isset($_SESSION['is_staff']) && isset($_SESSION['is_superuser']) ){
    if($_SESSION['is_staff']||$_SESSION['is_superuser']){

    }else {
      header( "Location: index.php" ); die;

    }
  }
}

function fetch_data($sql) {
  $result = $GLOBALS['conn']->query($sql);
  if ($result->num_rows > 0) {
      $data = mysqli_fetch_all($result,MYSQLI_ASSOC);
      return $data;
  }else{
    echo $GLOBALS['conn']->error;
    return  array( );
  }
}

 ?>
