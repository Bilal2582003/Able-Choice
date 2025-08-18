<?php
include "../../Model/connection.php";

$id = $_POST['id'] ?? 0;
$name = mysqli_real_escape_string($con,$_POST['name']);
$cat = (int)$_POST['product_category_id'];
$qty = (int)$_POST['qty'];
$amount = (int)$_POST['amount'];
$desc = mysqli_real_escape_string($con,$_POST['description']);

if($id){
    mysqli_query($con,"UPDATE product SET name='$name',product_category_id='$cat',qty='$qty',amount='$amount',description='$desc' WHERE id=$id");
    echo "Product updated!";
}else{
    mysqli_query($con,"INSERT INTO product(name,product_category_id,qty,amount,description) VALUES('$name','$cat','$qty','$amount','$desc')");
    echo "Product added!";
}
