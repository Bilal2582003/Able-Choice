<?php
include "../Model/connection.php";
if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $output = '';
    $query = "SELECT product.*,product_category.name as p_c_name from product join product_category on product.product_category_id = product_category.id where product.deleted_at is null and product.id = '$id'";
    $res = mysqli_query($con, $query);
    if (mysqli_num_rows($res) > 0) {
        while ($row = mysqli_fetch_assoc($res)) {
            if(!empty($row['image2'])){
                $secondImg = '<div class="swiper-slide">
                <img  height="450px" src="../Assets/Images/Products/' . $row['image2'] . '" alt="">
                </div>';
            }else{
                $secondImg = '';
            }
            if(!empty($row['image3'])){
                $thirdImg = '<div class="swiper-slide">
                <img  height="450px" src="../Assets/Images/Products/' . $row['image3'] . '" alt="">
            </div>';
            }else{
                $thirdImg = '';
            }
            $output = '
            <div class="row" >
                            <div class="col-lg-6">
                            <div class="position-relative h-50">
                                    <div class="slides-1 portfolio-details-slider swiper">
                                        <div class="swiper-wrapper align-items-center">
                                            <div class="swiper-slide">
                                                <img height="450px" src="../Assets/Images/Products/' . $row['image1'] . '" alt="">
                                            </div>
                                            ' . $secondImg .$thirdImg. '
                                            
                                            
                                        </div>
                                        <div class="swiper-pagination" ></div>
                                        </div>
                                    <div class="swiper-button-prev"></div>
                                    <div class="swiper-button-next"></div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <!-- Project Details -->
                                <div class="row justify-content-between gy-4 mt-4">
                                    <div class="col-lg-12">
                                    <div id="AddToCartId" style="display:none">' . $row['id'] . '</div>
                                        <div class="portfolio-description">
                                            <h4>This is ' . $row['name'] . '</h4>
                                            <!--div class="row"><span class="col-sm-2 text-center size">Qty: </span> <input
                                                    class="col-sm-4" type="number" value="1" min="1" id="qty">
                                                    <span class="col-sm-2 text-center size">Total:</span><div class="col-sm-4 " id="totalAmount">' . $row['amount'] . '</div>
                                            </div-->
                                            <p class="mb-0 text-secondary" style="text-align:left;display:inline;">Rs: <span class="text-secondary perAmount">' . $row['amount'] . '</span> </p>
                                            <span >&nbsp&nbsp&nbsp, Total Amount: <span class="totalAmount">' . $row['amount'] . '</span> </span>
                                            <br>

                                            <div class="row justify-content-flex-start" style="align-items:center">
                                            <div class="col-sm-4 ">
                                                <div class="input-group" >
                                                    <div class="input-group-prepend">
                                                        <button type="button"  class="btn btn-secondary decrementBtn">-</button>
                                                    </div>
                                                    <input type="text" style="border:none;text-align:center;"  class="col-sm-4 qty text-center qty1" min="1" value="1">
                                                    <div class="input-group-append">
                                                        <button type="button"  class="btn btn-secondary incrementBtn">+</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-7">
                                                <button class="btn cartBtn" id="AddToCartBtn">Add To Cart</button>
                                            </div>
                                        </div>
                                        
                                                <button class="btn  cartBtn">Buy Now</button>
                                            
                                        
                                    <br>
                                            
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="row m-5">
                                <div class="col-lg-4">
                                    <div class="portfolio-info">
                                        <h3>Product information</h3>
                                        <div class="row">
                                            <div class="">
                                                <ul>
                                                    <li><strong>Category</strong> <span>' . $row['p_c_name'] . '</span></li>
                                                    <li><strong>Brand</strong> <span>Able Choice Company</span></li>
                                                    <li><strong>Total Quantity</strong> <span>' . $row['quantity'] . '</span></li>
                                                    <li><strong>Per Product Amount</strong> <span >' . $row['amount'] . '</span></li>
                                                    <!-- <li><a href="#" class="btn-visit align-self-start">Visit Website</a></li> -->
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="portfolio-info">
                                    <h3>Product Detail</h3>
                                    <p>
                                    ' . $row['description'] . '.
                                </p> </div>
                                </div>



                            </div>
                        </div>
            ';
        }

        echo $output;
    } else {
        echo "No Record Found!";
    }
}

?>