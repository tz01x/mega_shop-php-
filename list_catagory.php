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
    $sql='select * from catagory';
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
              '.$value['name'].'
              </td>
              <td>
              <a href="./create_catagory.php?catagory_name='.$value['name'].'">edit</a>
              </td>
              <td>

              <a href="./delete.php?catagory=true&&id='.$value['id'].'">delete</a>

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
