<?php
$page="home";
session_start();
include "Master/header.php";
include "../Model/connection.php";


function setToken($con){

  if(!isset($_SESSION['token'])){

    $token =bin2hex(random_bytes(16));
     $query="SELECT * from card_detail where ip_address = '$token'";
    $res=mysqli_query($con, $query);
    if(mysqli_num_rows($res) <= 0){
      $_SESSION['token'] = $token;
    }else{
      setToken($con);
    }

  }

}
setToken($con);
// echo $_SESSION['token'];
?>
<style>
  .inImage{
    height:313px
  }
  #hero {
        position: relative;
        width: 100%;
        height:100vh;
        overflow: hidden;
    }

    #hero .info {
        z-index: 10;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }

   /* #hero .carousel-item {
        height: 100vh;
        background-size: cover;
        background-position: center;
    }

    @media (max-width: 768px) {
        #hero .info .container {
            padding: 0 15px;
        }

        #hero .carousel-item {
            height: auto;
        }
    }

    .btn-get-started {
        font-size: 16px;
        padding: 10px 30px;
    } */
</style>
  <!-- ======= Hero Section ======= -->
  <section id="hero" class="hero" >
 
    <div class="info d-flex align-items-center" style="width:80%">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-12 text-center " style="min-height:fit-content !important">
            <h2 data-aos="fade-down">Welcome</h2>
            <!-- <p data-aos="fade-up">Our Company name is <strong>Al-Sheikh Enterprise</strong>. We are providing our service till 25 years. We have <b>one of best quality products</b>.</p> -->
            <a data-aos="fade-up" data-aos-delay="200" href="Product.php" class="btn-get-started">Products</a>
          </div>
        </div>
      </div>
    </div>

    <div id="hero-carousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">

      <div class="carousel-item active" style="background-image: url(../Assets/Images/hero-carousel/room.webp)"></div>
      <div class="carousel-item" style="height:1300px;background-image: url(../Assets/Images/hero-carousel/chess-carousel.webp)"></div>
      <div class="carousel-item" style="background-image: url(../Assets/Images/hero-carousel/multipiccarousel.webp)"></div>
      <div class="carousel-item"  style="height:1300px;background-image: url(../Assets/Images/hero-carousel/Blank-4-Grids-Collage.webp)"></div>
   
      <!-- <div class="carousel-item" style="background-image: url(../Assets/Images/hero-carousel/hero-carousel-5.webp)"></div> -->

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

