<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <?php include 'index_header.html'; ?>
  </head>
  <body>
    <?php
    session_start();
     include 'nav.php';
     require 'config/database.php';
     require 'config/h.php';
     confirm_logged_in();
     confirm_user_is_stuff_or_suberuser();

     function fetch_custom($sql) {
     	$result = $GLOBALS['conn']->query($sql);
     	if ($result->num_rows > 0) {
         	$data = mysqli_fetch_all($result,MYSQLI_ASSOC);
         	return $data;
     	}else{
     		return  array( );
     	}
     }
     $catagorys=isset($_GET['catagory'])?$_GET['catagory']:'';
     $q=isset($_GET['q'])?$_GET['q']:'';

     $sql='select * from products where quantity=0 LIMIT 10';


     // echo $sql;
     $datas=fetch_custom($sql);


      ?>

     <div class="container-fluid   mtg_t ">
       <section class="text-center mb-4">

         <!--Grid row-->
         <div class="row mg_lr">
           <div class="col-md-10">
             <div class="row wow fadeIn">

               <!--Fourth column-->

                 <!--Card-->
                 <?php
                 if(count($datas)==0){
                   echo '
                   <h1>none</h1>

                   ';
                 }

                   foreach ($datas as $key => $data) {

                   echo '   <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card">

                       <!--Card image-->
                       <div class="view overlay">
                         <img src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Vertical/13.jpg" class="card-img-top"
                           alt="">
                         <a>
                           <div class="mask rgba-white-slight"></div>
                         </a>
                       </div>
                       <!--Card image-->

                       <!--Card content-->
                       <div class="card-body text-center">
                         <!--Category & Title-->
                        
                         <h5>
                           <strong>
                             <a href="./product_detail_stock.php?id='.$data['id'].' " class="dark-grey-text">'.$data['name'].'</a>
                           </strong>
                         </h5>

                         <h4 class="font-weight-bold blue-text">
                           <strong>'.$data['price'].'$</strong>
                         </h4>

                       </div>
                       <!--Card content-->

                     </div></div>';
                 }


                  ?>
                 <!--Card-->


               <!--Fourth column-->

             </div>
           </div>
           <div class="col-md-2">
             <ul class="list-group mb-3 z-depth-1">
               <?php
               // require 'cart.php';

               if(isset($_SESSION['stock'])){
                 $c=new Cart('stock');
                 $c->calcu_for_each_product_total_price();

                 foreach ($_SESSION['stock'] as $key => $value) {
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
                 // echo $c->get_total_price();

               }



                ?>

               <li class="list-group-item d-flex justify-content-between">
                 <span>Total (USD)</span>
                 <strong>$ <?php
                 if(isset($_SESSION['stock'])){
                 echo $c->get_total_price();
               }else{
                 echo "none";
               }

               ?> </strong>
               </li>
               <li class="list-group-item">
                 <a href="./stock_edit.php" class="btn btn-primary btn-md my-0 p waves-effect waves-light">edit</a>

               </li>

             </ul>
             <div class="">
               <a href="./ReStock_.php">ReStock</a>
             </div>
           </div>
         </div>

         <!--Grid row-->


       </section>
     </div>

    <?php include 'index_footer.html'; ?>
  </body>
</html>
