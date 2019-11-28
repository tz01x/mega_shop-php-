<?php

// require("config/session.php");
session_start();

require("config/database.php");
// require("config/get_queryes.php");
function fatch_data($sql) {
  $result = $GLOBALS['conn']->query($sql);
  if ($result->num_rows > 0) {
      $data = mysqli_fetch_all($result,MYSQLI_ASSOC);
      return $data;
  }else{
    return FALSE;
  }
}
$id=isset($_GET['id'])?$_GET['id']:'';
if($id==''){
  header( "Location: index.php" ); die;

}
$sql="SELECT * FROM products WHERE id=$id";
$data=fatch_data($sql);
// echo $data;
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?php require('./index_header.html') ; ?>
</head>
<?php   include 'nav.php';
?>

<body>


  <!--Main layout-->
  <main class="mt-5 pt-4">
    <div class="container dark-grey-text mt-5">

      <!--Grid row-->
      <div class="row wow fadeIn">

        <!--Grid column-->
        <div class="col-md-6 mb-4">

          <img src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Products/14.jpg" class="img-fluid" alt="">

        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-md-6 mb-4">

          <!--Content-->
          <div class="p-4">
            <p class="lead font-weight-bold"><?php echo $data[0]["name"] ?></p>


            <div class="mb-3">

              <a href="">
                <span class="badge blue mr-1"><?php echo $data[0]["catagory_name"]; ?></span>
              </a>
<!-- json_encode -->
            </div>
            <div class="mb-3">
              <p> <strong>Stock</strong> : <span><?php echo $data[0]["quantity"]; ?></samp></p>
            </div>

          <?php
          echo '<p class="lead">

            <span>$'.$data[0]["price"].'</span>
          </p>';

           ?>


            <p class="lead font-weight-bold">Description</p>

            <p><?php echo $data[0]["description"] ?></p>

            <form class="d-flex justify-content-left" action="./addTo_cart.php" method="post">
              <!-- Default input -->
              <input type="quantity" min="0" name='quantity' value="1" aria-label="Search" class="form-control" style="width: 100px" oninput="validity.valid||(value='');" >
              <input type="number" name="id" value=<?php echo $data[0]["id"]; ?> hidden >
              <input type="number" name="price" value=<?php echo $data[0]["price"]; ?> hidden >
              <input type="text" name="name" value='<?php echo $data[0]["name"]; ?>' hidden >
              <button class="btn btn-primary btn-md my-0 p" type="submit" name='update' value="false">Add to cart
                <i class="fas fa-shopping-cart ml-1"></i>
              </button>

            </form>

          </div>
          <!--Content-->

        </div>
        <!--Grid column-->

      </div>
      <!--Grid row-->

      <hr>


    </div>
    <div class="jumbotron">
      <!-- <p><?php echo $id; ?></p> -->

      <data value="">

        <?php
        if ($data){
          echo '<p>'.$data[0]['name'].'</p>';

        }else{
          echo "no data";

        }



         ?>

      </data>


    </div>
  </main>
  <!--Main layout-->
<?php include 'index_footer.html'; ?>
</body>

</html>
