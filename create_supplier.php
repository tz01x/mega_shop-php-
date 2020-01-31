\<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <?php include 'index_header.html';

    session_start();

    include 'config/database.php';
    include 'config/h.php';
    include 'nav.php';

    $get_company_name=isset($_GET['company_name'])?$_GET['company_name']:'';
    $get_phone=isset($_GET['phone'])?$_GET['phone']:'';
    $get_email=isset($_GET['email'])?$_GET['email']:'';
    if(isset($_POST['submit']) && $_SERVER['REQUEST_METHOD']==='POST'){

      $name=$_POST['name'];
      $email=$_POST['email'];
      $phone=$_POST['phone'];
      $update=isset($_POST['update'])?$_POST['update']:'';
      $sql='insert into supplier (c_name,email,phone) values ("'.$name.'","'.$email.'","'.$phone.'")';

      // if (!empty($get_company_name) &&!empty($get_phone)&&!empty($get_email) ) {
      if($update=='true'){

        $sql='UPDATE `supplier` SET `c_name`="'.$name.'",`email`="'.$email.'",`phone`="'.$phone.'" WHERE c_name="'.$get_company_name.'" and phone="'.$get_phone.'" and email="'.$get_email.'"';
      }
      insert($sql);

      header( "Location: list_supplier.php" ); die;


    }
     ?>
  </head>
  <body>
    <div class="container mtg_t">
      <div class="row">
        <div class="col-sm">
          <div class="card-body">
            <form action="" method="post" class="needs-validation">
              <?php
              if (!empty($get_company_name) &&!empty($get_phone)&&!empty($get_email) ) {
                echo '
                <input type="text" name="update" value="true" hidden>

                ';
              }
               ?>
              <div class="form-group ">
                <label for="name">supplier name:</label>

                 <input type="text" class="form-control form-control-lg rounded-0" id="name" name="name" value='<?php echo $get_company_name; ?>'  >

                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
              </div>
              <div class="form-group ">
                <label for="email">supplier 	email:</label>
                <input type="email" class="form-control form-control-lg rounded-0" id="email"  name="email" value="<?php echo $get_email; ?>" required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
              </div>
              <div class="form-group ">
                <label for="phone">supplier 	phone:</label>
                <input type="text" class="form-control form-control-lg rounded-0" id="phone"  name="phone" value="<?php echo $get_phone ; ?>" required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
              </div>

               <button type="submit" class="btn btn-primary" name="submit">Submit</button>

            </form>
          </div>
        </div>
        <div class="col-sm-1">

                <div class="mtg_t">
                  <a href="./list_supplier.php">list</a>
                </div>
        </div>

      </div>


    </div>




<?php include 'index_footer.html'; ?>
  </body>
</html>
