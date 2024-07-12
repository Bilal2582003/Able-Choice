<?php
session_start();
        if(isset($_SESSION['fname'])){
            unset($_SESSION['fname']);
        }
        if(isset($_SESSION['email'])){
            unset($_SESSION['email']);
        }
        if(isset($_SESSION['address'])){
            unset($_SESSION['address']);
        }
        if(isset($_SESSION['city'])){
            unset($_SESSION['city']);
        }
        if(isset($_SESSION['state'])){
            unset($_SESSION['state']);
        }
        if(isset($_SESSION['postcode'])){
            unset($_SESSION['postcode']);
        }
        if(isset($_SESSION['country'])){
            unset($_SESSION['country']);
        }
        if(isset($_SESSION['phone1'])){
            unset($_SESSION['phone1']);
        }
        if(isset($_SESSION['phone2'])){
            unset($_SESSION['phone2']);
        }
        if(isset($_SESSION['notes'])){
            unset($_SESSION['notes']);
        }
        
            unset($_SESSION['user_id']);
// session_unset();
// session_destroy();


header("location:Index.php")
?>