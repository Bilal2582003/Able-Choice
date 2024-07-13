<?php include ("Master/headLinks.php"); ?>
<style>
    #loginbody {
        margin: 0;
        padding: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        background: url('../Assets/Images/hero-carousel/room.jpg');
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
        border: 1px solid gold;
    }

    input.form-control {
        padding: 11px;
        border: none;
        border: 2px solid #405c7cb8;
        border-radius: 30px;
        background-color: transparent;
        font-family: Arial, Helvetica, sans-serif;


    }

    input.form-control:focus {
        box-shadow: none !important;
        outline: 0px !important;
        background-color: transparent;
    }

    button.login-btn {
        background: #b400ff;
        color: #fff;
        border: none;
        padding: 10px;
        border-radius: 30px;
    }

    .register-test a {
        color: #000;
    }

    .social-login button {
        border-radius: 30px;
    }
</style>
<div id="loginbody">
    <div class="container">
        <div class="row">
            <div class="col-lg-6"></div>
            <div class="col-lg-6 d-flex align-items-center justify-content-center right-side" style="height:100vh">
                <div class="form-2-wrapper pt-1 pb-1 pr-3 pl-3">
                    <div class="logo text-center">
                        <h2>ABLE CHOICE</h2>
                    </div>
                    <h2 class="text-center mb-4">SignUp</h2>
                    <form action="../Controllers/_register.php" method="POST">
                        <div class="row mb-3 form-box">
                            <div class="col-6">
                                <input type="text" class="form-control" id="name" name="name"
                                    placeholder="Enter Your Name" required>
                            </div>
                            <div class="col-6">
                                <input type="email" class="form-control" id="email" name="email"
                                    placeholder="Enter Your Email" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-6">
                                <input type="text" class="form-control" id="parent_name" name="parent_name"
                                    placeholder="Enter Parent Name">
                            </div>
                            <div class="col-6">
                                <input type="text" class="form-control" id="phone" name="phone"
                                    placeholder="Enter Your Phone Number">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-6">
                            <input type="password" class="form-control" id="password" name="password"
                            placeholder="Enter Your Password" required>
                            </div>
                            <div class="col-6">
                            <input type="text" class="form-control" id="address" name="address"
                            placeholder="Enter Your Address" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-6">
                            <input type="text" class="form-control" id="city" name="city" placeholder="Enter Your City"
                            required>
                            </div>
                            <div class="col-6">
                            <input type="text" class="form-control" id="state" name="state"
                                placeholder="Enter Your State" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-6">
                            <input type="text" class="form-control" id="postal_code" name="postal_code"
                            placeholder="Enter Your Postal Code" required>
                            </div>
                            <div class="col-6">
                            <input type="text" class="form-control" id="country" name="country"
                                placeholder="Enter Your Country" required>
                            </div>
                        </div>
                        <button type="submit"
                            class="btn btn-outline-dark text-warning bg-dark login-btn w-100">SignUp</button>
                    </form>
                    <p class="text-center register-test ">Already have an account! <a href="login.php"
                            class="text-decoration-none">Login Here</a></p>
                </div>
            </div>
        </div>
    </div>
</div>