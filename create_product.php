<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Create Product</title>

    <?php include 'index_header.html'; ?>
    <?php
    session_start();
    include   'config/database.php';
    include 'nav.php';
    include 'config/h.php';





    ?>
  </head>
  <body>

    <?php
    $get_name=isset($_GET['name'])?$_GET['name']:'';
    $get_price=isset($_GET['price'])?$_GET['price']:'';
    $get_quantity=isset($_GET['quantity'])?$_GET['quantity']:'';
    $get_discription=isset($_GET['discription'])?$_GET['discription']:'';
    $get_id=isset($_GET['id'])?$_GET['id']:'';
    $get_img=isset($_GET['img'])?$_GET['img']:'';




    if (isset($_POST['submit'])) {

      $name=$_POST['name'];
      $price=$_POST['price'];
      $quantity=$_POST['quantity'];
      $Discription=$_POST['Discription'];
      $catagory_name=$_POST['catagory_name'];
      $supplier=$_POST['supplier'];
      $update=isset($_POST['update'])?$_POST['update']:'';



      // print_r($file);
      $file=$_FILES['file'];
      $file_name=$_FILES['file']['name'];
      $file_temp_name=$_FILES['file']['tmp_name'];
      // $file_error=$_FILES['file']['error'];
      // $file_type=$_FILES['file']['type'];
      // $file_size=$_FILES['file']['size'];
      $img_url='media/'.$file_name;
      move_uploaded_file($file_temp_name,$img_url);



      $sql='insert into products(name,price,quantity,supplier_id,catagory_id,img,description) values (
        "'.$name.'",
        '.$price.',
        '.$quantity.',
        '.$supplier.',
        '.$catagory_name.',
        "'.$img_url.'",
        "'.$Discription.'"
        )';

        if($update=='true'){
          $img_url=$get_img;

          $sql='update products set name="'.$name.'" ,price='.$price.' ,quantity='.$quantity.' ,description="'.$Discription.'",supplier_id='.$supplier.',catagory_id='.$catagory_name.',img="'.$img_url.'" where id='.$get_id.'';
        }
        insert($sql);
        header( "Location: list_product.php" ); die;


    }
     ?>

      <div class="mtg_t container">





        <div class="card-body">
          <form action="" method="post" class="needs-validation"  novalidate   enctype="multipart/form-data">
            <?php
            if (!empty($get_name) &&!empty($get_price)&&!empty($get_quantity) ) {
              echo '
              <input type="text" name="update" value="true" hidden>

              ';
            }
             ?>
            <div class="form-group ">
              <label for="username">product name:</label>
              <input type="text" class="form-control form-control-lg rounded-0" id="username" placeholder="Enter product name" name="name" required value="<?php echo $get_name; ?>" >
              <div class="valid-feedback">Valid.</div>
              <div class="invalid-feedback">Please fill out this field.</div>
            </div>

            <div class="form-group ">
              <label for="file">img:</label>
              <input type="file" class="form-control form-control-lg rounded-0" id="file" placeholder="Enter firstName" name="file"  >

              <p><?php echo $get_img; ?>


              </p>

            </div>

            <div class="form-group ">
              <label for="price">price:</label>
              <input type="number" class="form-control form-control-lg rounded-0" id="price" placeholder="Enter price" name="price" value="<?php echo $get_price; ?>" >
              <div class="valid-feedback">Valid.</div>
              <div class="invalid-feedback">Please fill out this field.</div>
            </div>

            <div class="form-group ">
              <label for="price">quantity:</label>
              <input type="number" class="form-control form-control-lg rounded-0" id="quantity" placeholder="Enter quantity" name="quantity" value="<?php echo $get_quantity; ?>" >
              <div class="valid-feedback">Valid.</div>
              <div class="invalid-feedback">Please fill out this field.</div>
            </div>


            <div class="form-group ">
              <label for="Discription">Discription:</label>
              <input type="text" class="form-control form-control-lg rounded-0" id="Discription" placeholder="Enter Discription" name="Discription" value="<?php echo $get_discription; ?>" required>
              <div class="valid-feedback">Valid.</div>
              <div class="invalid-feedback">Please fill out this field.</div>
            </div>
            <div class="form-group ">
              <label for="catagory_name">catagory_name:</label>

              <select class="form-control" name="catagory_name">
                <?php
                $sql='select * from catagory';
                $catagorys=fetch_data($sql);

                foreach ($catagorys as  $value) {
                  echo '
                  <option value="'.$value['id'].'">'.$value['name'].' </option>
                  ';
                }

                 ?>
              </select>
            </div>

            <div class="form-group ">
              <label for="supplier">supplier:</label>

              <select class="form-control" name="supplier">
                <?php
                $sql='select * from  supplier';
                $catagorys=fetch_data($sql);

                foreach ($catagorys as  $value) {
                  echo '
                  <option value="'.$value['id'].'">'.$value['c_name'].' </option>
                  ';
                }

                 ?>
              </select>
            </div>




            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
          </form>
        </div>

      </div>

      <!-- <img src="media/<?php echo $file_name; ?>" alt=""> -->
    <?php include 'index_footer.html'; ?>

  </body>
</html>
