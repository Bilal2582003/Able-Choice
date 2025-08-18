<?php
// Start session to manage user authentication
session_start();

// Check if the user is already logged in, if yes, redirect to dashboard or another page
if(isset($_SESSION['role']) && isset($_SESSION['user_id'])){
    header("Location: ../../Views/Admin/Index.php"); // Change 'dashboard.php' to the actual dashboard page
    exit; // Stop script execution after redirection
}
include "../../Model/connection.php";

if(isset($_POST['email']) && isset($_POST['password'])){
    $email =$_POST['email'];
    $password =$_POST['password'];
    $query = "SELECT * FROM user WHERE email = '$email' AND password = '$password' and role = 'admin'";
    $result = mysqli_query($con, $query);

    if(mysqli_num_rows($result) == 1) {
        // User exists, set session variables and redirect to dashboard or another page
        $user = mysqli_fetch_assoc($result);
        $_SESSION['user_id'] = $user['id']; // Assuming 'id' is the user's ID column in the database
        $_SESSION['email'] = $user['email']; // Assuming 'id' is the user's ID column in the database
        $_SESSION['role'] = $user['role']; // Assuming 'id' is the user's ID column in the database
        header("Location: ../../Views/Admin/Index.php"); // Change 'dashboard.php' to the actual dashboard page
        exit; // Stop script execution after redirection
    } else {
        // User does not exist or credentials are incorrect, display error message
        echo "<script>alert('Invalid email or password')
        window.location.assign('../../Views/Admin/Login.php')
        </script>
        ";
        // header("Location:../Views/Login.php");
    }
}else{
    echo "<script>alert('Invalid email or password')
    window.location.assign('../../Views/Admin/Login.php')
    </script>
    ";
}