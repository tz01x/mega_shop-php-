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
        <?php
          $datas=fetch_data('select * from products');

          foreach ($datas as  $value) {
          echo '
          <tr>

            <td>

            '.$value['name'].'


            </td>
            <td>
            <a href="./product_detail.php?id='.$value['id'].'"> visit</a>
            </td>

            <td>
            <a href="./create_product.php?name='.$value['name'].'&&price='.$value['price'].'&&quantity='.$value['quantity'].'&&discription='.$value['description'].'&&id='.$value['id'].'&&img='.$value['img'].'"> edit</a>
            </td>
            <td>

            <a href="./delete.php?product=true&&id='.$value['id'].'">delete</a>

            </td>




          </tr>

          ';
          }

         ?>

      </table>
  </div>
    </body>
  </html>
