j<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <?php include 'index_header.html'; session_start() ?>
  </head>
  <?php include 'nav.php';
  require 'config/h.php';
  confirm_logged_in();
  confirm_user_is_stuff_or_suberuser();
   ?>

  <body>
    <main class="mt-5 pt-4">
      <div class="container wow fadeIn">
          <h1 style="text-align:center;">Stock details</h1>
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
        <th></th>
      </tr>
    </thead>
    <tbody>
      <?php
      if(isset($_SESSION['stock'])){
        $c=new Cart('stock');

        $c->calcu_for_each_product_total_price();
        foreach ($_SESSION['stock'] as $key => $value) {
          echo '
          <tr>
            <td>'.$c->get_name($key).'</td>
            <td>
            <form class="d-flex justify-content-left" action="./stock_up_cart.php" method="post">

               <input type="quantity" min="0" name="quantity" value="'.$c->get_quantity($key).'" aria-label="Search" class="form-control" style="width: 100px" oninput="validity.valid||(value="");" >
               <input type="number" name="id" value="'.$key.'" hidden >
               <input type="number" name="price" value="'.$c->get_price($key).'" hidden >
               <input type="text" name="name" value="'.$c->get_name($key).'" hidden >
               <button class="btn btn-primary btn-md my-0 p" type="submit" name="update" value="true">update

               </button>
             </form>
             </td>
            <td>'.$c->get_price($key).'</td>
            <td>'.$c->get_total_price_of_a_product($key).'</td>
            <td><a href="./remove_product_from_cart.php?key='.$key.'&&success_location=stock_edit.php&&from=stock">remove</a></td>

            </tr>';

        }
      // echo $c->get_total_price(),"LL";
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
        <td><?php
        if(isset($_SESSION['stock']))
        {
            echo $c->get_total_price() ;
        }
      ?></td>
      </tr>
    </tbody>
  </table>
          </div>
        </div>
      </main>
    <?php include 'index_footer.html'; ?>
  </body>

</html>
