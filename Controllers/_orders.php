<?php
include '../Model/connection.php';
session_start();
if (isset($_POST['action'])) {
    $token= $_SESSION['token'] ;
    
    if (isset($_POST['forTable'])) {

        if(isset($_SESSION['user_id'])){
            $user_id= $_SESSION['user_id'] ;
            $test = " orders.user_id = '$user_id' or orders.ip_address = '$token' ";
        }else{
            $test =  " orders.ip_address ='$token'";
        }

        $output = '';
        if ($_POST['action'] === 'active') {

            $sql = "SELECT order_items.*,product.image1 as image, product.name as pName, orders.payment_method as mode FROM order_items 
            JOIN orders ON order_items.order_id = orders.id 
            JOIN product ON order_items.product_id = product.id 
            WHERE order_items.is_active = 1 and ($test)";
        }
        if ($_POST['action'] === 'cancel') {

            $sql = "SELECT order_items.*,product.image1 as image, product.name as pName, orders.payment_method as mode FROM order_items 
            JOIN orders ON order_items.order_id = orders.id 
            JOIN product ON order_items.product_id = product.id 
            WHERE order_items.is_cancelled = 1 and ($test)";
        }
        if ($_POST['action'] === 'completed') {

            $sql = "SELECT order_items.*,product.image1 as image, product.name as pName, orders.payment_method as mode FROM order_items 
            JOIN orders ON order_items.order_id = orders.id 
            JOIN product ON order_items.product_id = product.id 
            WHERE order_items.is_completed = 1 and ($test)";
        }
        if ($_POST['action'] === 'all') {

            $sql = "SELECT order_items.*,product.image1 as image, product.name as pName, orders.payment_method as mode FROM order_items 
            JOIN orders ON order_items.order_id = orders.id 
            JOIN product ON order_items.product_id = product.id where $test
            ";
        }
        $res = mysqli_query($con, $sql);
        if (mysqli_num_rows($res) > 0) {
            while ($row = mysqli_fetch_assoc($res)) {
                $option = '';
                if ($row['is_active'] == 1 && $row['is_cancelled'] == 0 && $row['is_completed'] == 0) {
                    if($row['mode'] == 'banktransfer'){
                        $option = '
                        <option value="active" disabled selected>Active</option>
                        <option value="cancel" disabled>Cancel</option>
                        <option value="completed" disabled>Completed</option>
                        ';
                    }else{
                        $option = '
                        <option value="active" selected>Active</option>
                        <option value="cancel">Cancel</option>
                        <option value="completed" disabled>Completed</option>
                        ';
                    }
                }
                if ($row['is_cancelled'] == 1 || $row['is_completed'] == 1 && $row['is_active'] == 0) {
                    $option = '
                <option value="active" disabled>Active</option>
                <option value="cancel" disabled selected>Cancel</option>
                <option value="completed" disabled>Completed</option>
                ';
                }
                
                if($row["mode"] == 'banktransfer'){
                    $mode = 'BANK TRANSFER';
                    }else{
                    $mode = 'CASH ON DELIEVERY';

                }

                $output .= '
    <tr>
    <td>' . $row["id"] . '</td>
    <td>' . $row["pName"] . '</td>
    <td>  <img width="100%" height="70px" src="../Assets/Images/Products/' . $row["image"] . '"/></td>
    <td>' . $row["qty"] . '</td>
    <td>' . $row["per_amount"] . '</td>
    <td>' . $row["total_amount"] . '</td>
    <td>' . $mode . '</td>
    <td>
    <select class="status">
    ' . $option . '
    </select>
    </td>
    </tr>
    ';
            }
        }
        echo $output != '' ? $output : 0;

    }

    if ($_POST['action'] == 'updateStatus' && !isset($_POST['forTable'])) {
        $id = $_POST['id'];
        $status = $_POST['status'];

        // Update status in the database
        $sql = "UPDATE order_items SET ";

        if ($status == 'active') {
            $sql .= "is_active = 1, is_cancelled = 0, is_completed = 0";
        } elseif ($status == 'completed') {
            $sql .= "is_active = 0, is_cancelled = 0, is_completed = 1";
        } elseif ($status == 'cancel') {
            $sql .= "is_active = 0, is_cancelled = 1, is_completed = 0";
        }

        $sql .= " WHERE id = $id";
        $res=mysqli_query($con,$sql);
        echo 1;
    }

    if($_POST['action'] == 'counter' && !isset($_POST['forTable'])){
        // Assuming $con is your database connection
        $activeCount =0;
        $cancelCount =0;
        $completedCount =0;
        if(isset($_SESSION['user_id'])){
            $user_id= $_SESSION['user_id'] ;
            $test = " orders.user_id = '$user_id' or orders.ip_address = '$token' ";
        }else{
            $test =  " orders.ip_address ='$token'";
        }
        // Count active orders
        $query = "SELECT COUNT(*) as active_count FROM order_items join orders on order_items.order_id = orders.id WHERE is_active = 1 AND is_cancelled = 0 AND is_completed = 0 and ($test)";
        $res = mysqli_query($con, $query);
        if(mysqli_num_rows($res) > 0){
            $row = mysqli_fetch_assoc($res);
        $activeCount = $row['active_count'];
        }
        
        // Count cancelled orders
        $query = "SELECT COUNT(*) as cancel_count FROM order_items join orders on order_items.order_id = orders.id WHERE is_cancelled = 1 AND is_completed = 0 AND is_active = 0 and ($test)";
        $res = mysqli_query($con, $query);
        if(mysqli_num_rows($res) > 0){
        $row = mysqli_fetch_assoc($res);
        $cancelCount = $row['cancel_count'];
        }
        
        // Count completed orders
        $query = "SELECT COUNT(*) as completed_count FROM order_items join orders on order_items.order_id = orders.id WHERE is_completed = 1 AND is_cancelled = 0 AND is_active = 0 and ($test)";
        $res = mysqli_query($con, $query);
        if(mysqli_num_rows($res) > 0){
            $row = mysqli_fetch_assoc($res);
        $completedCount = $row['completed_count'];
            }
        echo $activeCount .'!'.$cancelCount.'!'.$completedCount ;
    }
}



?>