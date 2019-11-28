<?php
require 'config/database.php';
require 'cart.php';
require 'config/h.php';
session_start();
if (!isset($_SESSION['user_id'])) {
  header( "Location: index.php" ); die;
}
confirm_user_is_stuff_or_suberuser();

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

// if($_SERVER['REQUEST_METHOD']=='POST' && is_array($_POST)
//     && !empty($first_name) && !empty($last_name)
//     && !empty($username)&& !empty($email)
//     && !empty($state)&& !empty($country)
//     && !empty($zip)&& !empty($paymentMethod)
//     && !empty($zip)&& !empty($card_num)
//     && !empty($card_expiration)&& !empty($card_cvv)
//   ){
$c=new Cart('stock');
$c->calcu_for_each_product_total_price();
$sql='INSERT INTO `stock` ( `user_id`,`total_amount`) VALUES ('.$_SESSION['user_id'].','.$c->get_total_price().')';
$stock_id=insert_data($sql);
// echo "order id :",$order_id;
// $payment_sql='insert into payment(orserid,user_id,paymentMethod,card_num,card_expiration,card_cvv,total_amount) values ('.$order_id.','.$_SESSION['user_id'].','.$paymentMethod.','.$card_num.','.$card_expiration.','.$card_cvv.','.$c->get_total_price().')';
// $P_SQL='
// INSERT INTO `payment` ( `user_id`, `card_num`,
//  `card_expiration`, `card_cvv`, `total_amount`,
//   `orserid`, `paymentMethod`)
//   VALUES ('.$_SESSION['user_id'].', '.$card_num.', '.$card_expiration.', '.$card_cvv.', '.$c->get_total_price().', '.$order_id.', "'.$paymentMethod.'")
// ';
// $payment_id=insert_data($P_SQL);
// echo "string  ->",$payment_id;
// if($payment_id){
  // $sql_update='UPDATE `stock` SET `payment_id`='.$payment_id.' WHERE id='.$order_id.'';
  // insert_data($sql_update);
  foreach ($_SESSION['stock'] as $key => $value) {
    $sql_order_item='insert into order_item (product_id,product_q,product_price,stock_id) values('.$key.','.$c->get_quantity($key).','.$c->get_price($key).','.$stock_id.')';
    insert_data($sql_order_item);
    $p_sql='select id,quantity from products where id='.$key.'';
    $product=fatch_data($p_sql);
    // printf $product[0]['quantity'];
    // print_r($product);
    $temp=(int)$product[0]['quantity'] + (int)$c->get_quantity($key);
    // if($temp<0)
    // {
    //   $temp=0;
    // }
    $update_product='update products set quantity='.$temp.' where id='.$key.'';
    if(insert_data($update_product)){

    }
  }
  unset($_SESSION['stock']);
  header( "Location: index.php" ); die;
// }



// }
// get_total_price()
 ?>

<!-- id	product_id	product_q	product_price	created	order_id     order item -->

 	<!-- id	user_id	card_num	card_expiration	card_cvv	total_amount	orserid -->
 	<!-- id	user_id	created	payment_id -->
 <!-- id	user_id	card_num	card_expiration	card_cvv	total_amount	orserid -->
