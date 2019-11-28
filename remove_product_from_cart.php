<?php
session_start();
require 'config/h.php';
require 'cart.php';
confirm_logged_in();

confirm_user_is_stuff_or_suberuser();
$key=isset($_GET['key'])?$_GET['key']:'';
$success_location=isset($_GET['success_location'])?$_GET['success_location']:'';
$from=isset($_GET['from'])?$_GET['from']:'';
// echo $key,
// $success_location,
// $from;
if($key!=''&&$success_location!=''&&$from!=''){
$c=new Cart($from);
$c->remove_product($key);
header( "Location: ".$success_location."" ); die;
}else{
  header( "Location: index.php" ); die;

}
 ?>
