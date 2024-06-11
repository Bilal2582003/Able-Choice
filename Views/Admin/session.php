<?php
if(!isset($_SESSION['user_id']) || !isset($_SESSION['role']) || !isset($_SESSION['email']) ){
    header("location:Login.php");
}
?>
