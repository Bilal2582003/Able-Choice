<?php
$page = "ProductList";
include "../Model/connection.php";
?>

<style>
    .portfolio-item .img-fluid {
        height: 300px;
        /* Set the desired fixed height for the images */
        object-fit: cover;
        /* Ensure the entire image is visible within the fixed height */
        width: 100%;
        /* Maintain the aspect ratio */
    }

    .green {
        background-color: green;
        color: white;
        /* border: 2px solid white; */
        transition-duration: 0.4s;
        box-shadow: 0 2px 5px 0 lightgreen, 0 6px 10px 0 lightgreen;
        margin-bottom: 5%;
        /* Simple box shadow */
    }

    .green:hover {
        background-color: white;
        color: green;
        box-shadow: 0 2px 5px 0 green, 0 6px 10px 0 green;
        border: 2px solid lightgreen;
    }

    .yellow {
        background-color: gold;
        color: white;
        /* border: 2px solid white; */
        transition-duration: 0.4s;
        box-shadow: 0 4px 8px 0px chocolate, 0 3px 10px 1px burlywood;
        /* Simple box shadow */

    }

    .yellow:hover {
        background-color: white;
        color: gold;
        border: 2px solid yellow;
    }

    #qty {
        width: 30%;
        padding: 4px;
        font-size: 1rem;
        background-clip: padding-box;
        border-radius: 8px;
    }

    #totalAmount {
        width: 30%;
        padding: 4px;
        font-size: 1rem;
        background-clip: padding-box;
        border-radius: 8px;
    }

    .size {
        font-size: 21px;
    }

    .cross {
        border: none;
        background-color: white;
        font-size: 1.5rem;
        color: red;
    }

    .swiper-pagination-bullet {
        border: 1px solid black;
    }
    /* Container adjustment */
.portfolio-item {
    padding: 15px;
}

.portfolio-content {
    background: #fff;
    border-radius: 8px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.08);
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    position: relative;
    overflow: hidden;
}

/* Image zoom effect */
.portfolio-content img {
    transition: transform 0.5s ease;
    border-bottom: 3px solid transparent;
}

.portfolio-content:hover img {
    transform: scale(1.1);
}

/* New Hover Overlay - Modern Style */
.portfolio-content .portfolio-info {
    position: absolute;
    bottom: -100%; /* Hidden below */
    left: 0;
    right: 0;
    background: rgba(255, 255, 255, 0.95);
    padding: 20px;
    transition: all 0.4s ease;
    text-align: center;
    border-top: 3px solid gold; /* Construction Theme */
}

.portfolio-content:hover .portfolio-info {
    bottom: 0; /* Slides up on hover */
}

/* Content inside Info */
.portfolio-info h4 {
    font-size: 14px;
    color: #888;
    text-transform: uppercase;
    margin-bottom: 5px;
}

.portfolio-info p {
    font-size: 18px;
    font-weight: 700;
    color: #333;
    margin-bottom: 15px;
}

/* Amazing Hover Button */
.details-link-btn {
    display: inline-block;
    background: #feb900;
    color: #fff;
    padding: 8px 20px;
    border-radius: 50px;
    font-weight: 600;
    transition: 0.3s;
    border: none;
}

.details-link-btn:hover {
    background: #333;
    color: #feb900;
}

/* Fix Image Distortion */
.modal-img-container {
    width: 100%;
    height: 450px; /* Fixed height for the container */
    background: #f8f9fa;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 12px;
    overflow: hidden;
}

.modal-main-img {
    width: 100%;
    height: 100%;
    object-fit: contain; /* This prevents stretching - change to 'cover' if you want it full bleed */
    transition: 0.3s;
}

/* UI Enhancements */
.product-modal-wrapper {
    padding: 10px;
    color: #333;
}

.category-badge {
    background: #fff3cd;
    color: #856404;
    padding: 4px 12px;
    border-radius: 50px;
    font-size: 12px;
    font-weight: 700;
    text-transform: uppercase;
}

.product-title {
    font-size: 28px;
    font-weight: 800;
    margin-top: 10px;
    color: #212529;
}

.price-section {
    margin: 20px 0;
}

.price-section .amount {
    font-size: 24px;
    font-weight: 700;
    color: #d9534f;
}

/* Modern Quantity Selector */
.qty-selector {
    width: 140px;
    border: 1px solid #ddd;
    border-radius: 8px;
    overflow: hidden;
}

.qty-selector input {
    border: none !important;
    font-weight: bold;
}

.qty-selector .btn {
    border: none;
    background: #f1f1f1;
    color: #333;
}

.section-title {
    font-size: 18px;
    font-weight: 700;
    border-bottom: 2px solid #feb900;
    display: inline-block;
    margin-bottom: 15px;
}

.description-text {
    line-height: 1.8;
    color: #555;
}

.specs-card {
    background: #fdfdfd;
    padding: 20px;
    border: 1px solid #eee;
    border-radius: 8px;
}

/* The animation keyframes */
@keyframes cameraClick {
    0% {
        filter: brightness(1);
        transform: scale(1);
    }
    20% {
        filter: brightness(1.8); /* The flash */
        transform: scale(0.98); /* Slight shrink */
    }
    100% {
        filter: brightness(1);
        transform: scale(1);
    }
}

/* The class that triggers the animation */
.click-effect {
    animation: cameraClick 0.4s ease-out;
}

</style>
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>


<!-- ======= Our Projects Section ======= -->
<section id="projects" class="projects">
    <div class="container" data-aos="fade-up">

        <div class="section-header">
            <h2>Our Projects</h2>
            <p>Consequatur libero assumenda est voluptatem est quidem illum et officia imilique qui vel architecto
                accusamus fugit aut qui distinctio</p>
        </div>

        <div class="portfolio-isotope" data-portfolio-filter="*" data-portfolio-layout="masonry"
            data-portfolio-sort="original-order">

            <ul class="portfolio-flters" data-aos="fade-up" data-aos-delay="100">
                <li data-filter="*" class="filter-active">All</li>
                <?php
                $query = "SELECT * FROM product_category WHERE deleted_at IS NULL";
                $res = mysqli_query($con, $query);
                while ($row = mysqli_fetch_assoc($res)) {
                    ?>
                    <li data-filter=".filter-<?php echo $row['id'] ?>" style="text-transform:uppercase;">
                        <?php echo $row['name'] ?>
                    </li>
                    <?php
                }
                ?>
            </ul><!-- End Projects Filters -->

            <div class="row gy-4 portfolio-container" data-aos="fade-up" data-aos-delay="200" id="productListDiv">
                <?php
                // pehli dafa load hone wale 15 products (random har category se ek)
                $query = "SELECT p.*, c.name AS product_category_name, c.id AS category_id
                    FROM product p 
                    JOIN product_category c ON p.product_category_id = c.id
                    WHERE p.deleted_at IS NULL
                    ORDER BY RAND()
                    LIMIT 15
                ";
                $res = mysqli_query($con, $query);
                if (mysqli_num_rows($res) > 0) {
                    while ($row = mysqli_fetch_assoc($res)) {
                        ?>
                        <div class="col-lg-4 col-md-6 portfolio-item filter-<?php echo $row["category_id"] ?>">
                            <div class="portfolio-content h-100">
                                <div style="text-transform: uppercase; position:absolute; top:10px; left:10px; z-index:2; background:gold; padding:2px 10px; font-size:10px; font-weight:700; border-radius:3px;">
             <?php echo $row['product_category_name'] ?>
        </div>
                                <img src="../Assets/Images/Products/<?php echo $row['image1'] ?>" class="img-fluid inImage"
                                    alt="">
                                <div class="portfolio-info">
                                    <!-- <h4>
                                        <?php // echo $row['product_category_name'] ?>
                                    </h4> -->
                                    <p><?php echo $row['name'] ?></p>
                                    <button title="More Details" class="details-link-btn"
                                         id="moreDetail"
                                        onclick="openModal(`moreDetailModal`, <?php echo $row['id'] ?> )">
                                        <i class="bi bi-link-45deg"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>
            </div><!-- End Projects Container -->
            <!-- Load More Button -->
            <div class="text-center mt-4">
                <button id="loadMoreBtn" class="btn cartBtn" style="width:auto">Load More</button>
            </div>

        </div>

    </div>
</section><!-- End Our Projects Section -->


<!-- Modal structure -->
<div class="modal fade" style="--bs-modal-width:80%" id="moreDetailModal" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!-- Add your modal content here -->
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Product Details</h5>
                <button type="button" class="close cross" data-dismiss="modal" aria-label="Close"
                    onclick="closeModal('moreDetailModal')">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- ======= Projet Details Section ======= -->
                <section id="project-details" class="project-details">
                    <div class="container" id="moreDetailModalData" data-aos="fade-up" data-aos-delay="100">
                    </div>
                </section>
                <!-- End Projet Details Section -->
            </div>
            <div class="modal-footer">
                <!-- Add your modal footer content here -->
                <!-- For example: -->
                <button type="button" class="btn btn-secondary" onclick="closeModal('moreDetailModal')">Close</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="addToCartModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!-- Add your modal content here -->
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add to Cart</h5>
                <button type="button" class="close cross" onclick="closeModal('addToCartModal')">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Add your modal body content here -->
                <!-- For example: -->
                <p>This is the content of your modal.</p>
            </div>
            <div class="modal-footer">
                <!-- Add your modal footer content here -->
                <!-- For example: -->
                <button type="button" class="btn btn-secondary" onclick="closeModal('addToCartModal')">Close</button>
                <button type="button" onclick="closeModal('addToCartModal')" class="btn btn-primary">Save
                    changes</button>
            </div>
        </div>
    </div>
</div>

<? include "Master/footerLink.php"; ?>

<script>
    document.addEventListener("DOMContentLoaded", function () {

        // Function to load more products
        // function loadMoreProducts() {
        //     $(document).ready(function () {
        //         // alert(page)
        //         $.ajax({
        //             url: '../Controllers/_getProduct.php', // Replace with your server endpoint
        //             type: 'POST',
        //             data: {
        //                 page: 'data',
        //             },
        //             success: function (data) {

        //                 // Append the new products to the product container
        //                 if (data != '0') {
        //                     $('#productListDiv').html(data);
        //                 } else {
        //                     alert("Opps! Product List is not found. ")
        //                 }

        //             },
        //         });
        //     })
        // }

        function totalAmount(action, data) {
            var parent = $(data).parent().parent();
            var qty = $(parent).find('.qty');

            var parent_parent = $(parent).parent().parent().parent();
            var perAmount = $(parent_parent).find(".perAmount");
            var totalAmountElem = $(parent_parent).find(".totalAmount");
            if (qty.val()) {
                var qtyValue = parseInt(qty.val());
            } else {
                qtyValue = 1
            }

            if (action == '+') {
                qtyValue++;
            } else if (action == '-') {
                qtyValue--;
            }

            if (qtyValue < 1 && action != '*') {
                qtyValue = 1;
            }


            qty.val(qtyValue);

            var perAmountValue = parseFloat(perAmount.html());
            console.log(perAmountValue)
            var total = qtyValue * perAmountValue;
            totalAmountElem.html(total.toFixed(2));
            console.log(totalAmountElem)
        }

        $(document).ready(function () {
            let page = 1;

            // Load More
            $("#loadMoreBtn").on("click", function () {
                page++;
                $.ajax({
                    url: '../Controllers/_getProduct.php',
                    type: 'POST',
                    data: { page: page },
                    success: function (data) {
                        if (data != '0') {
                            $('#productListDiv').append(data);
                        } else {
                            $("#loadMoreBtn").hide();
                        }
                    }
                });
            });

            function qty1(element) {
                var parent = $(element).parent().find(".decrementBtn");
                console.log($(element).val())
                // if( $(element).val() ){
                totalAmount('*', parent);
                // }
            }

            $(document).on('click', '.incrementBtn', function () {
                // console.log("yes");
                totalAmount('+', $(this));
            });

            $(document).on('click', '.decrementBtn', function () {
                totalAmount('-', $(this));
            });

            $(document).on('keyup', '.qty1', function () {
                qty1(this)
            });




            function addInCartFunction(id, qty, amount, totalAmount) {
                $.ajax({
                    url: '../Controllers/_addInCart.php', // Replace with your server endpoint
                    type: 'POST',
                    data: {
                        id: id,
                        qty: qty,
                        amount: amount,
                        totalAmount: totalAmount,
                        page: 'AddInAddToCart',
                    },
                    success: function (data) {
                        // Append the new products to the product container
                        if (data == '1') {
                            // $('#productListDiv').html(data);
                            // alert("successfully Added")
                            showCartData()
                        } else if (data == '0') {
                            // window.location.assign('Login.php')
                        }
                        console.log(data)

                    },
                });
            }

            $(document).on('click', '#AddToCartBtn', function () {

            // Target the images inside the swiper
    const $images = $('.swiper-wrapper img');

    // Add the class to trigger CSS animation
    $images.addClass('click-effect');

    // Remove the class after animation finishes so it can be re-triggered
    setTimeout(function() {
        $images.removeClass('click-effect');
    }, 400);

                var id = $("#AddToCartId").html();
                var totalAmount = $(".totalAmountTotalAmount").html();
                var amount = $("#perAmountPerAmount").html();
                // alert(totalAmount)
                var qty = $("#AddToCartId").parent().find('.qty').val();
                addInCartFunction(id, qty, amount, totalAmount);
            })
            $(document).on('click', '.modalBuyNowBtn', function () {
                var id = $("#AddToCartId").html();
                var totalAmount = $(".totalAmountTotalAmount").html();
                var amount = $("#perAmountPerAmount").html();
                var qty = $("#AddToCartId").parent().find('.qty').val();
                // alert(id + ' '+totalAmount+' '+amount+' '+ qty)
                addInCartFunction(id, qty, amount, totalAmount);
                window.location.assign("CheckOut.php")
            })



            // Handle filter button click
            $('li[data-filter]').on('click', function () {
                var filterValue = $(this).data('filter');
                // alert(filterValue)
                // Handle "All" button separately
                if (filterValue === '*') {
                    // Show all portfolio items
                    $('.portfolio-item').fadeIn("slow");
                } else {
                    // Hide all portfolio items
                    $('.portfolio-item').hide();

                    // Show only the selected category
                    $(filterValue).fadeIn("slow");
                }

                // Update active class
                $('li[data-filter]').removeClass('filter-active');
                $(this).addClass('filter-active');
            });
        })
    })
</script>