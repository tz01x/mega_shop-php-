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
    $sql='select * from supplier';
    $datas=fetch_data($sql);

    ?>


  </head>
  <body>
    <div class="container mtg_t">
<div class="row">
  <div class="col-sm-8">

    <h1>list of all supplier</h1>
  </div>
  <div class="col-sm-4">
    <a href="./create_supplier.php">create supplier</a>
  </div>

</div>

      <table class="table   table-hover">

        <tbody>

            <?php

            foreach ($datas as  $value) {
              echo '
              <tr>
              <td>
              '.$value['c_name'].'
              </td>
              <td>
              <a href="./create_supplier.php?company_name='.$value['c_name'].'&&phone='.$value['phone'].'&&email='.$value['email'].'">edit</a>
              </td>
              <td>

              <a href="./delete.php?supplier=true&&id='.$value['id'].'">delete</a>

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
