

<?php include("Master/headLinks.php");?>
<style>
#loginbody{
    margin: 0;
    padding: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    background: url('../../Assets/Images/hero-carousel/room.webp');
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    height: 100vh;
    font-family: 'Roboto', sans-serif;
}

.form-2-wrapper {
    background-color: rgba(200, 200, 200, 0.5);
    padding: 50px;
    border-radius: 8px;
    border:1px solid gold;
}
input.form-control{
    padding: 11px;
    border: none;
    border: 2px solid #405c7cb8;
    border-radius: 30px;
    background-color: transparent;
    font-family: Arial, Helvetica, sans-serif;
   
   
}
input.form-control:focus{
    box-shadow: none !important;
    outline: 0px !important;
    background-color: transparent;
}
button.login-btn{
    background: #b400ff;
    color: #fff;
    border: none;
    padding: 10px;
    border-radius: 30px;
}
.register-test a{
    color: #000;
}
.social-login button{
    border-radius: 30px;
}
</style>
<div id="loginbody">
<div class="container">
  <div class="row">
    <!-- Left Blank Side -->
    <div class="col-lg-6"></div>

    <!-- Right Side Form -->
    <div class="col-lg-6 d-flex align-items-center justify-content-center right-side">
      <div class="form-2-wrapper">
        <div class="logo text-center">
          <h2>ABLE CHOICE</h2>
        </div>
        <h2 class="text-center mb-4">Admin Login</h2>
        <form action="../../Controllers/Admin/_login.php" method="POST">
          <div class="mb-3 form-box">
            <input type="email" class="form-control" id="email" name="email" placeholder="Enter Your Email" required>
          </div>
          <div class="mb-3">
            <input type="password" class="form-control" id="password" name="password" placeholder="Enter Your Password" required>
          </div>
          <div class="mb-3">
            <div class="form-check">

              <a href="forget-3.html" class="text-decoration-none text-dark float-end">Forget Password</a>
            </div>

          </div>
          <button type="submit" class="btn btn-outline-dark text-warning bg-dark login-btn w-100 mb-3">Login</button>
        </form>

        <!-- Register Link -->
        <p class="text-center register-test mt-3">Don't have an account? <a href="signup.php" class="text-decoration-none">Register here</a></p>
      </div>
    </div>
  </div>
</div>
</div>
