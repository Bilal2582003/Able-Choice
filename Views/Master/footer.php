  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">

    <div class="footer-content position-relative">
      <div class="container">
        <div class="row">

          <div class="col-lg-4 col-md-6">
            <div class="footer-info">
              <h3>Able Choice</h3>
              <p>
                Able Choice <br>
                KARACHI, PAKISTAN<br><br>
                <strong>Phone:</strong> +92 3152180299 / +92 3132004039 <br>
                <strong>Email:</strong> support@ablechoice.com<br>
              </p>
              <div class="social-links d-flex mt-3">
                <a href="#" class="d-flex align-items-center justify-content-center"><i class="bi bi-twitter"></i></a>
                <a href="#" class="d-flex align-items-center justify-content-center"><i class="bi bi-facebook"></i></a>
                <a href="#" class="d-flex align-items-center justify-content-center"><i class="bi bi-instagram"></i></a>
                <a href="#" class="d-flex align-items-center justify-content-center"><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-2 col-md-2 footer-links">
            <h4>Main Pages</h4>
            <ul>
              <li><a href="Index.php">Home</a></li>
              <li><a href="Product.php">Product</a></li>
              <li><a href="About.php">About us</a></li>
              <li><a href="Contact.php">Contact</a></li>
              
            </ul>
          </div>
          <div class="col-lg-2 col-md-2 footer-links">
          <h4>&nbsp;</h4>
            <ul>
            <li><a href="Orders.php">Order</a></li>
            <?php if (isset($_SESSION['user_id'])): ?>
                <li><a href="profile.php">Profile</a></li>
                <li><a href="logout.php">Logout</a></li>
              <?php else: ?>
                <li><a href="login.php">Login</a></li>
              <?php endif; ?>
            </ul>
          </div>

          <!-- <div class="col-lg-4 col-md-4 footer-links">
            <h4>Our Product</h4>
            <ul>
              <li><a>Tables</a></li>
              <li><a>Decorative</a></li>
              <li><a>Health Care</a></li>
              <li><a>Animals</a></li>
            </ul>
          </div> -->

        </div>
      </div>
    </div>

    <div class="footer-legal text-center position-relative">
      <div class="container">
        <div class="copyright">
          &copy; Copyright <strong><span>Able Choice</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
          Designed by <a href="">Able Choice</a>
        </div>
      </div>
    </div>

  </footer>
  <!-- End Footer -->

  <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <div id="preloader"></div>
  

  <?php include "footerLink.php";?> 

  <body>
    <html>