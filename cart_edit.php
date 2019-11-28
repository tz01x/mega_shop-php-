j<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <?php include 'index_header.html'; session_start() ?>
  </head>
  <?php include 'nav.php'; ?>

  <body>
    <main class="mt-5 pt-4">
      <div class="container wow fadeIn">
          <h1 style="text-align:center;">Cart details</h1>
        </div>
        <div class="container">
          <div class="table-responsive-sm">
            <table class="table   table-hover">
    <thead class="thead-dark">

      <tr>
        <th>Products name</th>
        <th>Quantity</th>
        <th>Unit price</th>
        <th>Total price</th>
      </tr>
    </thead>
    <tbody>
      <?php $c=new Cart();

      $c->calcu_for_each_product_total_price();
      if(isset($_SESSION['cart'])){
        foreach ($_SESSION['cart'] as $key => $value) {
          echo '
          <tr>
            <td>'.$c->get_name($key).'</td>
            <td>
            <form class="d-flex justify-content-left" action="./addTo_cart.php" method="post">

               <input type="quantity" min="0" name="quantity" value="'.$c->get_quantity($key).'" aria-label="Search" class="form-control" style="width: 100px" oninput="validity.valid||(value="");" >
               <input type="number" name="id" value="'.$key.'" hidden >
               <input type="number" name="price" value="'.$c->get_price($key).'" hidden >
               <input type="text" name="name" value="'.$c->get_name($key).'" hidden >
               <button class="btn btn-primary btn-md my-0 p" type="submit" name="update" value="true">update

               </button>
             </form>
             </td>
            <td>'.$c->get_price($key).'</td>
            <td>'.$c->get_total_price_of_a_product($key).'</td></tr>';

        }
      }
       ?>
       <!-- '.$c->get_quantity($key).' -->
       <!-- '.$c->get_price($key).' -->
       <!-- '.$c->get_total_price_of_a_product($key).' -->

    </tbody>
    <tbody>
      <tr>
        <td></td>
        <td></td>
        <td> <h5>Total Price</h5> </td>
        <td><?php echo $c->get_total_price($key) ; ?></td>
      </tr>
    </tbody>
  </table>
          </div>
        </div>
      </main>
    <?php include 'index_footer.html'; ?>
  </body>

</html>
