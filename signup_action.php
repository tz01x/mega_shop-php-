<?php include 'signup.php' ?>



<?php

$lname=$fname=$address=$pswd=$cpswd=$phone="";
$alert_meg="";
if(isset( $_POST['submit'])){

  $lname=$_POST['lname'];
    $username=$_POST['username'];
    $fname=$_POST['fname'];
    $address=$_POST['address'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    // $pswd= password_hash($_POST['pswd'], PASSWORD_DEFAULT);
    $pswd= $_POST['pswd'];
    $servername = "localhost";
    $username = "admin";
    $password = "admin";
    $dbname = "account";

    $conn = new mysqli($servername, $username, $password,$dbname);
    $sql_check_email_is_exist_or_not="INSERT INTO user (username, password, email,first_name, last_name) SELECT * FROM (select '".$username."', '".md5($pswd)."', '".$email."', '".$fname."', '".$lname."') as tem WHERE NOT EXISTS ( SELECT email FROM user WHERE email = '".$email."' ) LIMIT 1";
    // $sql_1="INSERT INTO `user` (`id`, `username`, `password`, `email`, `is_staff`, `is_superuser`, `first_name`, `last_name`) VALUES (NULL, '".$username."', PASSWORD('".$pswd."'), '".$email."', '0', '0', '".$fname."','".$lname."')";
    // Check connection

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // creating user if email does not exits

      $result = $conn->query($sql_check_email_is_exist_or_not);
      if ($conn->affected_rows == 0) {

        $alert_meg="this email is all ready exists";


      }else{


                  $last_id = $conn->insert_id;
                  // creation profile
                  $sql_profile=" INSERT INTO `profle` (`address`, `phone`, `id`) VALUES ('".$address."', '".$phone."', '".$last_id."')";
                  if ($conn->query($sql_profile) === TRUE) {
                    $alert_meg="account been created";
                  }else{
                    echo "Error: " . $sql_profile . "<br>" . $conn->error;

                  }

                }

                $conn->close();
      }

    // $sql = "INSERT INTO user_account (fname, lname, address,phone,password,email) VALUES ('".$fname."', '".$lname."', '".$address."','".$phone."','".$pswd."','".$email."')";
?>

<script type='text/javascript'>
function wait(ms){
   var start = new Date().getTime();
   var end = start;
   while(end < start + ms) {
     end = new Date().getTime();
  }
}
var jsmessage = <?php echo json_encode($alert_meg); ?>;
// if (jsmessage!=""){
//     alert(JavaScriptAlert);
// }
if(jsmessage=='this email is all ready exists'){
  $('.exits_email.invalid-feedback').css('display','block');

}else{

$('.created').css('display','block');
wait(5000);
location.assign('./index.php');
}


</script>
