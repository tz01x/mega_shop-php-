<!DOCTYPE html>
<html lang="en">

<?php include 'index_header.html'?>


<body>

  <?php
  session_start();
  // require("config/session.php");
  require("config/database.php");
  // require("config/get_queryes.php");
  include 'nav.php';

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

  $sql='select * from products where quantity>0 LIMIT 10';

  if ($catagorys !=''){
    $sql='select * from products where catagory_name="'.$catagorys.'" and quantity>0 LIMIT 10';
  }
  if($q!=''){
    $sql='select * from products where name like "'.$q.'%" and quantity>0 LIMIT 10';

  }
  // echo $sql;
  $datas=fetch_custom($sql);

  ?>


  <!--Main layout-->
  <main>
    <div class="container mtg_t">

      <!--Navbar-->
      <nav class="navbar navbar-expand-lg navbar-dark mdb-color lighten-3 mt-3 mb-5">

        <!-- Navbar brand -->
        <span class="navbar-brand">Categories:</span>

        <!-- Collapse button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav"
          aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Collapsible content -->
        <div class="collapse navbar-collapse" id="basicExampleNav">

          <!-- Links -->
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="./index.php">All
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <?php
            $catagorys=fetch_custom('select name from  catagory ');
            // print_r ($catagorys);

            foreach ($catagorys as  $key=>$c) {
              echo '<li class="nav-item ">
                <a class="nav-link" href="./index.php?catagory='.$c['name'].'">'.$c['name'].'

                </a>
              </li>';
            }
             ?>

          </ul>
          <!-- Links -->

          <form class="form-inline">
            <div class="md-form my-0">
              <input class="form-control mr-sm-2" name='q'type="text" placeholder="Search" aria-label="Search">
            </div>
          </form>
        </div>
        <!-- Collapsible content -->

      </nav>
      <!--/.Navbar-->

      <!--Section: Products v.3-->
      <section class="text-center mb-4">

        <!--Grid row-->
        <div class="row wow fadeIn">

          <!--Fourth column-->

            <!--Card-->

            <?php

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
                    <a href="./index.php?catagory='.$data['catagory_name'].'" class="grey-text">
                      <h5>'.$data['catagory_name'].'</h5>
                    </a>
                    <h5>
                      <strong>
                        <a href="./product_detail.php?id='.$data['id'].' " class="dark-grey-text">'.$data['name'].'</a>
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
        <!--Grid row-->


      </section>
      <!--Section: Products v.3-->
<div class="">

</div>

    </div>
  </main>
  <!--Main layout-->

<?php include 'index_footer.html' ?>
</body>

</html>
