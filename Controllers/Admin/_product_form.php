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
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">

<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

<form id="productForm" enctype="multipart/form-data">
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
        <label>Images</label>
        <div class="d-flex gap-2">

            <input type="file" name="images[]" class="form-control " style="width: 30% !important;">
            <input type="file" name="images[]" class="form-control " style="width: 30% !important;">
            <input type="file" name="images[]" class="form-control " style="width: 30% !important;">
            </div>
            <div class="d-flex gap-2">

            <?php
        for($i = 1; $i<=3; $i++){
            if(isset($data["image$i"]) && $data["image$i"]  && file_exists("../../Assets/Images/Products/".$data["image$i"])){
                echo "<img src='../../Assets/Images/Products/{$data["image$i"]}' width='100'>";
            }

        }?>
            </div>
    </div>
    <div class="mb-3">
        <label>Description</label>
        <textarea name="description" id="summernote" class="form-control"><?= htmlspecialchars($data['description']) ?></textarea>
    </div>
    <button type="submit" class="btn btn-success">Save</button>
</form>

<script>
$(document).ready(function() {
    // 1. Initialize Summernote
    $('#summernote').summernote({
        placeholder: 'Write your product description here...',
        tabsize: 2,
        height: 200,
        toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']],
          ['insert', ['link', 'picture', 'video']],
          ['view', ['fullscreen', 'codeview', 'help']]
        ]
    });
// $("#productForm").on("submit",function(e){
//     e.preventDefault();
//     // This line ensures the editor content is saved into the textarea
//         $('#summernote').summernote('code');
//     $.post("../../Controllers/Admin/_product_save.php", $(this).serialize(), function(res){
//         alert(res);
//         loadSection("../../Controllers/Admin/_products_list.php","#productsTable");
//         $("#modalBox").modal("hide");
//     });
// });
$("#productForm").on("submit", function(e) {
    e.preventDefault();

    // 1. Manually trigger Summernote to sync its HTML content to the textarea
    $('#summernote').summernote('code');

    // 2. Use FormData to capture everything (Text + Files)
    var formData = new FormData(this);

    $.ajax({
        url: "../../Controllers/Admin/_product_save.php",
        type: "POST",
        data: formData,
        processData: false,  // Essential: Tells jQuery not to process the data
        contentType: false,  // Essential: Tells jQuery not to set a content type header
        success: function(res) {
            alert(res);
            // Refresh your table and hide modal
            if (typeof loadSection === "function") {
                loadSection("../../Controllers/Admin/_products_list.php", "#productsTable");
            }
            $("#modalBox").modal("hide");
        },
        error: function(xhr, status, error) {
            console.error("Error: " + error);
            alert("Something went wrong while saving.");
        }
    });
});
})
</script>
