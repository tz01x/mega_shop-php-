<!DOCTYPE html>
<html lang="en">

<head>
<?php include 'index_header.html';
session_start();


// Check user already logged in or not

if (!isset($_SESSION['user_id'])) {
  header( "Location: index.php" ); die;
}

?>
</head>

<body class="grey lighten-3">

  <!-- Navbar -->
  <?php include 'nav.php'; ?>
  <!-- Navbar -->

  <!--Main layout-->
  <main class="mt-5 pt-4">
    <div class="container wow fadeIn">

      <!-- Heading -->
      <h2 class="my-5 h2 text-center">Checkout form</h2>

      <!--Grid row-->
      <div class="row">

        <!--Grid column-->
        <div class="col-md-8 mb-4">

          <!--Card-->
          <div class="card">

            <!--Card content-->
            <form class="card-body" action="./checkout.php" method="post">

              <!--Grid row-->
              <div class="row">

                <!--Grid column-->
                <div class="col-md-6 mb-2">

                  <!--firstName-->
                  <div class="md-form ">
                    <input type="text" id="firstName" class="form-control" name = 'first_name' value=<?php echo $_SESSION['first_name']; ?>>
                    <label for="firstName" class="">First name</label>
                  </div>

                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-md-6 mb-2">

                  <!--lastName-->
                  <div class="md-form">
                    <input type="text" id="lastName" class="form-control" name='last_name' value="<?php echo $_SESSION['last_name']; ?>">
                    <label for="lastName" class="">Last name</label>
                  </div>

                </div>
                <!--Grid column-->

              </div>
              <!--Grid row-->

              <!--Username-->
              <div class="md-form input-group pl-0 mb-5">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="basic-addon1">@</span>
                </div>
                <input type="text" class="form-control py-0" placeholder="Username" name='username' value= "<?php echo $_SESSION['username']; ?> " aria-describedby="basic-addon1">
              </div>

              <!--email-->
              <div class="md-form mb-5">
                <input type="text" id="email" class="form-control" name='email' value= "<?php echo $_SESSION['email']; ?> " placeholder="youremail@example.com">
                <label for="email" class="">Email (optional)</label>
              </div>

              <!--address-->


            
              <hr>





              <div class="d-block my-3">
                <div class="custom-control custom-radio">
                  <input id="credit" name="paymentMethod" value="credit_card"type="radio" class="custom-control-input" checked required>
                  <label class="custom-control-label" for="credit">Credit card</label>
                </div>
                <div class="custom-control custom-radio">
                  <input id="debit" name="paymentMethod" type="radio" value="debit_card"class="custom-control-input" required>
                  <label class="custom-control-label" for="debit">Debit card</label>
                </div>
                <div class="custom-control custom-radio">
                  <input id="paypal" name="paymentMethod" type="radio" value="paypal" class="custom-control-input" required>
                  <label class="custom-control-label" for="paypal">Paypal</label>
                </div>
              </div>
              <div class="row">

                <div class="col-md-6 mb-3">
                  <label for="cc-number">Credit card number</label>
                  <input type="text" class="form-control" id="cc-number" placeholder="" name='card_num' value=""  required>
                  <div class="invalid-feedback">
                    Credit card number is required
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-3 mb-3">
                  <label for="cc-expiration">Expiration</label>
                  <input type="text" class="form-control" id="cc-expiration" placeholder="" name='card_expiration'  value=""required>
                  <div class="invalid-feedback">
                    Expiration date required
                  </div>
                </div>
                <div class="col-md-3 mb-3">
                  <label for="cc-expiration">CVV</label>
                  <input type="text" class="form-control" id="cc-cvv" placeholder=""  name='card_cvv' value="" required>
                  <div class="invalid-feedback">
                    Security code required
                  </div>
                </div>
              </div>
              <hr class="mb-4">
              <button class="btn btn-primary btn-lg btn-block" type="submit">Continue to checkout</button>

            </form>
          </div>
          <!--/.Card-->

        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-md-4 mb-4">

          <!-- Heading -->
          <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-muted">Your cart</span>
            <span class="badge badge-secondary badge-pill"><?php
if(isset($_SESSION['cart'])){
            $c=new Cart('cart'); echo $c->toal_item();
}else {
  echo 0;
}
             ?></span>
          </h4>

          <!-- Cart -->
          <ul class="list-group mb-3 z-depth-1">
            <?php
            // require 'cart.php';

            if(isset($_SESSION['cart'])){
              $c->calcu_for_each_product_total_price();

              foreach ($_SESSION['cart'] as $key => $value) {
                // echo $c->get_name($key);
                echo '
                <li class="list-group-item d-flex justify-content-between lh-condensed">
                  <div>
                    <h6 class="my-0">'.$c->get_name($key).' (x '.$c->get_quantity($key).')</h6>

                  </div>
                  <span class="text-muted">$'.$c->get_total_price_of_a_product($key).'</span>
                </li>
                ';
              }
            }



             ?>

            <li class="list-group-item d-flex justify-content-between">
              <span>Total (USD)</span>
              <strong>$ <?php
              if(isset($_SESSION['cart'])){
              echo $c->get_total_price();
            }?> </strong>
            </li>
          </ul>
          <a href="./cart_edit.php">
            <span class="badge badge-secondary badge-pill">edit</span>
          </a>

          <!-- Cart -->

          <!-- Promo code -->
          <!-- <form class="card p-2">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Promo code" aria-label="Recipient's username" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-secondary btn-md waves-effect m-0" type="button">Redeem</button>
              </div>
            </div>
          </form> -->
          <!-- Promo code -->

        </div>
        <!--Grid column-->

      </div>
      <!--Grid row-->

    </div>
  </main>
  <!--Main layout-->

  <!--Footer-->
<?php include 'index_footer.html'; ?>
  <script type="text/javascript">
    // Animations initialization
    new WOW().init();
  </script>
</body>

</html>
