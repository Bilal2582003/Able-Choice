<?php
$page="home";
include "Master/header.php";
include "../Model/connection.php";

?>
<style>
  .inImage{
    height:313px
  }
</style>
  <!-- ======= Hero Section ======= -->
  <section id="hero" class="hero">
 
    <div class="info d-flex align-items-center">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-6 text-center">
            <h2 data-aos="fade-down">Welcome to <span>Able Coice</span></h2>
            <p data-aos="fade-up">Our Company name is <strong>Al-Sheikh Enterprise</strong>. We are providing our service till 25 years. We have <b>one of best quality products</b>.</p>
            <a data-aos="fade-up" data-aos-delay="200" href="Product.php" class="btn-get-started">See Our Products</a>
          </div>
        </div>
      </div>
    </div>

    <div id="hero-carousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">

      <div class="carousel-item active" style="background-image: url(../Assets/Images/hero-carousel/room.jpg)"></div>
      <div class="carousel-item" style="height:1300px;background-image: url(../Assets/Images/hero-carousel/chess-carousel.png)"></div>
      <div class="carousel-item" style="background-image: url(../Assets/Images/hero-carousel/multipiccarousel.png)"></div>
      <div class="carousel-item"  style="height:1300px;background-image: url(../Assets/Images/hero-carousel/Blank-4-Grids-Collage.png)"></div>
   
      <!-- <div class="carousel-item" style="background-image: url(../Assets/Images/hero-carousel/hero-carousel-5.jpg)"></div> -->

      <a class="carousel-control-prev" href="#hero-carousel" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
      </a>

      <a class="carousel-control-next" href="#hero-carousel" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
      </a>

    </div>

  </section><!-- End Hero Section -->

  <main id="main">

  <?php
  include "ProductList.php";
  ?>
          </main>
  
  <?php
include "Master/footer.php";
?>

