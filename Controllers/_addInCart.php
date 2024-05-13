<?php
session_start();
if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])){
    include "../Model/connection.php";
    
    if(isset($_POST['page'])){
        $ip =$_SERVER['REMOTE_ADDR'];
        $id= $_POST['id'];
        $user_id= $_SESSION['user_id'];
        $qty= $_POST['qty'];
        $query="INSERT INTO card_detail (user_id,product_id,qty,ip)VALUE('$user_id','$user_id','$qty','$ip')";
        $res=mysqli_query($con,$query);
        echo "1";
    }
}else{
    echo 0;
}
?>