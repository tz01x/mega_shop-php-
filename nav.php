<!-- Navbar -->
<nav class="navbar fixed-top navbar-expand-lg navbar-light white scrolling-navbar">
  <div class="container">

    <!-- Brand -->
    <a class="navbar-brand waves-effect" href="./index.php" >
      <strong class="blue-text">MEGA Shop</strong>
    </a>

    <!-- Collapse -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Links -->
    <div class="collapse navbar-collapse" id="navbarSupportedContent">

      <!-- Left -->
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link waves-effect" href="./index.php">Home
            <span class="sr-only">(current)</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link waves-effect" href="./signup.php" >Sign Up</a>
          <!-- target="_blank" -->
        </li>
        <li class="nav-item">
          <a class="nav-link waves-effect" href="./login.php"
            >Log in</a>
        </li>
        <li class="nav-item">
          <a class="nav-link waves-effect" href="https://mdbootstrap.com/education/bootstrap/" target="_blank">
            Profile
          </a>
        </li>
      </ul>

      <!-- Right -->
      <ul class="navbar-nav nav-flex-icons">
        <li class="nav-item">
          <a class="nav-link waves-effect">
            <span class="badge red z-depth-1 mr-1"> 1 </span>
            <i class="fas fa-shopping-cart"></i>
            <span class="clearfix d-none d-sm-inline-block"> Cart </span>
          </a>
        </li>
        <li class="nav-item">
          <a href="https://www.facebook.com/mdbootstrap" class="nav-link waves-effect" target="_blank">
            <i class="fab fa-facebook-f"></i>
          </a>
        </li>
        <li class="nav-item">
          <a href="https://twitter.com/MDBootstrap" class="nav-link waves-effect" target="_blank">
            <i class="fab fa-twitter"></i>
          </a>
        </li>
        <?php
        if (isset($_SESSION['user_id'])){
            echo '<li class="nav-item">
              <a href="./logout.php" class="nav-link border border-light rounded waves-effect"
                target="_blank">
                logout
              </a>
            </li>';

        }else{

          echo '<li class="nav-item">
            <a href="#" class="nav-link border border-light rounded waves-effect"
              target="_blank">
              <i class="fab fa-github mr-2"></i> GitRipo
            </a>
          </li>';
        }


         ?>

      </ul>

    </div>

  </div>
</nav>
<!-- Navbar -->
