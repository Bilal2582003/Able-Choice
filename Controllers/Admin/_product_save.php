<?php
include "../../Model/connection.php";

$id = $_POST['id'] ?? 0;
$name = mysqli_real_escape_string($con,$_POST['name']);
$cat = (int)$_POST['product_category_id'];
$qty = (int)$_POST['qty'];
$amount = (int)$_POST['amount'];
$existing_images = ['image1' => '', 'image2' => '', 'image3' => ''];
if ($id > 0) {
    $old_data = mysqli_fetch_assoc(mysqli_query($con, "SELECT image1, image2, image3 FROM product WHERE id = $id"));
    $existing_images = $old_data;
}

if (isset($_FILES['images'])) {
    foreach ($_FILES['images']['name'] as $key => $val) {
        if ($_FILES['images']['error'][$key] == 0) {
            $temp = $_FILES['images']['tmp_name'][$key];
            $ext = pathinfo($val, PATHINFO_EXTENSION);
            $new_name = "prod_" . time() . "_" . $key . "." . $ext;
            $path = "../../Assets/Images/Products/" . $new_name;

            if (move_uploaded_file($temp, $path)) {
                // Map array index 0, 1, 2 to image1, image2, image3
                $index = $key + 1;
                $existing_images["image$index"] = $new_name;
            }
        }
    }
}

$img1 = $existing_images['image1'];
$img2 = $existing_images['image2'];
$img3 = $existing_images['image3'];

$desc = mysqli_real_escape_string($con,$_POST['description']);

if($id){
    mysqli_query($con,"UPDATE product SET name='$name',product_category_id='$cat',qty='$qty',amount='$amount',description='$desc', image1='$img1', image2='$img2', image3='$img3' WHERE id=$id");
    echo "Product updated!";
}else{
    mysqli_query($con,"INSERT INTO product(name,product_category_id,qty,amount,description, image1, image2, image3) VALUES('$name','$cat','$qty','$amount','$desc', '$img1', '$img2', '$img3')");
    echo "Product added!";
}
