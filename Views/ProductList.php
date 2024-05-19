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
                
                $query = "SELECT * from product_category where deleted_at is null";
                $res = mysqli_query($con, $query);
                while ($row = mysqli_fetch_assoc($res)) {
                    ?>
                    <li data-filter=".filter-<?php echo $row['name'] ?>" style="text-transform:uppercase;">
                        <?php echo $row['name'] ?>
                    </li>
                    <?php
                }
                ?>

            </ul><!-- End Projects Filters -->

            <div class="row gy-4 portfolio-container" data-aos="fade-up" data-aos-delay="200" id="productListDiv"
                >

                <?php

                // $counter = $_POST['counter'];
                $query = "SELECT product.*, product_category.name as product_category_name from product join product_category on product.product_category_id= product_category.id where product.deleted_at is null";
                $res = mysqli_query($con, $query);
                if (mysqli_num_rows($res) > 0) {
                    while ($row = mysqli_fetch_assoc($res)) {
                        ?>
                        <div class="col-lg-4 col-md-6 portfolio-item filter-<?php echo $row["product_category_name"] ?>">
                            <div class="portfolio-content h-100">
                                <img src="../Assets/Images/Products/<?php echo $row['image1'] ?>" class="img-fluid inImage"
                                    alt="">
                                <div class="portfolio-info">
                                    <h4 style="text-transform: capitalize">
                                        <?php echo $row['product_category_name'] ?>
                                    </h4>
                                    <p>
                                        <?php echo $row['name'] ?>
                                    </p>
                                    <!--button title="Add To Cart"
                                data-gallery="portfolio-gallery-book" class="glightbox preview-link " style="border:0px;background-color:transparent" onclick="openModal(`addToCartModal`)"><i
                                    class="bi bi-cart-plus"></i></button-->
                                    <button title="More Details" class="details-link"
                                        style="border:0px;background-color:transparent;" id="moreDetail"
                                        onclick="openModal(`moreDetailModal`, <?php echo $row['id'] ?> )"><i
                                            class="bi bi-link-45deg" style="content:" \f470""></i></button>
                                </div>
                            </div>
                        </div>


                        <?php
                    }

                }
                ?>
               
            </div><!-- End Projects Container -->

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

    // Function to load more products
    function loadMoreProducts() {
        $(document).ready(function () {
            // alert(page)
            $.ajax({
                url: '../Controllers/_getProduct.php', // Replace with your server endpoint
                type: 'POST',
                data: {
                    page: 'data',
                },
                success: function (data) {

                    // Append the new products to the product container
                    if (data != '0') {
                        $('#productListDiv').html(data);
                    } else {
                        alert("Opps! Product List is not found. ")
                    }

                },
            });
        })
    }

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




        function addInCartFunction(id, qty,amount, totalAmount){
            $.ajax({
                url: '../Controllers/_addInCart.php', // Replace with your server endpoint
                type: 'POST',
                data: {
                    id: id,
                    qty: qty,
                    amount: amount,
                    totalAmount:totalAmount,
                    page: 'AddInAddToCart',
                },
                success: function (data) {
                    // Append the new products to the product container
                    if (data == '1') {
                        // $('#productListDiv').html(data);
                        alert("successfully Added")
                        showCartData()
                    } else if (data == '0') {
                        // window.location.assign('Login.php')
                    }
                    console.log(data)

                },
            });
        }

        $(document).on('click', '#AddToCartBtn', function () {
            var id = $("#AddToCartId").html();
            var totalAmount = $(".totalAmountTotalAmount").html();
            var amount = $("#perAmountPerAmount").html();
            // alert(totalAmount)
            var qty = $("#AddToCartId").parent().find('.qty').val();
            addInCartFunction(id, qty,amount, totalAmount);
        })
        $(document).on('click', '.modalBuyNowBtn', function () {
            var id = $("#AddToCartId").html();
            var totalAmount = $(".totalAmountTotalAmount").html();
            var amount = $("#perAmountPerAmount").html();
            var qty = $("#AddToCartId").parent().find('.qty').val();
            // alert(id + ' '+totalAmount+' '+amount+' '+ qty)
            addInCartFunction(id, qty,amount, totalAmount);
            window.location.assign("CheckOut.php")
        })


        
        // Handle filter button click
        $('li[data-filter]').on('click', function () {
            var filterValue = $(this).data('filter');

            // Handle "All" button separately
            if (filterValue === '*') {
                // Show all portfolio items
                $('.portfolio-item').show("slow");
            } else {
                // Hide all portfolio items
                $('.portfolio-item').hide("sloe");

                // Show only the selected category
                $(filterValue).show("slow");
            }

            // Update active class
            $('li[data-filter]').removeClass('filter-active');
            $(this).addClass('filter-active');
        });
    })
</script>