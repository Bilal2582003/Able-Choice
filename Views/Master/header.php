
<?php
session_start();
include "breadcrumbHeader.php"; ?>

<body>
  <header id="header" class="header d-flex align-items-center">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <a href="index.html" class="logo d-flex align-items-center">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <h1>Able Choice<span></span></h1>
      </a>

      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
      <nav id="navbar" class="navbar">
        <ul>
          <li title="Home"><a href="Index.php" <?php if ($page == 'Index') {
            echo "class='active'";
          } ?>>Home</a></li>


          <li title="Product"><a href="Product.php" <?php if ($page == 'Product') {
            echo "class='active'";
          } ?>>Product</a></li>
          <!-- <li class="dropdown"><a href="#"><span>Dropdown</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
            <ul>
              <li><a href="#">Dropdown 1</a></li>
              <li class="dropdown"><a href="#"><span>Deep Dropdown</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
                <ul>
                  <li><a href="#">Deep Dropdown 1</a></li>
                  <li><a href="#">Deep Dropdown 2</a></li>
                  <li><a href="#">Deep Dropdown 3</a></li>
                  <li><a href="#">Deep Dropdown 4</a></li>
                  <li><a href="#">Deep Dropdown 5</a></li>
                </ul>
              </li>
              <li><a href="#">Dropdown 2</a></li>
              <li><a href="#">Dropdown 3</a></li>
              <li><a href="#">Dropdown 4</a></li>
            </ul>
          </li> -->
          <li title="About"><a href="About.php" <?php if ($page == 'About') {
            echo "class='active'";
          } ?>>About</a></li>
          <li title="Contact"><a href="Contact.php" <?php if ($page == 'Contact') {
            echo "class='active'";
          } ?>>Contact</a></li>
          <li onclick="openModal(`cartModal`, 0)" ><a>
              <!-- <div class="containerAddCArt"> -->
                <!-- <button type="button" class="btn" style="color:gold;" > -->
                  <i class="fa fa-shopping-cart btn text-warning" style="padding:10px;margin-left:0px; font-size:18px;font-weight:bolder"   aria-hidden="true" id="addToCardIcon"></i>
                  <span class="badge" id='addToCardIconValue'> 5 </span>
                  <!-- <span id="addToCardIconValue" style="position:absolute;top:-10px;right:-10px;background-color:red;color:white;border-radius:50%;padding:5px;">0</span>  -->
                <!-- </button> -->
              <!-- </div> -->

            </a></li>
            <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-user btn text-warning" style="padding:10px;margin-left:0px; font-size:18px;font-weight:bolder" aria-hidden="true"></i>
            </a>
            <ul class="dropdown-menu">
              <?php if (isset($_SESSION['user_id'])): ?>
                <li><a href="profile.php">Profile</a></li>
                <li><a href="logout.php">Logout</a></li>
              <?php else: ?>
                <li><a href="login.php">Login</a></li>
              <?php endif; ?>
            </ul>
          </li>
        </ul>
      </nav><!-- .navbar -->

    </div>
  </header>
  <?php include("Add-to-cart.php"); ?>