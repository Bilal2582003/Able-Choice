<?php
// Start session to manage user authentication
session_start();

// Check if the user is already logged in, if yes, redirect to dashboard or another page
if(isset($_SESSION['user_id'])){
    header("Location: ../Views/Index.php"); // Change 'dashboard.php' to the actual dashboard page
    exit; // Stop script execution after redirection
}
include "../Model/connection.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    echo 1;
    // User Data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $parent_name = $_POST['parent_name'];
    $phone = $_POST['phone'];
    // $password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Hash the password
    $password = $_POST['password']; // Hash the password

    // Address Data
    $address = $_POST['address'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $postal_code = $_POST['postal_code'];
    $country = $_POST['country'];

    // Insert user data into the `user` table
    $user_sql = "INSERT INTO `user` (`name`, `email`, `parent_name`, `phone`, `password`, `role`) 
                 VALUES (?, ?, ?, ?, ?, 'user')";

    if ($stmt = $con->prepare($user_sql)) {
        $stmt->bind_param("sssss", $name, $email, $parent_name, $phone, $password);
        if ($stmt->execute()) {
            $user_id = $stmt->insert_id; // Get the last inserted user ID

            // Insert address data into the `address` table
            $address_sql = "INSERT INTO `address` (`user_id`, `address`, `city`, `state`, `postal_code`, `country`) 
                            VALUES (?, ?, ?, ?, ?, ?)";

            if ($address_stmt = $con->prepare($address_sql)) {
                $address_stmt->bind_param("isssss", $user_id, $address, $city, $state, $postal_code, $country);
                if ($address_stmt->execute()) {
                    echo "<script>alert('You have successfully registered your account please login here.')
                    window.location.assign('../Views/Login.php')
                    </script>
                    ";
                } else {
                    echo "Error: " . $address_stmt->error;
                }
                $address_stmt->close();
            } else {
                echo "Error: " . $con->error;
            }
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Error: " . $con->error;
    }

    $con->close();
}
?>
