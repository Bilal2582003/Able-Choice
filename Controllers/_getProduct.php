<?php
include "../Model/connection.php";

$html = '';

$limit = 15; // ek dafa me 15 products
$page = isset($_POST['page']) ? (int)$_POST['page'] : 1;
$offset = ($page - 1) * $limit;

// Random products load karne ka query
$query = "
    SELECT p.*, c.name as product_category_name, c.id as category_id
    FROM product p
    JOIN product_category c ON p.product_category_id = c.id
    WHERE p.deleted_at IS NULL
    ORDER BY RAND()
    LIMIT $limit OFFSET $offset
";

$res = mysqli_query($con, $query);

if (mysqli_num_rows($res) > 0) {
    while ($row = mysqli_fetch_assoc($res)) {
        $html .= '
        <div class="col-lg-4 col-md-6 portfolio-item filter-' . $row["category_id"] . '">
            <div class="portfolio-content h-100">
                <img src="../Assets/Images/Products/' . $row['image1'] . '" class="img-fluid inImage" alt="">
                <div class="portfolio-info">
                    <h4 style="text-transform: capitalize">' . $row['product_category_name'] . '</h4>
                    <p>' . $row['name'] . '</p>
                    <button title="More Details" class="details-link"
                        style="border:0px;background-color:transparent;" id="moreDetail"
                        onclick="openModal(`moreDetailModal`, ' . $row['id'] . ')">
                        <i class="bi bi-link-45deg"></i>
                    </button>
                </div>
            </div>
        </div>';
    }
    echo $html;
} else {
    echo '0';
}
?>
