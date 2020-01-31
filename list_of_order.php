<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>

    <?php include 'index_header.html';

    session_start();



    include 'config/database.php';
    include 'config/h.php';
    include 'nav.php';

    confirm_user_is_stuff_or_suberuser();
    confirm_logged_in();
    $sql='SELECT orders.id as order_id,first_name,last_name,user_id,created FROM `user` , orders WHERE user.id=user_id';
    $datas=fetch_data($sql);

    ?>


  </head>
  <body>
    <div class="container mtg_t">
<div class="row">
  <div class="col-sm-8">

    <h1>list of all catagorys</h1>
  </div>
  <div class="col-sm-4">
    <a href="./create_catagory.php">create catagory</a>
  </div>

</div>

      <table class="table   table-hover">

        <tbody>

            <?php

            foreach ($datas as  $value) {
              echo '
              <tr>
              <td>
              '.$value['first_name'].'
              '.$value['last_name'].'(
              '.$value['created'].')
              </td>
              <td>
              <a href="./order_details.php?id='.$value['order_id'].'"> visit </a>
              </td>

              </tr>

              ';
            }
             ?>

        </tbody>
      </table>
    </div>
  </body>
</html>
