<?php
session_start();
// if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])){
    include "../Model/connection.php";
    
    if(isset($_POST['page']) && $_POST['page'] == 'AddInAddToCart'){
        $id= $_POST['id'];
        $qty= $_POST['qty'];
        $amount= $_POST['amount'];
        $totalAmount= $_POST['totalAmount'];
        $ip =$_SERVER['REMOTE_ADDR'];
        
        if(isset($_SESSION['user_id'])){
            $user_id= $_SESSION['user_id'] ;
            $queryCol = ' user_id, ip_address ';
            $queryVal = '"'.$user_id .'" , "'.$ip.'"';
        }else{
            $queryCol = ' ip_address ';
            $queryVal = $ip;
        }
          $query="INSERT INTO card_detail (product_id,qty,per_amount,total_amount,".$queryCol.")VALUE('$id','$qty','$amount','$totalAmount',$queryVal)";
        $res=mysqli_query($con,$query);
        echo "1";
    }

?>