<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <?php include 'index_header.html';
    session_start();
    include 'config/database.php';
    include 'config/h.php';
    confirm_logged_in();
    confirm_user_is_stuff_or_suberuser();
    include 'nav.php';
    ?>
  </head>
  <body>
<div class="container mtg_t">
  <table class="table   table-hover">
    <tr>
      <td>
        <a href="./list_product.php">products</a>
         </td>
      <td>
        <a href="./create_product.php">add</a>
      </td>
    </tr>
    <tr>
      <td>
        <a href="./list_supplier.php">supplier</a>
      </td>
      <td> <a href="./create_supplier.php">add</a> </td>
    </tr>
    <tr>
    <td>
      <a href="./list_catagory.php">catagory</a>
    </td>
    <td> <a href="./create_catagory.php">add</a> </td>
  </tr>
  <tr>
  <td>
    <a href="./list_of_order.php">Orders</a>
  </td>
  <td></td>

</tr>
  </table>
</div>
  </body>
</html>
