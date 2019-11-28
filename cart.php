<?php
// require 'config/session.php';
// session_start();
// require 'config/database.php';
/**
 *
 */
class Cart
{

  // public $update;
  // public $quantity;
  // public $product_id;

  // function __construct()
  // // ,$u,$q,$id
  // {
  //   // $this->cart_id=$s;
  //   // $this->update=$u;
  //   // $this->quantity=$q;
  //   // $this->product_id=$id;
  // }
  function add_to_cart($update,$quantity,$product_id,$product_price,$name)
  {
    if($update=='false'){

      if (array_key_exists($product_id,$_SESSION['cart']))
      {
        // $_SESSION['cart'][$product_id]=array('quantity' => $quantity,'product_price'=>$product_price );
        //do update
        $this->set_quantity($product_id,((int)$quantity)+(int)$this->get_quantity($product_id));
      }else{
        //set_value
        // $_SESSION['cart'][$product_id]=array('quantity' =>(int) $quantity,'product_price'=>(float)$product_price );
        $this->set_quantity_and_price($product_id,$quantity,$product_price,$name);
      }
      header( "Location: index.php?added=true" ); die;

    }else if($update=='true'){
      if (array_key_exists($product_id,$_SESSION['cart'])){
        $this->set_quantity($product_id,(int)$quantity);
      }else{
        $this->set_quantity_and_price($product_id,$quantity,$product_price,$name);

      }

      header( "Location: cart_edit.php?updated=true" ); die;

    }
  }
  function calcu_for_each_product_total_price(){
    $total_price=0.0;
    foreach ($_SESSION['cart'] as $key => $value) {
        // unset($array[$i]);
        $temp_total=($this->get_quantity($key) * $this->get_price($key));
        $this->set_total($key,$temp_total);
    }
  }
  function get_total_price()
  {
    $total_price=0.0;
    foreach ($_SESSION['cart'] as $key => $value) {
      $total_price+= $this->get_total_price_of_a_product($key);
    }
    return $total_price;

  }
  function toal_item()
  {
    $total_q=0;
    if(isset($_SESSION['cart'])){
      foreach ($_SESSION['cart'] as $key => $value) {
        $total_q+=$this->get_quantity($key);

      }
    }

    return $total_q;


  }
  function set_quantity_and_price($product_id,$quantity,$product_price,$name){
    $_SESSION['cart'][$product_id]=array('quantity' =>(int) $quantity,'product_price'=>(float)$product_price,'name'=>$name);
  }
  function set_quantity($p_id,$q_val){
     $_SESSION['cart'][$p_id]['quantity']=(int)$q_val;
  }
  function get_quantity($p_id)
  {
    return (int)$_SESSION['cart'][$p_id]['quantity'];

  }function get_price($p_id)
  {
    return (float)$_SESSION['cart'][$p_id]['product_price'];

  }function set_price($p_id,$price){
     $_SESSION['cart'][$p_id]['product_price']=(float)$price;
  }
  function set_total($p_id,$price){
     $_SESSION['cart'][$p_id]['total_price']=(float)$price;
  }
  function get_total_price_of_a_product($p_id)
  {
    return $_SESSION['cart'][$p_id]['total_price'];

  }
  function get_name($p_id)
  {
    return $_SESSION['cart'][$p_id]['name'];

  }
}




 ?>
