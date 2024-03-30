<?php
include "../Model/connection.php";

;
$html = '';
// $counter = $_POST['counter'];
$query = "SELECT product.*, product_category.name as product_category_name from product join product_category on product.product_category_id= product_category.id where product.deleted_at is null";
$res = mysqli_query($con, $query);
if (mysqli_num_rows($res) > 0) {
        while ($row = mysqli_fetch_assoc($res)) {
            $html .= '
            <div class="col-lg-4 col-md-6 portfolio-item filter-' . $row["product_category_name"] . '" >
            <div class="portfolio-content h-100" >
            <img src="../Assets/Images/Products/' . $row['image1'] . '" class="img-fluid inImage" alt="">
            <div class="portfolio-info">
            <h4 style="text-transform: capitalize">
            ' . $row['product_category_name'] . '
            </h4>
            <p>
                    ' . $row['name'] . '
                    </p>
                    <button title="Add To Cart"
                                data-gallery="portfolio-gallery-book" class="glightbox preview-link " style="border:0px;background-color:transparent" onclick="openModal(`addToCartModal`)"><i
                                    class="bi bi-cart-plus"></i></button>
                    <button title="More Details" class="details-link" style="border:0px;background-color:transparent" id="moreDetail" onclick="openModal(`moreDetailModal`, ' . $row['id'] .' )"><i
                    class="bi bi-link-45deg" style="content:"\f470""></i></button>
                    </div>
                    </div>
                    </div>';



        }
        echo $html;
} else {
    echo '0';
}
?>