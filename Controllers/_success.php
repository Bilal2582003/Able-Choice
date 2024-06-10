<?php
session_start();
include '../Model/connection.php';
require '../vendor/autoload.php';

\Stripe\Stripe::setApiKey('sk_test_51PPoLbECxkP4UAgfPIUKlmoCju2hQBQ8SrJ3h6ZAllZHXGunWhDBF670xkEoSMXOnCn3nhf2AT2Z6L5Rlux0Uppc00OEunD4NB');

if (isset($_GET['session_id'])) {
    $session_id = $_GET['session_id'];

    // Retrieve the session from Stripe
    try {
        $session = \Stripe\Checkout\Session::retrieve($session_id);
        $payment_intent = $session->payment_intent;

        // Fetch user details and order information from session or database
        $user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;
        $ip_address = $_SERVER['REMOTE_ADDR'];

        // Fetch the order details from the database (or session)
        $fname = $_SESSION['fname'];
        $email = $_SESSION['email'];
        $address = $_SESSION['address'];
        $city = $_SESSION['city'];
        $state = $_SESSION['state'];
        $postcode = $_SESSION['postcode'];
        $country = $_SESSION['country'];
        $phone1 = $_SESSION['phone1'];
        $phone2 = $_SESSION['phone2'];
        $notes = $_SESSION['notes'];
        $payment_method = 'banktransfer';

        // Calculate total amount
        $cart_query = "SELECT * FROM card_detail WHERE (user_id = '$user_id' OR ip_address = '$ip_address') AND deleted_at IS NULL";
        $cart_res = mysqli_query($con, $cart_query);
        $total_amount = 0;

        while ($cart_row = mysqli_fetch_assoc($cart_res)) {
            $total_amount += $cart_row['total_amount'];
        }

        // Add shipping cost
        $shipping_cost = 200;
        $net_amount = $total_amount + $shipping_cost;

        // Insert order details into the orders table
        $order_query = "INSERT INTO orders (user_id, name, email, address, city, state, postcode, country, phone1, phone2, notes, payment_method, total_amount, shipping_cost, net_amount,ip_address, order_date) VALUES ('$user_id', '$fname', '$email', '$address', '$city', '$state', '$postcode', '$country', '$phone1', '$phone2', '$notes', '$payment_method', '$total_amount', '$shipping_cost', '$net_amount','$ip_address', NOW())";

        if (mysqli_query($con, $order_query)) {
            $order_id = mysqli_insert_id($con);

            // Insert each cart item into order_items table
            $cart_res = mysqli_query($con, $cart_query);
            while ($cart_row = mysqli_fetch_assoc($cart_res)) {
                $product_id = $cart_row['product_id'];
                $qty = $cart_row['qty'];
                $per_amount = $cart_row['per_amount'];
                $total_amount = $cart_row['total_amount'];

                $order_item_query = "INSERT INTO order_items (order_id, product_id, qty, per_amount, total_amount) VALUES ('$order_id', '$product_id', '$qty', '$per_amount', '$total_amount')";
                mysqli_query($con, $order_item_query);
            }

            // Clear the cart for the user
            $clear_cart_query = "UPDATE card_detail set deleted_at = NOW() WHERE (user_id = '$user_id' OR ip_address = '$ip_address')";
            mysqli_query($con, $clear_cart_query);

            // Redirect to a thank you page or order confirmation page
            header('Location: ../Views/Orders.php?order_id=' . $order_id);
        } else {
            echo "Error: " . $order_query . "<br>" . mysqli_error($con);
        }
    } catch (Exception $e) {
        echo 'Error retrieving Stripe session: ' . $e->getMessage();
    }
}
?>
