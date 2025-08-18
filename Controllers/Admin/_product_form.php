<?php
include "../../Model/connection.php";
$id = $_GET['id'] ?? 0;
$data = ["id"=>0,"name"=>"","description"=>"","qty"=>"","amount"=>"","product_category_id"=>""];
if($id){
    $q = mysqli_query($con,"SELECT * FROM product WHERE id=$id");
    $data = mysqli_fetch_assoc($q);
}
$cats = mysqli_query($con,"SELECT * FROM product_category WHERE deleted_at IS NULL");
?>

<form id="productForm">
    <input type="hidden" name="id" value="<?= $data['id'] ?>">
    <div class="mb-3">
        <label>Name</label>
        <input type="text" name="name" value="<?= htmlspecialchars($data['name']) ?>" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Category</label>
        <select name="product_category_id" class="form-control">
            <?php while($c=mysqli_fetch_assoc($cats)){ ?>
            <option value="<?= $c['id'] ?>" <?= $c['id']==$data['product_category_id']?"selected":"" ?>><?= $c['name'] ?></option>
            <?php } ?>
        </select>
    </div>
    <div class="mb-3">
        <label>Qty</label>
        <input type="number" name="qty" value="<?= $data['qty'] ?>" class="form-control">
    </div>
    <div class="mb-3">
        <label>Amount</label>
        <input type="number" name="amount" value="<?= $data['amount'] ?>" class="form-control">
    </div>
    <div class="mb-3">
        <label>Description</label>
        <textarea name="description" class="form-control"><?= htmlspecialchars($data['description']) ?></textarea>
    </div>
    <button type="submit" class="btn btn-success">Save</button>
</form>

<script>
$("#productForm").on("submit",function(e){
    e.preventDefault();
    $.post("../../Controllers/Admin/_product_save.php", $(this).serialize(), function(res){
        alert(res);
        loadSection("../../Controllers/Admin/_products_list.php","#productsTable");
        $("#modalBox").modal("hide");
    });
});
</script>
