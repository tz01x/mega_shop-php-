<?php
session_start();
include 'config/database.php';
include 'config/h.php';
confirm_logged_in();
confirm_user_is_stuff_or_suberuser();

$product=isset($_GET['product'])?$_GET['product']:'';
$supplier=isset($_GET['supplier'])?$_GET['supplier']:'';
$catagory=isset($_GET['catagory'])?$_GET['catagory']:'';
$id=isset($_GET['id'])?$_GET['id']:'';
$sql='';
if($product!=''&&$product=='true'){
  $sql='DELETE FROM products WHERE products.id = '.$id.'';
}if($catagory!=''&&$catagory=='true'){
  $sql='DELETE FROM catagory WHERE catagory.id = '.$id.'';

}
if($supplier!=''&&$supplier=='true'){
  $sql='DELETE FROM supplier WHERE supplier.id = '.$id.'';

}
insert($sql);

header( "Location: admin.php" ); die;
// catagory_fk catagory_id
// supplier_fk supplier_id

?>
