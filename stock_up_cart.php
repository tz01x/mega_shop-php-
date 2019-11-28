<?php
// require 'config/session.php';
session_start();
// require 'config/database.php';
require 'cart.php';
require 'config/h.php';
confirm_logged_in();
confirm_user_is_stuff_or_suberuser();
$update=isset($_POST['update'])?$_POST['update']:'';
$quantity=isset($_POST['quantity'])?$_POST['quantity']:'';
$product_id=isset($_POST['id'])?$_POST['id']:'';
$product_price=isset($_POST['price'])?$_POST['price']:'';
$name=isset($_POST['name'])?$_POST['name']:'';

if($_SERVER['REQUEST_METHOD']=='POST' && is_array($_POST) && !empty($update) && !empty($quantity)
    && !empty($product_id)&& !empty($product_price)&& !empty($name)){
      $success_location='./restock.php';
      if($update=='true'){
        $success_location='./stock_edit.php';

      }
  if(isset($_SESSION['stock'])){
    // echo $update,'  ', $quantity;
    $cart=new Cart('stock');
    $cart->add_to_cart($update,
    $quantity,
    $product_id,
    $product_price,
    $name,$success_location);
    echo "ok";
  }else{

    // $obj = array('' => , );
    $_SESSION['stock']=array();
    $cart=new Cart('stock');
    $cart->add_to_cart($update,
    $quantity,
    $product_id,
    $product_price,
    $name,$success_location);



  }
  // echo '<div class="jumbotron">
  // '.$name.'
  // </div>';
  echo "41ok";


}else {
  // code...
  echo '<div class="jumbotron">

  <h4>  OPPS ,something wrong ! </h4>
  </div>';
}

?>
