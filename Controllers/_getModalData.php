<?php
include "../Model/connection.php";
if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $output = '';
    $query = "SELECT product.*,product_category.name as p_c_name from product join product_category on product.product_category_id = product_category.id where product.deleted_at is null and product.id = '$id'";
    $res = mysqli_query($con, $query);
    if (mysqli_num_rows($res) > 0) {
       while ($row = mysqli_fetch_assoc($res)) {
    if (!empty($row['image2']) && file_exists("../Assets/Images/Products/" . $row['image2'])) {
        $secondImg = '<div class="swiper-slide"><img style="height:450px; width:100%; object-fit:contain; background:#f9f9f9;" src="../Assets/Images/Products/' . $row['image2'] . '" alt=""></div>';
    } else {
        $secondImg = '';
    }
    if (!empty($row['image3']) && file_exists("../Assets/Images/Products/" . $row['image3'])) {
        $thirdImg = '<div class="swiper-slide"><img style="height:450px; width:100%; object-fit:contain; background:#f9f9f9;" src="../Assets/Images/Products/' . $row['image3'] . '" alt=""></div>';
    } else {
        $thirdImg = '';
    }

    $output = '
    <div class="row" style="color: #333;">
        <div class="col-lg-6">
            <div class="position-relative h-100" style="background: #fff; border-radius: 15px; overflow: hidden; box-shadow: 0 5px 15px rgba(0,0,0,0.05);">
                <div class="slides-1 portfolio-details-slider swiper">
                    <div class="swiper-wrapper align-items-center">
                        <div class="swiper-slide">
                            <img style="height:450px; width:100%; object-fit:contain; background:#f9f9f9;" src="../Assets/Images/Products/' . $row['image1'] . '" alt="">
                        </div>
                        ' . $secondImg . $thirdImg . '
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
                <div class="swiper-button-prev" style="color: #feb900 !important;"></div>
                <div class="swiper-button-next" style="color: #feb900 !important;"></div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="p-3">
                <div id="AddToCartId" style="display:none">' . $row['id'] . '</div>
                <h2 style="font-weight: 800; color: #212529; margin-bottom: 15px;">' . $row['name'] . '</h2>
                
                <div style="background: #fdf7e1; padding: 15px; border-radius: 10px; margin-bottom: 20px;">
                    <p style="margin-bottom: 5px; font-size: 14px; color: #666;">Price Per Unit</p>
                    <h3 style="color: #d9534f; font-weight: 700;">Rs: <span class="perAmount" id="perAmountPerAmount">' . $row['amount'] . '</span></h3>
                </div>

                <div class="row align-items-center gy-3">
                    <div class="col-sm-5">
                        <label class="fw-bold mb-1">Quantity:</label>
                        <div class="input-group" style="border: 1px solid #ddd; border-radius: 5px; overflow: hidden;">
                            <div class="input-group-prepend">
                                <button type="button" class="btn btn-light decrementBtn" style="border:none;">-</button>
                            </div>
                            <input type="text" style="border:none; text-align:center; background:#fff;" class="form-control qty qty1" min="1" value="1" readonly>
                            <div class="input-group-append">
                                <button type="button" class="btn btn-light incrementBtn" style="border:none;">+</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-7">
                        <p class="mb-0 fw-bold">Total Amount:</p>
                        <h4 style="color: #212529;">Rs. <span class="totalAmount totalAmountTotalAmount">' . $row['amount'] . '</span></h4>
                    </div>
                </div>

                <div class="mt-4">
                    <button class="btn cartBtn w-100 mb-2" id="AddToCartBtn" style="background: #333; color: #fff; padding: 12px; font-weight: 600; border-radius: 8px;">
                        <i class="bi bi-cart3 me-2"></i> ADD TO CART
                    </button>
                    <button class="btn cartBtn modalBuyNowBtn w-100" style="background: #feb900; color: #000; padding: 12px; font-weight: 700; border-radius: 8px; border: none;">
                        BUY IT NOW
                    </button>
                </div>
            </div>
        </div>

        <div class="col-12 mt-5">
            <div style="border-top: 1px solid #eee; padding-top: 30px;">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="portfolio-info" style="background: #f9f9f9; padding: 20px; border-radius: 10px;">
                            <h3 style="font-size: 18px; font-weight: 700; margin-bottom: 15px;">Product Information</h3>
                            <ul style="list-style: none; padding: 0;">
                                <li style="padding: 8px 0; border-bottom: 1px inset #eee;"><strong>Category:</strong> ' . $row['p_c_name'] . '</li>
                                <li style="padding: 8px 0; border-bottom: 1px inset #eee;"><strong>Brand:</strong> Able Choice Company</li>
                                <li style="padding: 8px 0; border-bottom: 1px inset #eee;"><strong>Stock:</strong> ' . $row['qty'] . ' Units</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <h3 style="font-size: 18px; font-weight: 700; margin-bottom: 15px;">Description</h3>
                        <p style="line-height: 1.8; color: #555;">' . $row['description'] . '</p>
                    </div>
                </div>
            </div>
        </div>
    </div>';
}

        echo $output;
    } else {
        echo "No Record Found!";
    }
}

?>