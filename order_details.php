<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <?php
    include 'config/database.php';
    require  'config/h.php';

    session_start();

    confirm_logged_in();
    include 'index_header.html';
    include 'nav.php';
    $order_id=isset($_GET['id'])?$_GET['id']:'';
    if(empty($order_id)){
      header('Location: home.php ') ;die;
    }
     ?>
  </head>
  <body>
<div class="container mtg_t">
  <div class="row">
    <div class="col-md-10">
      <table class="table   table-hover">
      <thead class="thead-light">

      <tr>
      <th>Products name</th>
      <th>Quantity</th>
      <th>Unit price</th>

      </tr>
      </thead>
      <tbody>
      <?php
// echo $order_id;
  $orders_items=fetch_data('select * from order_item,products where order_id='.$order_id.' and products.id=product_id');
// print_r($orders_items);
foreach ($orders_items as $key => $items) {
  // $product=fetch_data('select name from products where id='.$items['product_id'].' LIMIT 1');
  echo '
  <tr>
  <td>'.$items["name"].'</td>
  <td>'.$items["product_q"].'</td>
  <td>'.$items["product_price"].'</td>

  </tr>
  ';
}

       ?>


           </tbody>

         </table>
    </div>
    <div class="col-md-2">

    </div>
  </div>

</div>

<?php include 'index_footer.html'; ?>
  </body>
</html>
