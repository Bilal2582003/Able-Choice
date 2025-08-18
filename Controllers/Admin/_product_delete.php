<?php
include "../../Model/connection.php";
$id = (int)$_POST['id'];
mysqli_query($con,"UPDATE product SET deleted_at=NOW() WHERE id=$id");
echo "Deleted successfully";
