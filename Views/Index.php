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
        <!-- ======= Our Projects Section ======= -->
        <!-- <section id="projects" class="projects">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>Our Projects</h2>
          <p>Consequatur libero assumenda est voluptatem est quidem illum et officia imilique qui vel architecto accusamus fugit aut qui distinctio</p>
        </div>

        <div class="portfolio-isotope" data-portfolio-filter="*" data-portfolio-layout="masonry" data-portfolio-sort="original-order">

          <ul class="portfolio-flters" data-aos="fade-up" data-aos-delay="100">
            <li data-filter="*" class="filter-active">All</li>
            <li data-filter=".filter-remodelin">Remodelin</li>
            <li data-filter=".filter-construction">Construction</li>
            <li data-filter=".filter-repairs">Repairs</li>
            <li data-filter=".filter-design">Design</li>

            <?php
            $query="SELECT * from product_category where deleted_at is null";
            $res=mysqli_query($con,$query);
            while($row=mysqli_fetch_assoc($res)){
              ?>
              <li data-filter=".filter-<?php echo $row['name']?>" style="text-transform:uppercase;"><?php echo $row['name']?></li>
              <?php
            }
            ?>

          </ul>

          <div class="row gy-4 portfolio-container" data-aos="fade-up" data-aos-delay="200" id="">

            <div class="col-lg-4 col-md-6 portfolio-item filter-remodelin">
              <div class="portfolio-content h-100">
                <img src="../Assets/Images/projects/remodeling-1.jpg" class="img-fluid" alt="">
                <div class="portfolio-info">
                  <h4>Remodeling 1</h4>
                  <p>Lorem ipsum, dolor sit amet consectetur</p>
                  <a href="../Assets/Images/projects/remodeling-1.jpg" title="Remodeling 1" data-gallery="portfolio-gallery-remodeling" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                  <a href="ProductDetail.php" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
                </div>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 portfolio-item filter-construction">
              <div class="portfolio-content h-100">
                <img src="../Assets/Images/projects/construction-1.jpg" class="img-fluid" alt="">
                <div class="portfolio-info">
                  <h4>Construction 1</h4>
                  <p>Lorem ipsum, dolor sit amet consectetur</p>
                  <a href="../Assets/Images/projects/construction-1.jpg" title="Construction 1" data-gallery="portfolio-gallery-construction" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                  <a href="ProductDetail.php" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
                </div>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 portfolio-item filter-repairs">
              <div class="portfolio-content h-100">
                <img src="../Assets/Images/projects/repairs-1.jpg" class="img-fluid" alt="">
                <div class="portfolio-info">
                  <h4>Repairs 1</h4>
                  <p>Lorem ipsum, dolor sit amet consectetur</p>
                  <a href="../Assets/Images/projects/repairs-1.jpg" title="Repairs 1" data-gallery="portfolio-gallery-repairs" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                  <a href="ProductDetail.php" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
                </div>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 portfolio-item filter-design">
              <div class="portfolio-content h-100">
                <img src="../Assets/Images/projects/design-1.jpg" class="img-fluid" alt="">
                <div class="portfolio-info">
                  <h4>Design 1</h4>
                  <p>Lorem ipsum, dolor sit amet consectetur</p>
                  <a href="../Assets/Images/projects/design-1.jpg" title="Repairs 1" data-gallery="portfolio-gallery-book" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                  <a href="../Assets/Images/projects/design-1.jpg" title="Repairs 1" data-gallery="portfolio-gallery-book" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                  <a href="ProductDetail.php" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
                </div>
              </div>
            </div>

            <?php
            $query="SELECT product.*, product_category.name as product_category_name from product join product_category on product.product_category_id= product_category.id where product.deleted_at is null limit 24";
            $res=mysqli_query($con,$query);
            while($row=mysqli_fetch_assoc($res) ){
              ?>
                <div class="col-lg-4 col-md-6 portfolio-item filter-<?php echo $row['product_category_name']?>">
              <div class="portfolio-content h-100">
                <img src="../Assets/Images/Products/<?php echo $row['image1']?>" class="img-fluid inImage" alt="">
                <div class="portfolio-info">
                  <h4 style="text-transform:capitalize"><?php echo $row['product_category_name']?></h4>
                  <p><?php echo $row['name']?></p>
                  <?php
                  if(!empty($row['image2']) ){
                    ?>
                  <a href="../Assets/Images/Products/<?php echo $row['image1']?>" title="<?php echo $row['name']?>" data-gallery="portfolio-gallery-<?php echo $row['product_category_name']?>" class="glightbox preview-link inImage"><i class="bi bi-zoom-in"></i></a>

                  <a href="../Assets/Images/Products/<?php echo $row['image2']?>" title="<?php echo $row['name']?>" data-gallery="portfolio-gallery-<?php echo $row['product_category_name']?>" class="glightbox inImage"></a>
                    <?php
                  }
                  if(!empty($row['image3'])){
                    ?>
                    <a href="../Assets/Images/Products/<?php echo $row['image3']?>" title="<?php echo $row['name']?>" data-gallery="portfolio-gallery-<?php echo $row['product_category_name']?>" class="glightbox inImage"></a>
                    <?php
                  }
                  ?>
                  <a href="ProductDetail.php" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
                </div>
              </div>
            </div>
              <?php
            }
            ?>


          </div>

        </div>

      </div>
    </section> -->
    <!-- End Our Projects Section -->
  </main><!-- End #main -->
  
  <?php
include "Master/footer.php";
?>

<script>
  var main =document.getElementById("main")
  main.style = 'display:block'

</script>