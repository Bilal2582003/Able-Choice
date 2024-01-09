<?php
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
</style>
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
<div class="modal fade" id="moreDetailModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!-- Add your modal content here -->
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add to Cart</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="closeModal('moreDetailModal')">
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
                <button type="button" class="btn btn-secondary" onclick="closeModal('moreDetailModal')">Close</button>
                <button type="button" class="btn btn-primary" onclick="closeModal('moreDetailModal')">Save changes</button>
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
                <button type="button" class="close"  onclick="closeModal('addToCartModal')">
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
                <button type="button" onclick="closeModal('addToCartModal')" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

<script>
    function openModal(data){
        $("#"+data).modal("show")
    }
    function closeModal(data){
        $("#"+data).modal("hide")
    }
    // Function to load more products
    function loadMoreProducts() {
        $(document).ready(function () {
            var page = '<?php echo $page ?>';
            // alert(page)
            $.ajax({
                url: '../Controllers/_getProduct.php', // Replace with your server endpoint
                type: 'POST',
                data: {
                    page: page
                },
                success: function (data) {

                    // Append the new products to the product container
                    if (data !== '0') {
                        $('#productListDiv').append(data);
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
    $(document).ready(function () {
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