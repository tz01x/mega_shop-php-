<?php
require 'config/database.php';
session_start();
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
  if ($GLOBALS['conn']->query($sql)==true) {
    echo "created";
  } else {
    echo "nope";
    echo $GLOBALS['conn']->error;
  }
  $id= $GLOBALS['conn']->insert_id;

  $GLOBALS['conn'] -> close();
return $id;
  // echo $GLOBALS['conn']->affected_rows;
  // if($GLOBALS['conn']->q === true;)
  // return $GLOBALS['conn']->insert_id;
  // if ($GLOBALS['conn']->affected_rows==0){
  //   return
  // }

}
// $_payment_id="";
// $sql='INSERT INTO `orders` ( `user_id`) VALUES ('.$_SESSION['user_id'].')';
// $order_id=insert_data($sql);
// echo "orderid ",$order_id;
// $sql_payment='INSERT INTO payment ( `user_id`, `card_num`, `card_expiration`, `card_cvv`, `total_amount`, `orserid`) VALUES ('.$_SESSION['user_id'].', "5555", "5io", "688", "52", 555550007, '.$order_id.')';
$sql_e='INSERT INTO `payment` (`user_id`, `card_num`, `card_expiration`, `card_cvv`, `total_amount`, `orserid`, `paymentMethod`) VALUES ( 5, "j", "x", "s", "x", NULL, "pp") ';

echo "paypal ",insert_data($sql_e);


 ?>
