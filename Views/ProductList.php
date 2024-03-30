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
                <!-- <li data-filter=".filter-remodelin">Remodelin</li>
                <li data-filter=".filter-construction">Construction</li>
                <li data-filter=".filter-repairs">Repairs</li>
                <li data-filter=".filter-design">Design</li> -->

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

            <div class="row gy-4 portfolio-container h-100" data-aos="fade-up" data-aos-delay="200" id="productListDiv">

                <!-- <div class="col-lg-4 col-md-6 portfolio-item filter-remodelin">
                    <div class="portfolio-content h-100">
                        <img src="../Assets/Images/projects/remodeling-1.jpg" class="img-fluid" alt="">
                        <div class="portfolio-info">
                            <h4>Remodeling 1</h4>
                            <p>Lorem ipsum, dolor sit amet consectetur</p>
                            <a href="../Assets/Images/projects/remodeling-1.jpg" title="Remodeling 1"
                                data-gallery="portfolio-gallery-remodeling" class="glightbox preview-link"><i
                                    class="bi bi-zoom-in"></i></a>
                            <a href="ProductDetail.php" title="More Details" class="details-link"><i
                                    class="bi bi-link-45deg"></i></a>
                        </div>
                    </div>
                </div> -->

                <!-- <div class="col-lg-4 col-md-6 portfolio-item filter-construction">
                    <div class="portfolio-content h-100">
                        <img src="../Assets/Images/projects/construction-1.jpg" class="img-fluid" alt="">
                        <div class="portfolio-info">
                            <h4>Construction 1</h4>
                            <p>Lorem ipsum, dolor sit amet consectetur</p>
                            <a href="../Assets/Images/projects/construction-1.jpg" title="Construction 1"
                                data-gallery="portfolio-gallery-construction" class="glightbox preview-link"><i
                                    class="bi bi-zoom-in"></i></a>
                            <a href="ProductDetail.php" title="More Details" class="details-link"><i
                                    class="bi bi-link-45deg"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 portfolio-item filter-repairs">
                    <div class="portfolio-content h-100">
                        <img src="../Assets/Images/projects/repairs-1.jpg" class="img-fluid" alt="">
                        <div class="portfolio-info">
                            <h4>Repairs 1</h4>
                            <p>Lorem ipsum, dolor sit amet consectetur</p>
                            <a href="../Assets/Images/projects/repairs-1.jpg" title="Repairs 1"
                                data-gallery="portfolio-gallery-repairs" class="glightbox preview-link"><i
                                    class="bi bi-zoom-in"></i></a>
                            <a href="ProductDetail.php" title="More Details" class="details-link"><i
                                    class="bi bi-link-45deg"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 portfolio-item filter-design">
                    <div class="portfolio-content h-100">
                        <img src="../Assets/Images/projects/design-1.jpg" class="img-fluid" alt="">
                        <div class="portfolio-info">
                            <h4>Design 1</h4>
                            <p>Lorem ipsum, dolor sit amet consectetur</p>
                            <a href="../Assets/Images/projects/design-1.jpg" title="Repairs 1"
                                data-gallery="portfolio-gallery-book" class="glightbox preview-link"><i
                                    class="bi bi-zoom-in"></i></a>
                            <a href="../Assets/Images/projects/design-1.jpg" title="Repairs 1"
                                data-gallery="portfolio-gallery-book" class="glightbox preview-link"><i
                                    class="bi bi-zoom-in"></i></a>
                            <a href="ProductDetail.php" title="More Details" class="details-link"><i
                                    class="bi bi-link-45deg"></i></a>
                        </div>
                    </div>
                </div> -->

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
                        <!-- <div class="row" >
                            <div class="col-lg-6">
                               
                                <div class="position-relative h-50">
                                    <div class="slides-1 portfolio-details-slider swiper">
                                        <div class="swiper-wrapper align-items-center">
                                            <div class="swiper-slide">
                                                <img src="../Assets/Images/projects/remodeling-1.jpg" alt="">
                                            </div>
                                            <div class="swiper-slide">
                                                <img src="../Assets/Images/projects/construction-1.jpg" alt="">
                                            </div>
                                            <div class="swiper-slide">
                                                <img src="../Assets/Images/projects/design-1.jpg" alt="">
                                            </div>
                                            <div class="swiper-slide">
                                                <img src="../Assets/Images/projects/repairs-1.jpg" alt="">
                                            </div>
                                        </div>
                                        <div class="swiper-pagination"></div>
                                    </div>
                                    <div class="swiper-button-prev"></div>
                                    <div class="swiper-button-next"></div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                              
                                <div class="row justify-content-between gy-4 mt-4">
                                    <div class="col-lg-12">
                                        <div class="portfolio-description">
                                            <h2>This is an example of portfolio detail</h2>
                                            <p>
                                                Autem ipsum nam porro corporis rerum. Quis eos dolorem eos itaque
                                                inventore
                                                commodi labore quia quia. Exercitationem repudiandae officiis neque
                                                suscipit non
                                                officia eaque itaque enim. Voluptatem officia accusantium nesciunt est
                                                omnis
                                                tempora consectetur dignissimos. Sequi nulla at esse enim cum deserunt
                                                eius.
                                            </p>
                                            <p>
                                                Amet consequatur qui dolore veniam voluptatem voluptatem sit. Non
                                                aspernatur
                                                atque natus ut cum nam et. Praesentium error dolores rerum minus sequi
                                                quia
                                                veritatis eum. Eos et doloribus doloremque nesciunt molestiae
                                                laboriosam.
                                            </p>
                                            <div class="row"><span class="col-sm-2 text-center size">Qty: </span> <input
                                                    class="col-sm-4" type="number" value="1" min="1" id="qty">
                                                    <span class="col-sm-2 text-center size">Total:</span><div class="col-sm-4 " id="totalAmount">0</div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="row m-5">
                                <div class="col-lg-6">
                                    <div class="portfolio-info">
                                        <h3>Project information</h3>
                                        <div class="row">
                                            <div class="">
                                                <ul>
                                                    <li><strong>Category</strong> <span>Web design</span></li>
                                                    <li><strong>Brand</strong> <span>Able Choice Company</span></li>
                                                    <li><strong>Total Quantity</strong> <span>500</span></li>
                                                    <li><strong>Per Product Amount</strong> <span id="perAmount">2000</span></li>
                                                    
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6"
                                    style="display: flex; justify-content: center; align-items: center; margin: 10px auto;">
                                    <div class="row">
                                        <div class="col-12 mb-2">
                                            <button class="btn green btn-block" style="width: 80%;">Buy
                                                Now</button>
                                        </div>
                                        <div class="col-12">
                                            <button class="btn yellow btn-block" style="width: 80%;">Add To
                                                Cart</button>
                                        </div>
                                    </div>
                                </div>



                            </div>
                        </div> -->
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

    // function openModal(data, id) {
    //     $("#" + data).modal("show")
    //     if (data == 'moreDetailModal') {
    //         $.ajax({
    //             url: '../Controllers/_getModalData.php', // Replace with your server endpoint
    //             type: 'POST',
    //             data: {
    //                 id: id,
    //             },
    //             success: function (data) {
    //                 $("#moreDetailModalData").html(data)
    //                 // Initialize Swiper after HTML content is loaded
    //                 var swiper = new Swiper('.slides-1', {
    //                     slidesPerView: 1,
    //                     spaceBetween: 30,
    //                     loop: true,
    //                     pagination: {
    //                         el: '.swiper-pagination',
    //                         clickable: true,
    //                     },
    //                     navigation: {
    //                         nextEl: '.swiper-button-next',
    //                         prevEl: '.swiper-button-prev',
    //                     },
    //                 });
    //             }
    //         })
    //     }
    // }

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

    loadMoreProducts();
    // function checkScroll() {
    //     var productListDiv = $('#productListDiv');
    //     var scrollTop = $(document).scrollTop();
    //     var productListDivHeight = productListDiv.height();
    //     if (scrollTop > productListDivHeight + 50) {
    //         loadMoreProducts();
    //     }
    // }
    function totalAmount(qty) {
        var perAmount = $("#perAmount").html()
        var Total = $("#totalAmount").html(qty * perAmount)
    }
    $(document).ready(function () {
        totalAmount(1)
        $(document).on("change", "#qty", function () {
            var qty = $(this).val()
            totalAmount(qty)

        })
        $(document).on("change", "#qty", function () {
            var qty = $(this).val()
            totalAmount(qty)
        })
        // $("#moreDetail").on('click', function () {
        //     $('#exampleModal').modal("show")
        // })
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