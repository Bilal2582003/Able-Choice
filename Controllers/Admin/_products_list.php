<?php
include "../../Model/connection.php";

$search = $_GET['search'] ?? '';
$where = "WHERE p.deleted_at IS NULL";
if($search != ''){
    $search = mysqli_real_escape_string($con, $search);
    $where .= " AND (p.name LIKE '%$search%' OR c.name LIKE '%$search%')";
}

$q = mysqli_query($con,"SELECT p.*, c.name as category 
    FROM product p 
    LEFT JOIN product_category c ON p.product_category_id=c.id 
    $where ORDER BY p.id DESC");
?>

<div class="d-flex justify-content-between mb-2">
    <!-- <input type="text" class="form-control w-25" id="productSearch" placeholder="Search product..."> -->
   
</div>

<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th>Image</th>
            <th>Name</th>
            <th>Category</th>
            <th>Qty</th>
            <th>Amount</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php $i=1; while($row=mysqli_fetch_assoc($q)){ ?>
        <tr>
            <td><?= $i++ ?></td>
            <td>
                <?php if($row['image1']){ ?>
                    <img src="../../Assets/Images/Products/<?= htmlspecialchars($row['image1']) ?>" style="width:50px;height:50px;object-fit:cover;">
                <?php } ?>
            </td>
            <td><?= htmlspecialchars($row['name']) ?></td>
            <td><?= htmlspecialchars($row['category']) ?></td>
            <td><?= (int)$row['qty'] ?></td>
            <td><?= number_format($row['amount']) ?></td>
            <td>
                <button class="btn btn-sm btn-warning" onclick="editProduct(<?= $row['id'] ?>)">Edit</button>
                <button class="btn btn-sm btn-danger" onclick="deleteProduct(<?= $row['id'] ?>)">Delete</button>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>

<script>
// $("#productSearch").on("keyup", function(){
//     let s = $(this).val();
//     loadSection("../../Controllers/Admin/_products_list.php?search="+s, "#productsTable");
// });
$("#productSearch").on("keyup", function(){
    let s = $(this).val();
    window.loadSection("../../Controllers/Admin/_products_list.php?search="+s, "#productsTable");
});
</script>
