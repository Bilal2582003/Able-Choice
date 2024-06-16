<?php
session_start();
// if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])){
    include "../Model/connection.php";
    
    if(isset($_POST['page']) && $_POST['page'] == 'AddInAddToCart'){
        $id= $_POST['id'];
        $qty= $_POST['qty'];
        $amount= $_POST['amount'];
        $totalAmount= $_POST['totalAmount'];
        $ip =$_SESSION['token'];
        
        if(isset($_SESSION['user_id'])){
            $user_id= $_SESSION['user_id'] ;
            $queryCol = ' user_id, ip_address ';
            $queryVal = '"'.$user_id .'" , "'.$ip.'"';
            $test = " user_id = '$user_id' and ip_address = '$ip' ";
        }else{
            $queryCol = ' ip_address ';
            $queryVal = '"'.$ip.'"';
            $test =  "ip_address ='$ip'";
        }

        $query1="SELECT * from card_detail where product_id = $id and $test and deleted_at is null";
        $res1=mysqli_query($con,$query1);
        if(mysqli_num_rows($res1) > 0){
            $row1=mysqli_fetch_assoc($res1);
            $uId= $row1['id'];
            $query="UPDATE card_detail set qty = qty + $qty , total_amount = total_amount + $totalAmount where id = '$uId' ";
        }else{
            $query="INSERT INTO card_detail (product_id,qty,per_amount,total_amount,".$queryCol.")VALUE('$id','$qty','$amount','$totalAmount',$queryVal)";
        }

        $res=mysqli_query($con,$query);
        echo "1";
    }

?>