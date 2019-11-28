<?php
// require("config/session.php");
session_start();
$error='';
require("config/database.php");
// require("config/helper.php");
$email=isset($_POST['email'])?$_POST['email']:'';
$password=isset($_POST['password'])?$_POST['password']:'';
 function get_user_id($value='')
{
  $sql="select id form user where email='.$value.'";
  $result= $GLOBALS['conn']->query($sql);
  if ($result->num_rows > 0) {
      $data = $result->fetch_assoc();
      return $data;
  }else{
    return FALSE;
  }
}
function fatch_data($sql) {
	$result = $GLOBALS['conn']->query($sql);
	if ($result->num_rows > 0) {
    	$data = mysqli_fetch_all($result,MYSQLI_ASSOC);
    	return $data;
	}else{
		return FALSE;
	}
}
function login($email,$password){
	//encript password to md5
	$password = md5($password);
	$sql = "SELECT * FROM user natural join  profle WHERE email='$email' AND password='$password'   LIMIT 1";
	$data = fatch_data($sql);
	if($data){
		//fill the result to session variable
		$_SESSION['user_id'] = $data[0]['id'];
		$_SESSION['first_name'] = $data[0]['first_name'];
    $_SESSION['last_name'] = $data[0]['last_name'];
    $_SESSION['username'] = $data[0]['username'];
    $_SESSION['email'] = $data[0]['email'];
    $_SESSION['is_superuser'] = $data[0]['is_superuser'];
    $_SESSION['is_staff'] = $data[0]['is_staff'];
		$_SESSION['address'] = $data[0]['address'];
		return TRUE;
	}else{
		return FALSE;
	}
}
if($_SERVER['REQUEST_METHOD']==='POST' && is_array($_POST) && !empty($email) && !empty($password)){
    $status = login($email,$password);
	if($status){
		header( "Location: home.php" ); die;
	}else{

		// header( "Location: index.php" ); die;
    $error='invalid info ';
	}
}
// else{
// 	header( "Location: index.php" ); die;
// }


 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <?php include 'index_header.html'?>

  </head>



  <body style="background: #b6bac1">
    <?php include 'nav.php'?>

    <div class="container">
    <div class="row" style="    margin-top: 20px;">
        <div class="col-md-12 min-vh-100 d-flex flex-column justify-content-center">
            <div class="row">
                <div class="col-lg-6 col-md-8 mx-auto">

                    <!-- form card login -->
                    <div class="card rounded shadow shadow-sm">
                        <div class="card-header">
                            <h3 class="mb-0">Login</h3>
                        </div>
                        <div class="card-body">
                            <form class="form" role="form" autocomplete="off" id="formLogin" novalidate="" action=""method="POST">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control form-control-lg rounded-0" name="email" id="email" required="">
                                    <div class="invalid-feedback">Oops, you missed this one.</div>
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control form-control-lg rounded-0" id="password" name="password" required="" autocomplete="new-password">
                                    <div class="invalid-feedback">Enter your password too!</div>
                                </div>

                                <button type="submit" class="btn btn-success btn-lg float-right" id="btnLogin">Login</button>
                            </form>
                            <?php echo $error; ?>
                        </div>
                        <!--/card-block-->
                    </div>
                    <!-- /form card login -->

                </div>



            </div>
            <!--/row-->

        </div>
        <!--/col-->
    </div>
    <!--/row-->


</div>
<!--/container-->
    <?php include 'index_footer.html' ?>
    <script>
    $("#btnLogin").click(function(event) {

     //Fetch form to apply custom Bootstrap validation
     var form = $("#formLogin")

     if (form[0].checkValidity() === false) {
       event.preventDefault()
       event.stopPropagation()
     }

     form.addClass('was-validated');
   });
   var err_msg = <?php echo json_encode($error); ?>;



    </script>
  </body>
</html>
