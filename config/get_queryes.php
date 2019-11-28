<?php
require("config/database.php");


function fatch_data($sql) {
  $result = $GLOBALS['conn']->query($sql);
  if ($result->num_rows > 0) {
      $data = mysqli_fetch_all($result,MYSQLI_ASSOC);
      return $data;
  }else{
    return FALSE;
  }
}
 ?>
