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

  $get_name=isset($_GET['catagory_name'])?$_GET['catagory_name']:'';
    if(isset($_POST['submit']) && $_SERVER['REQUEST_METHOD']==='POST'){

      $name=$_POST['name'];
      $update=isset($_POST['update'])?$_POST['update']:'';
      $sql='insert into catagory (name) values ("'.$name.'")';

      if(!empty($get_name)){
        $sql='UPDATE `catagory` SET `name`="'.$name.'" WHERE name="'.$get_name.'"';
      }
      insert($sql);

      header( "Location: list_catagory.php" ); die;


    }
     ?>
  </head>
  <body>
    <div class="container mtg_t">
      <div class="row">
        <div class="col-sm">
          <div class="card-body">
            <form action="" method="post" class="needs-validation">
              <div class="form-group ">
                <label for="name">catagory name:</label>
                <input type="text" class="form-control form-control-lg rounded-0" id="name" placeholder="Enter product name" name="name" value="<?php echo $get_name; ?>" required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
              </div>
              <?php
              if (!empty($get_name)) {
                echo '
                <input type="text" name="update" value="true" hidden>

                ';
              }
               ?>
               <button type="submit" class="btn btn-primary" name="submit">Submit</button>

            </form>
          </div>
        </div>
        <div class="col-sm-1">

                <div class="mtg_t">
                  <a href="./list_catagory.php">list</a>
                </div>
        </div>

      </div>


    </div>




<?php include 'index_footer.html'; ?>
  </body>
</html>
