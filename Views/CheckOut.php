<link rel="stylesheet" type="text/css" href="../Assets/Style/checkOut.css">
<?php
$page = "CheckOut";
session_start();
// $local_ip = shell_exec('ipconfig');
// preg_match('/IPv4 Address.*?: ([^\s]+)/', $local_ip, $matches);
// echo  (isset($matches[1]) ? $matches[1] : 'Not found');$page = "checkOut";
// echo "<br>"  .$_SESSION['unique_id'] = bin2hex(random_bytes(16));
include "Master/headLinks.php";
include "Master/footerLink.php";
include "../Model/connection.php";
?>
<?php include "Master/breadcrumbHeader.php"; ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<style>
    @charset "utf-8";
    /* CSS Document */

    /* CSS Reset */
    html,
    body,
    div,
    span,
    applet,
    object,
    iframe,
    h1,
    h2,
    h3,
    h4,
    h5,
    h6,
    p,
    blockquote,
    pre,
    a,
    abbr,
    acronym,
    address2,
    address2,
    big,
    cite,
    code,
    del,
    dfn,
    em,
    img,
    ins,
    kbd,
    q,
    s,
    samp,
    small,
    strike,
    strong,
    sub,
    sup,
    tt,
    var,
    b,
    u,
    i,
    center,
    dl,
    dt,
    dd,
    ol,
    ul,
    li,
    fieldset,
    form,
    label,
    legend,
    table,
    caption,
    tbody,
    tfoot,
    thead,
    tr,
    th,
    td,
    article,
    aside,
    canvas,
    details,
    embed,
    figure,
    figcaption,
    footer,
    header,
    hgroup,
    menu,
    nav,
    output,
    ruby,
    section,
    summary,
    time,
    mark,
    audio,
    video {
        margin: 0;
        padding: 0;
        border: 0;
        font-size: 100%;
        font: inherit;
        vertical-align: baseline;
    }

    /* HTML5 display-role reset for older browsers */
    article,
    aside,
    details,
    figcaption,
    figure,
    footer,
    header,
    hgroup,
    menu,
    nav,
    section {
        display: block;
    }

    body {
        line-height: 1;
    }

    ol,
    ul {
        list-style: none;
    }

    blockquote,
    q {
        quotes: none;
    }

    blockquote:before,
    blockquote:after,
    q:before,
    q:after {
        content: '';
        content: none;
    }

    table {
        border-collapse: collapse;
        border-spacing: 0;
    }


    /* Form Styles */
    form {
        width: 100%;
    }

    input[type="text"],
    input[type="password"],
    select,
    input[type="email"],
    input[type="tel"],
    input[type="date"],
    textarea {
        border: 1px solid #ddd;
        background-color: #fff;
        color: #959595;
        width: 100%;
        padding: 10px;
        font-size: 12px;
        margin: 7px 0 25px 0;
    }

    label {
        font-size: 14px;
    }

    select {
        height: 37px;
    }

    input[type="checkbox"] {
        margin: 5px 10px 5px 0px;
    }

    .user-pswd input[type="checkbox"] {
        margin: 5px 10px 5px 15px;
    }

    input[type="checkbox"]+p,
    input[type="radio"]+p {
        font-size: 15px;
        padding: 0 5px;
        display: inline;
        color: #959595;
    }

    input[type="radio"]+p {
        font-size: 13px;
        padding: 0 0 0 20px;
    }

    input[type="submit"] {
        padding: 10px 20px;
        color: #fff;
        background-color: #000;
        text-transform: uppercase;
        border: none;
        cursor: pointer;
    }

    input[type="submit"]:hover {
        background-color: #D6544E;
        border: none;
    }

    .coupon input[type="text"] {
        width: 160px;
    }

    .coupon input[type="submit"] {
        margin: 0 0 0 20px;
    }

    .order .redbutton {
        background-color: #D6544E;
        padding: 13px 30px;
        font-size: 14px;
        font-weight: 100;
        margin-top: 25px;
    }

    .order .redbutton:hover {
        background-color: #000;
        border: none;
    }

    textarea {
        height: 120px;
    }

    textarea:hover,
    input:hover {
        border: 1px solid #D6544E;
        background-color: #fff;
    }

    textarea:active,
    input:active {
        border: 1px solid #D6544E;
        background-color: #f5f5f5;
    }

    textarea:focus,
    input:focus {
        border: 1px solid #000;
        background-color: #f5f5f5;
    }

    label:not(.notes):after {
        content: "*";
        color: red;
        padding-left: 5px;
    }

    .notes {
        display: block;
        padding-top: 20px;
    }


    /* Grid Styles */
    * {
        box-sizing: border-box;
    }

    .wrapper {
        width: 100%;
        margin: 0 auto;
        margin-bottom: 100px;
    }

    .row:before,
    .row:after {
        content: " ";
        display: table;
    }

    .row:after {
        clear: both;
    }

    .col {
        margin-right: 16px;
        float: left;
    }

    .col:last-child {
        margin-right: 0;
    }

    .col-1,
    .col-2,
    .col-3,
    .col-4,
    .col-5,
    .col-6,
    .col-7,
    .col-8,
    .col-9,
    .col-10,
    .col-11,
    .col-12 {
        width: 100%;
    }

    .col-push-1,
    .col-push-2,
    .col-push-3,
    .col-push-4,
    .col-push-5,
    .col-push-6,
    .col-push-7,
    .col-push-8,
    .col-push-9,
    .col-push-10,
    .col-push-11 {
        margin-left: 0;
    }

    /* TABLET STARTS HERE */

    @media(min-width: 768px) {
        .wrapper {
            width: 768px;
        }

        .col-1,
        .col-2,
        .col-3,
        .col-4,
        .col-5,
        .col-6,
        .col-7,
        .col-8,
        .col-9,
        .col-10,
        .col-11 {
            width: 376px;
        }

        .col-12 {
            width: 100%;
        }

        .col-push-1,
        .col-push-2,
        .col-push-3,
        .col-push-4,
        .col-push-5,
        .col-push-6,
        .col-push-7,
        .col-push-8,
        .col-push-9,
        .col-push-10,
        .col-push-11 {
            margin-left: 392px;
        }

        .col:nth-child(2n+2) {
            margin-right: 0;
        }

    }


    /*DESKTOP STARTS HERE*/

    @media(min-width: 1136px) {
        .wrapper {
            width: 1136px;
        }

        .col-1 {
            width: 80px;
        }

        .col-2 {
            width: 176px;
        }

        .col-3 {
            width: 272px;
        }

        .col-4 {
            width: 368px;
        }

        .col-5 {
            width: 464px;
        }

        .col-6 {
            width: 560px;
        }

        .col-7 {
            width: 656px;
        }

        .col-8 {
            width: 752px;
        }

        .col-9 {
            width: 848px;
        }

        .col-10 {
            width: 944px;
        }

        .col-11 {
            width: 1040px;
        }

        .col-12 {
            width: 100%;
        }

        .col-push-1 {
            margin-left: 96px;
        }

        .col-push-2 {
            margin-left: 192px;
        }

        .col-push-3 {
            margin-left: 288px;
        }

        .col-push-4 {
            margin-left: 384px;
        }

        .col-push-5 {
            margin-left: 480px;
        }

        .col-push-6 {
            margin-left: 576px;
        }

        .col-push-7 {
            margin-left: 672px;
        }

        .col-push-8 {
            margin-left: 768px;
        }

        .col-push-9 {
            margin-left: 864px;
        }

        .col-push-10 {
            margin-left: 960px;
        }

        .col-push-11 {
            margin-left: 1056px;
        }

        .col:nth-child(2n+2) {
            margin-right: 16px;
        }

        .col:last-child {
            margin-right: 0;
        }
    }


    /* Main CSS Starts Here */
    body {
        font-family: 'Raleway', sans-serif;
        color: #959595;
    }

    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
        text-transform: uppercase;
        font-weight: 900;
        padding: 20px 0;
        color: #000;
    }

    h1 {
        font-size: 72px;
        color: #000;
    }

    h2 {
        font-size: 28px;
    }

    h3 {
        font-size: 16px;
    }

    h4 {
        font-size: 15px;
    }

    h5 {
        font-size: 14px;
    }

    h6 {
        font-size: 13px;
    }

    p {
        font-size: 13px;
        padding: 20px 0;
    }

    /* Heading Top Border Styles Start Here */
    h3 {
        position: relative;
    }

    h3.topborder {
        margin-top: 0;
    }

    h3.topborder:before {
        content: "";
        display: block;
        border-top: 1px solid #c2c2c2;
        width: 100%;
        height: 1px;
        position: absolute;
        top: 50%;
        z-index: 1;
    }

    h3.topborder span {
        background: #fff;
        padding: 0 10px 0 0;
        position: relative;
        z-index: 5;
    }

    /* Heading Top Border Styles End Here */


    header {
        height: 250px;
        background-image: url('http://lorempixel.com/1920/500');
        background-size: cover;
        text-align: center;
        line-height: 210px;
    }

    .white-space {
        height: 90px;
        border-bottom: 1px solid #ddd;
        box-shadow: 0px 12px 14px -10px #DDDDDD;
        -webkit-box-shadow: 0px 12px 14px -10px #DDDDDD;
        -moz-box-shadow: 0px 12px 14px -10px #DDDDDD;
        -o-box-shadow: 0px 12px 14px -10px #DDDDDD;

    }

    .fa-info {
        font-size: 24px;
        padding: 0 20px;
        color: #757575;
        line-height: 56px;
        vertical-align: middle;
    }

    a {
        color: #D6544E;
        font-size: 13px;
        text-decoration: none;
    }

    a:hover {
        color: #000;
    }

    .info-bar {
        height: 56px;
        background-color: #f5f5f5;
        margin: 20px 0;
    }

    .info-bar p:first-child {
        padding: 0;
    }

    .order {
        border: 12px solid #f5f5f5;
        padding: 30px;
        margin-top: 28px;
    }

    .order div:not(.qty) {
        width: 100%;
        /* border-bottom: 1px solid #DDDDDD; */
        padding: 20px 10px;
    }

    .order a {
        display: block;
    }

    .order p {
        padding: 0;
        line-height: 20px;
    }

    .order h4,
    h5 {
        padding: 0;
    }

    .order div:nth-child(6) {
        border: none;
    }

    .width50 {
        width: 50%;
        float: left;
    }

    .padleft {
        margin-left: 39px;
    }

    .padright {
        padding-right: 40px;
    }

    .inline {
        display: inline-block;
    }

    .alignright {
        float: right;
    }

    .prod-description {
        text-transform: uppercase;
        color: #000;
    }

    .qty {
        font-weight: 900;
        font-size: 13px;
        color: #000;
        padding-left: 4px;
    }

    .smalltxt {
        font-size: 9px;
        vertical-align: middle;
    }

    .paymenttypes {
        border: 1px solid #DDDDDD;
        width: 135px;
        padding: 0 8px;
        margin: 0 0 20px 10px;
        display: inline-block;
        vertical-align: middle;
    }

    .paypal {
        width: 39px;
        height: 13px;
    }

    .cards {
        width: 135px;
        height: 24px;
    }

    .difwidth {
        width: 150px;
        line-height: 20px;
    }

    .order .center {
        line-height: 40px;
        color: #000;
    }

    .table-image {

        thead {

            td,
            th {
                border: 0;
                color: #666;
                font-size: 0.8rem;
            }
        }

        td,
        th {
            vertical-align: middle;
            text-align: center;

            &.qty {
                max-width: 2rem;
            }
        }
    }

    .price {
        margin-left: 1rem;
    }
</style>



<body style="width:100%;padding-top:1px">

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="hero" style="height:350px;">

        <div class="info d-flex align-items-center">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6 text-center">
                        <h2 data-aos="fade-down"> <span>Able Coice</span></h2>

                    </div>
                </div>
            </div>
        </div>

        <div id="hero-carousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">

            <div class="carousel-item active" style="background-image: url(../Assets/Images/hero-carousel/room.webp)">
            </div>
            <!-- <div class="carousel-item" style="height:1300px;background-image: url(../Assets/Images/hero-carousel/chess-carousel.webp)"></div>
      <div class="carousel-item" style="background-image: url(../Assets/Images/hero-carousel/multipiccarousel.webp)"></div>
      <div class="carousel-item"  style="height:1300px;background-image: url(../Assets/Images/hero-carousel/Blank-4-Grids-Collage.webp)"></div> -->

            <!-- <div class="carousel-item" style="background-image: url(../Assets/Images/hero-carousel/hero-carousel-5.webp)"></div> -->

            <!-- <a class="carousel-control-prev" href="#hero-carousel" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
      </a>

      <a class="carousel-control-next" href="#hero-carousel" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
      </a> -->

        </div>

    </section><!-- End Hero Section -->

    <div class="white-space"></div>
    <div class="wrapper">
        <div class="row">
            <div class="col-12 col">
                <div class="info-bar">
                    <p><a style="cursor:pointer" href="Login.php">
                            <i class="fa fa-info"></i>
                            Returning customer? Click here to login</a>
                    </p>
                </div>
                <p>
                    If you have shopped with us before, please enter your details in the boxes below. If you are a new
                    customer please proceed to the Billing &amp; Shipping section.
                </p>
            </div>
        </div>
        <!-- <div class="row">
                <div class="col-12 col">
                    <form method="get" class="user-pswd">
                        <div class="width50 padright">
                            <label for="username">Username or email</label>
                            <input type="text" name="username" id="username" required>
                        </div>
                        <div class="width50">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" required>
                        </div>
                            <input type="submit" name="submit" value="Login"><input type="checkbox" value="1" name="checkbox"><p>Remember me</p>
                    </form>
                    <p><a href="#">Lost your password?</a></p>
                </div>
            </div> -->
        <!-- <div class="row">
                <div class="col-12 col">
                    <div class="info-bar">
                        <p>
                            <i class="fa fa-info"></i> 
                            Have a coupon? <a href="#">Click here to enter your code</a>
                        </p>
                    </div>
                </div>
            </div> -->
        <!-- <div class="row">
                <div class="col-6 col coupon">
                    <form method="get">
                        <input type="text" name="coupon" id="coupon" placeholder="Coupon code">
                        <input type="submit" name="submit" value="Apply Coupon">
                    </form>
                </div>
            </div> -->
        <div class="row">
            <form method="post" action="../Controllers/_placeOrder.php">
                <div class="col-7 col">
                    <h3 class="topborder"><span>Billing Details</span></h3>
                    <!-- <label for="country">Country</label>
                    <select name="country" id="country" required>
                        <option value="">Please select a country</option>
                        <option value="Canada">Canada</option>
                        <option value="Not Canada">Not Canada</option>
                    </select> -->

                    <?php
                    $name = '';
                    $email = '';
                    $phone = '';
                    $address_address = '';
                    $city = '';
                    $state = '';
                    $postal_code = '';
                    $country = '';
                    if (isset($_SESSION['user_id'])) {
                        $user_id = $_SESSION['user_id'];
                        $query = "SELECT user.*,address.address as address_address, address.city as city, address.state as state, address.postal_code as postal_code,address.country as country from user join address on address.user_id = user.id where user.id = '$user_id' and user.deleted_at is null";
                        $res = mysqli_query($con, $query);
                        if (mysqli_num_rows($res) > 0) {
                            $row = mysqli_fetch_assoc($res);
                            $name = $row['name'];
                            $email = $row['email'];
                            $phone = $row['phone'];
                            $address_address = $row['address_address'];
                            $city = $row['city'];
                            $state = $row['state'];
                            $postal_code = $row['postal_code'];
                            $country = $row['country'];
                        }
                    }

                    ?>


                    <div class="width50 padright">
                        <label for="fname">First Name</label>
                        <input type="text" name="fname" required value="<?php echo $name ?>" id="fname" required>
                    </div>
                    <div class="width50">
                        <label for="lname">Email</label>
                        <input type="text" name="email" id="email" value="<?php echo $email ?>" required>
                    </div>

                    <label for="address">Address</label>
                    <input type="text" name="address" value="<?php echo $address_address ?>" id="address" required>
                    <input type="text" name="address" id="address2" placeholder="Optional">
                    <label for="city">Country</label>
                    <select name="country" id="country" required>
                        <option value="pak">Pakistan</option>
                    </select>
                    <label for="state">State Name</label>
                    <input type="text" value="<?php echo $state ?>" name="state" id="state" required>
                    <div class="row">
                        <div class="col-sm-6">
                            <label for="City">City</label>
                            <input type="text" name="city" value="<?php echo $city ?>" id="city" required>
                        </div>
                        <div class="col-sm-6">
                            <label for="postcode">Postcode</label>
                            <input type="text" name="postcode" value="<?php echo $postal_code ?>" id="postcode"
                                placeholder="Postcode / Zip" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <label for="phone1">Phone 1</label>
                            <input type="text" name="phone1" value="<?php echo $phone ?>" id="phone1" required>
                        </div>
                        <div class="col-sm-6">
                            <label for="phone2">Phone 2</label>
                            <input type="text" name="phone2" id="phone2">
                        </div>
                    </div>


                    <!-- <h3 class="topborder"><span>Shipping Address</span></h3> -->
                    <div class="row">
                        <div class="col-sm-12">

                            <label for="notes" class="notes">Order Notes</label>
                            <textarea name="notes" id="notes"
                                placeholder="Notes about your order, e.g. special notes for delivery."></textarea>

                        </div>
                    </div>
                </div>
                <div class="col-5 col order">
                    <h3 class="topborder"><span>Your Order</span></h3>
                    <!-- <div class="row">
                        <h4 class="inline">Product</h4>
                        <h4 class="inline alignright">Total</h4>
                    </div> -->
                    <div style="max-height:400px; max-width:100%;overflow-y:auto">
                        <table class="table table-image">


                            <?php
                            $totalAmount = 0;
                            // session_start();
                            $user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';
                            $ipAddress = $_SESSION['token'];
                            $query = "SELECT c.*,p.image1 as img, p.name as p_name from card_detail as c join product as p on c.product_id = p.id where (c.user_id = '$user_id' or c.ip_address = '$ipAddress') and c.deleted_at is null";

                            $res = mysqli_query($con, $query);
                            if (mysqli_num_rows($res) > 0) {
                                while ($row = mysqli_fetch_assoc($res)) {
                                    $totalAmount += $row['total_amount'];
                                    echo '<tr rowspan="2">
                                <td style="display:none">' . $row['id'] . '</td>
                                           
                                            <td class="w-40">
                                                <img src="../Assets/Images/Products/' . $row['img'] . '"
                                                    class="img-fluid img-thumbnail" alt="Sheep">
                                            </td>
                                            <td colspan="5">
                                                <div class="row">
                                                    <p class="mb-0 " style="text-align:left">' . $row['p_name'] . '</p>
                                                    <p class="mb-0 text-secondary " style="text-align:left">Rs: <span
                                                            class="text-secondary perAmount">' . $row['per_amount'] . '</span></p>
                                                    <p class=" totalAmount" style="display:none">' . $row['total_amount'] . '</p>
                                                    <br>
                
                                                    <div class="input-group row">
                                                        <button type="button" class="decrementBtnCart col-lg-2 col-sm-2" onclick="updateAddToCart(this,' . $row['id'] . ')" >-</button>
                                                        <input type="text" style="border:none;text-align:center"
                                                            class="qty qty2 col-lg-5 col-sm-5" value="' . $row['qty'] . '">
                                                        <button type="button" class="incrementBtnCart col-lg-2 col-sm-2" onclick="updateAddToCart(this,' . $row['id'] . ')" >+</button>
                                                    </div>
                
                                                </div>
                
                                            </td>
                                            <td>
                                                <button onclick="deleteCartItem(this,' . $row['id'] . ')" style="font-size:large" class="btn btn-sm text-danger ">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </td>
                                        </tr>';
                                }
                            }
                            ?>
                            <!-- <p class="prod-description inline">Nice Dress
                        <div class="qty inline"><span class="smalltxt">x</span> 1</div>
                        </p> -->

                        </table>
                    </div>
                    <div class="row">
                        <h5 style="width:50%">Cart Subtotal</h5>
                        <p style="width:50%;text-align:right">Rs:<span id="totalSum"><?php echo $totalAmount; ?></span>
                        </p>
                    </div>
                    <div class="row">
                        <h5 style="width:50%">Shipping Cost</h5>
                        <p style="width:50%;text-align:right">Rs:<span id="shipTotal">200</span></p>
                    </div>
                    <div class="row">
                        <h5 style="width:50%">Order's Total </h5>
                        <p style="width:50%;text-align:right">Rs:<span id="netAmount"></span></p>
                    </div>
                    <!-- <div>

                        <p class="inline alignright center">Free Shipping</p>
                    </div> -->


                    <div>
                        <h3 class="topborder"><span>Payment Method</span></h3>
                        <input type="radio" required value="cashondelivery" class="payment_mode" name="payment" checked>
                        <p>Cash On Delivery (COD)</p>
                        <p class="padleft">

                        </p>
                    </div>

                    <!-- <div><input type="radio" value="cheque" name="payment">
                        <p>Cheque Payment</p>
                    </div> -->
                    <div>
                        <input type="radio" required value="banktransfer" class="payment_mode" name="payment">
                        <p>Bank Transfer</p>

                        <!-- <a href="#" class="padleft">What is Paypal?</a> -->
                    </div>
                    <input type="submit" name="submit" onclick="disableButton(this)" value="Place Order"
                        class="redbutton">
                </div>
            </form>
        </div>
    </div>
    <script>
        
        
        <?php
        include "../Assets/Script/addTocardFunc.js";
        ?>
        document.addEventListener("DOMContentLoaded", function () {


        function nextTab(tabIndex) {
            var sections = document.querySelectorAll('.checkout-form section');
            sections.forEach(function (section, index) {
                section.classList.remove('active');
                if (index === tabIndex) {
                    section.classList.add('active');
                }
            });
        }

        function prevTab(tabIndex) {
            var sections = document.querySelectorAll('.checkout-form section');
            sections.forEach(function (section, index) {
                section.classList.remove('active');
                if (index === tabIndex) {
                    section.classList.add('active');
                }
            });
        }
        setTimeout(() => {
            setNetAmount()
        }, 1000);
        function setNetAmount() {
            var a = document.getElementById("totalSum").innerHTML
            var b = document.getElementById("shipTotal").innerHTML
            document.getElementById("netAmount").innerHTML = parseInt(a) + parseInt(b)
        }

        function disableButton(button) {
            
            button.value = 'Processing...'; // Optionally change text to indicate processing
        }

        function placeOrder() {
            var name = document.getElementById('fname').value;
            var email = document.getElementById('email').value;
            var address = document.getElementById('address').value;
            var address2 = document.getElementById('address2').value;
            var country = document.getElementById('country').value;
            var state = document.getElementById('state').value;
            var city = document.getElementById('city').value;
            var postcode = document.getElementById('postcode').value;
            var phone1 = document.getElementById('phone1').value;
            var phone2 = document.getElementById('phone2').value;
            var notes = document.getElementById('notes').value;
            var shipTotal = document.getElementById('shipTotal').value;
            var payment_mode = '';
            $(".payment_mode").each(function () {
                if ($(this).prop('checked') == true) {
                    payment_mode = $(this).val()
                }
            })

            if (name != '' && email != '' && address != '' && address != '' && address2 != '' && country != '' && state != '' && city != '' && postcode != '' && phone1 != '' && payment_mode != '') {
                $.ajax({

                })
            }

        }
        
    })


    </script>