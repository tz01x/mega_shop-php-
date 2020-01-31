<?php include 'signup.php' ?>



<?php

$lname=$fname=$address=$pswd=$cpswd=$phone="";
$alert_meg="";
if(( $_POST['submit']) ){

  $lname=$_POST['lname'];
    $username_=$_POST['username'];
    $fname=$_POST['fname'];
    $address=$_POST['address'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    // $pswd= password_hash($_POST['pswd'], PASSWORD_DEFAULT);
    $pswd= $_POST['pswd'];


    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "account";

    $conn = new mysqli($servername, $username, $password,$dbname);
    // $sql_1="INSERT INTO `user` (`id`, `username`, `password`, `email`, `is_staff`, `is_superuser`, `first_name`, `last_name`) VALUES (NULL, '".$username."', PASSWORD('".$pswd."'), '".$email."', '0', '0', '".$fname."','".$lname."')";
    // Check connection

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // creating user if email does not exits

    // $sql_check_email_is_exist_or_not=;

      $result = $conn->query('select * from user where email = "'.$email.'"');
      if ($result->num_rows >= 1) {

        $alert_meg="this email is all ready exists";


      }else{

       $sql_user="INSERT INTO user (username, password, email,first_name, last_name) values ( '".$username_."', '".md5($pswd)."', '".$email."', '".$fname."', '".$lname."')";
       $result = $conn->query($sql_user);

                  $last_id = $conn->insert_id;
                  // creation profile
                  $sql_profile=" INSERT INTO `profle` (`address`, `phone`, `id`) VALUES ('".$address."', '".$phone."', '".$last_id."')";
                  if ($conn->query($sql_profile) === TRUE) {
                    $alert_meg="account been created";
                    // header( "Location: index.php" ); die;

                  }else{
                    echo "Error: " . $sql_profile . "<br>" . $conn->error;

                  }

                }

                $conn->close();
      }

    // $sql = "INSERT INTO user_account (fname, lname, address,phone,password,email) VALUES ('".$fname."', '".$lname."', '".$address."','".$phone."','".$pswd."','".$email."')";
?>
