<?php
$page = "Contact";
session_start();

include "Master/header.php";
?>

<main id="main">

  <!-- set breadcrumb -->
  <?php include "Master/breadcrumb.php"; ?>
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
     <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Roboto:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Work+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet"> 


  <!-- ======= Contact Section ======= -->
  <section id="contact" class="contact">
    <div class="container" data-aos="fade-up" data-aos-delay="100">

      <div class="row gy-4">
        <div class="col-lg-6">
          <div class="info-item  d-flex flex-column justify-content-center align-items-center">
            <i class="bi bi-map"></i>
            <h3>Our Address</h3>
            <p>Saba Cenema, KARACHI PAKISTAN</p>
          </div>
        </div><!-- End Info Item -->

        <div class="col-lg-3 col-md-6">
          <div class="info-item d-flex flex-column justify-content-center align-items-center">
            <i class="bi bi-envelope"></i>
            <h3>Email Us</h3>
            <p>support@ablechoice.com</p>
          </div>
        </div><!-- End Info Item -->

        <div class="col-lg-3 col-md-6">
          <div class="info-item  d-flex flex-column justify-content-center align-items-center">
            <i class="bi bi-telephone"></i>
            <h3>Call Us</h3>
            <p>+92 3152180299 / +92 3132004039</p>
            <p></p>
          </div>
        </div><!-- End Info Item -->

      </div>

      <div class="row gy-4 mt-1">

        <div class="col-lg-6 ">
          <iframe
            src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621"
            frameborder="0" style="border:0; width: 100%; height: 384px;" allowfullscreen></iframe>
        </div><!-- End Google Maps -->

        <div class="col-lg-6">
          <!-- <form action="../Controllers/_contact.php" method="post" class="p-2" > -->
          <form method="post" class="p-2" id="contactForm" >
            <div class="row gy-4 p-2">
              <div class="col-lg-6 form-group">
                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
              </div>
              <div class="col-lg-6 form-group">
                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
              </div>
            </div>
            <div class="form-group m-2">
              <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
            </div>
            <div class="form-group m-2">
              <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
            </div>
           
            <div class="text-center"><button type="submit" class="btn btn-warning p-2 ">Send Message</button></div>
          </form>

        </div><!-- End Contact Form -->

      </div>

    </div>
  </section><!-- End Contact Section -->


</main><!-- End #main -->
<?php
include "Master/footer.php";
?>
<script>
  // const ApiUrl = "https://cybernsoft.com/Able-Choice/Controllers/SendMail.php";
  const ApiUrl = "../Controllers/Conntect.php";
const form = document.getElementById("contactForm");

form.addEventListener("submit", async (e) => {
  e.preventDefault(); // stop page reload

  const formData = new FormData(form);
  formData.append("fromUrl", "Able-Choice");
  try {
    const response = await fetch(ApiUrl, {
      method: "POST",
      body: formData
    });

    const result = await response.json(); // or .json() if API returns JSON
    console.log("Server response:", result);

    // optional success handling
    alert("Form submitted successfully!");
    form.reset();

  } catch (error) {
    console.error("Error submitting form:", error);
    alert("Something went wrong. Please try again.");
  }
});
</script>