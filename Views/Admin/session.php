<?php
if(!isset($_SESSION['user_id']) || !isset($_SESSION['role']) || !isset($_SESSION['email']) ){
    header("location:Logout.php");
}
if($_SESSION['role'] != 'admin'){
    header("location:Logout.php");
}
?>
