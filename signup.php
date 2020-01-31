<!DOCTYPE html>
<html lang="en">
<?php include 'index_header.html'?>


<body  style="background: #b6bac1">
  <?php
  session_start();

  // require("config/session.php");
  include 'nav.php';

  ?>
  <?php
  // $name="";
  // if(isset( $_POST['submit'])){
  //     $name=$_POST['fname'];
  //     echo($name);
  // }
  // if (!empty($_POST)){
  //     foreach ($_POST as $post)
  //     {
  //         echo($post);
  //
  //     }
  // }else{
  //
  // }
  ?>
<div class="" style="margin-top:81px">
    <div class="row">
        <div class="col-md-12 min-vh-100 d-flex flex-column justify-content-center">
            <div class="row">
                <div class="col-lg-6 col-md-8 mx-auto">

                    <!-- form card login -->
                    <div class="card rounded shadow shadow-sm">
                        <div class="card-header">
                            <h3 class="mb-0">Sign up</h3>
                        </div>
                        <div class="card-body">
    <div class="display-3" style="display:none">
      Your Account been created
    </div>
  </div>
<div class="card-body">
  <form action="signup_action.php" method="post" class="needs-validation"  onsubmit="formsubmit(event)"novalidate>
    <div class="form-group ">
      <label for="username">username:</label>
      <input type="text" class="form-control form-control-lg rounded-0" id="username" placeholder="Enter username" name="username" required>
      <div class="valid-feedback">Valid.</div>
      <div class="invalid-feedback">Please fill out this field.</div>
    </div>
    <div class="form-group ">
      <label for="fname">firstName:</label>
      <input type="text" class="form-control form-control-lg rounded-0" id="fname" placeholder="Enter firstName" name="fname" >
      <div class="valid-feedback">Valid.</div>
      <div class="invalid-feedback">Please fill out this field.</div>
    </div>

    <div class="form-group ">
      <label for="lname">LastName:</label>
      <input type="text" class="form-control form-control-lg rounded-0" id="lname" placeholder="Enter LastName" name="lname" >
      <div class="valid-feedback">Valid.</div>
      <div class="invalid-feedback">Please fill out this field.</div>
    </div>
    <div class="form-group ">
      <label for="email">Email:</label>
      <input type="email" class="form-control form-control-lg rounded-0" id="email" placeholder="Enter email " name="email" required>
      <div class="valid-feedback">Valid.</div>
      <div class="invalid-feedback">Please fill out this field.</div>
      <div class="exits_email invalid-feedback" style="display:none">This email allready exists</div>
    </div>
    <div class="form-group ">
      <label for="phone">Phone:</label>
      <input type="number" class="form-control form-control-lg rounded-0" id="phone" placeholder="Enter phone number" name="phone" required>
      <div class="valid-feedback">Valid.</div>
      <div class="invalid-feedback">Please fill out this field.</div>
    </div>
    <div class="form-group ">
      <label for="address">Address:</label>
      <input type="text" class="form-control form-control-lg rounded-0" id="uname" placeholder="Enter Address" name="address" required>
      <div class="valid-feedback">Valid.</div>
      <div class="invalid-feedback">Please fill out this field.</div>
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control form-control-lg rounded-0" id="pwd" placeholder="Enter password" name="pswd" required>
      <div class="valid-feedback">Valid.</div>
      <div class="invalid-feedback">Please fill out this field.</div>
      <div class="cpwd_msg invalid-feedback">
        Password does'not match
      </div>
    </div>
    <div class="form-group">
      <label for="cpwd">Confirm Password:</label>
      <input type="password" class="form-control form-control-lg rounded-0" id="cpwd" placeholder="Confirm  password" name="cpswd" required>
      <div class="valid-feedback">Valid.</div>
      <div class="invalid-feedback">Please fill out this field.</div>
      <div class="cpwd_msg invalid-feedback">
        Password does'not match
      </div>
    </div>


    <button type="submit" class="btn btn-primary" name="submit" value="oijfoji">Submit</button>
  </form>
</div>
</div>

</div>
<!--/row-->

</div>

</div>
<!--/row-->
</div>
</div>

<!--/container-->

<script>
$('.cpwd_msg.invalid-feedback').css('display','none');
// Disable form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Get the forms we want to add validation styles to
    var forms = document.getElementsByClassName('needs-validation');

    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }


        form.classList.add('was-validated');




      }, false);
    });
  }, false);
})();


function formsubmit(event){
  let a = $('#pwd').val();
  let b=$('#cpwd').val();
  if (a!=b){
    event.preventDefault();
    event.stopPropagation();
    $('.cpwd_msg.invalid-feedback').css('display','block');
  }
}

</script>
<?php include 'index_footer.html' ?>

</body>
</html>
