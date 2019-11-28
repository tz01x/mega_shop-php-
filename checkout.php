<?php
require 'config/database.php';
require 'cart.php';
session_start();
if (!isset($_SESSION['user_id'])) {
  header( "Location: index.php" ); die;
}

function fatch_data($sql) {
	$result = $GLOBALS['conn']->query($sql);
	if ($result->num_rows > 0) {
    	$data = mysqli_fetch_all($result,MYSQLI_ASSOC);
    	return $data;
	}else{
		return FALSE;
	}
}
function insert_data($sql){
  $id='';
  if ($GLOBALS['conn']->query($sql)==true) {
    $id=$GLOBALS['conn']->insert_id;
  }else{
    echo $GLOBALS['conn']->error;
  }
  // $GLOBALS['conn']->close();
  return $id;
//   if ($GLOBALS['conn']->query($sql)==true) {
//     echo "created";
//   } else {
//     echo "nope";
//     echo $GLOBALS['conn']->error;
//   }
//   $id= $GLOBALS['conn']->insert_id;
//
// return $id;
}


$first_name=isset($_POST['first_name'])?$_POST['first_name']:'';
$last_name=isset($_POST['last_name'])?$_POST['last_name']:'';
$username=isset($_POST['username'])?$_POST['username']:'';
$email=isset($_POST['email'])?$_POST['email']:'';
$paymentMethod=isset($_POST['paymentMethod'])?$_POST['paymentMethod']:'';
$card_num=isset($_POST['card_num'])?$_POST['card_num']:'';
$card_expiration=isset($_POST['card_expiration'])?$_POST['card_expiration']:'';
$card_cvv=isset($_POST['card_cvv'])?$_POST['card_cvv']:'';
// echo "cart name ",$paymentMethod;
// echo " ->",$card_num,"   ",$card_expiration,$card_cvv;
if($_SERVER['REQUEST_METHOD']=='POST' && is_array($_POST)
    && !empty($first_name) && !empty($last_name)
    && !empty($username)&& !empty($email)

    && !empty($paymentMethod)
    && !empty($card_num)
    && !empty($card_expiration)&& !empty($card_cvv)
  ){
$c=new Cart('cart');
$c->calcu_for_each_product_total_price();
$sql='INSERT INTO `orders` ( `user_id`,`total_amount`) VALUES ('.$_SESSION['user_id'].','.$c->get_total_price().')';
$order_id=insert_data($sql);
echo "order id :",$order_id;
// $payment_sql='insert into payment(orserid,user_id,paymentMethod,card_num,card_expiration,card_cvv,total_amount) values ('.$order_id.','.$_SESSION['user_id'].','.$paymentMethod.','.$card_num.','.$card_expiration.','.$card_cvv.','.$c->get_total_price().')';
$P_SQL='
INSERT INTO `payment` ( `user_id`, `card_num`,
 `card_expiration`, `card_cvv`, `total_amount`,
  `order_id`, `paymentMethod`)
  VALUES ('.$_SESSION['user_id'].', '.$card_num.', '.$card_expiration.', '.$card_cvv.', '.$c->get_total_price().', '.$order_id.', "'.$paymentMethod.'")
';
$payment_id=insert_data($P_SQL);
// echo "string  ->",$payment_id;
if($payment_id){
  $sql_update='UPDATE `orders` SET `payment_id`='.$payment_id.' WHERE id='.$order_id.'';
  insert_data($sql_update);
  foreach ($_SESSION['cart'] as $key => $value) {
    $sql_order_item='insert into order_item (product_id,product_q,product_price,order_id) values('.$key.','.$c->get_quantity($key).','.$c->get_price($key).','.$order_id.')';
    insert_data($sql_order_item);
    $p_sql='select id,quantity from products where id='.$key.'';
    $product=fatch_data($p_sql);
    // printf $product[0]['quantity'];
    // print_r($product);
    $temp=(int)$product[0]['quantity'] - (int)$c->get_quantity($key);
    if($temp<0)
    {
      $temp=0;
    }
    $update_product='update products set quantity='.$temp.' where id='.$key.'';
    if(insert_data($update_product)){

    }
  }
  unset($_SESSION['cart']);
  header( "Location: index.php" ); die;
}



}
// get_total_price()
 ?>

<!-- id	product_id	product_q	product_price	created	order_id     order item -->

 	<!-- id	user_id	card_num	card_expiration	card_cvv	total_amount	orserid -->
 	<!-- id	user_id	created	payment_id -->
 <!-- id	user_id	card_num	card_expiration	card_cvv	total_amount	orserid -->
