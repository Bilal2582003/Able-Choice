<?php
// session_start();
// include "../Model/connection.php";

// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     $user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;
//     $ip_address = $_SERVER['REMOTE_ADDR'];

//     $fname = mysqli_real_escape_string($con, $_POST['fname']);
//     $email = mysqli_real_escape_string($con, $_POST['email']);
//     $address = mysqli_real_escape_string($con, $_POST['address']);
//     $city = mysqli_real_escape_string($con, $_POST['city']);
//     $state = mysqli_real_escape_string($con, $_POST['state']);
//     $postcode = mysqli_real_escape_string($con, $_POST['postcode']);
//     $country = mysqli_real_escape_string($con, $_POST['country']);
//     $phone1 = mysqli_real_escape_string($con, $_POST['phone1']);
//     $phone2 = isset($_POST['phone2']) ? mysqli_real_escape_string($con, $_POST['phone2']) : '';
//     $notes = isset($_POST['notes']) ? mysqli_real_escape_string($con, $_POST['notes']) : '';
//     $payment_method = mysqli_real_escape_string($con, $_POST['payment']);

//     // Calculate order's total amount
//     $cart_query = "SELECT * FROM card_detail WHERE (user_id = '$user_id' OR ip_address = '$ip_address') AND deleted_at IS NULL";
//     $cart_res = mysqli_query($con, $cart_query);
//     $total_amount = 0;
//     if (mysqli_num_rows($cart_res) > 0) {


//         while ($cart_row = mysqli_fetch_assoc($cart_res)) {
//             $total_amount += $cart_row['total_amount'];
//         }

//         // Add shipping cost
//         $shipping_cost = 200;
//         $net_amount = $total_amount + $shipping_cost;

//         // Insert order details into the orders table
//         $order_query = "INSERT INTO orders (user_id, name, email, address, city, state, postcode, country, phone1, phone2, notes, payment_method, total_amount, shipping_cost, net_amount,ip_address, order_date) VALUES ('$user_id', '$fname', '$email', '$address', '$city', '$state', '$postcode', '$country', '$phone1', '$phone2', '$notes', '$payment_method', '$total_amount', '$shipping_cost', '$net_amount','$ip_address', NOW())";

//         if (mysqli_query($con, $order_query)) {
//             $order_id = mysqli_insert_id($con);

//             // Retrieve cart details and insert each item into order_items table
//             $cart_res = mysqli_query($con, $cart_query);
//             while ($cart_row = mysqli_fetch_assoc($cart_res)) {
//                 $product_id = $cart_row['product_id'];
//                 $qty = $cart_row['qty'];
//                 $per_amount = $cart_row['per_amount'];
//                 $total_amount = $cart_row['total_amount'];

//                 $order_item_query = "INSERT INTO order_items (order_id, product_id, qty, per_amount, total_amount) VALUES ('$order_id', '$product_id', '$qty', '$per_amount', '$total_amount')";
//                 mysqli_query($con, $order_item_query);
//             }

//             // Clear the cart for the user
//             $clear_cart_query = "UPDATE card_detail set deleted_at = NOW() WHERE (user_id = '$user_id' OR ip_address = '$ip_address')";
//             mysqli_query($con, $clear_cart_query);

//             // Redirect to a thank you page or order confirmation page
//             // header('Location: Orders.php');
//         } else {
//             echo "Error: " . $order_query . "<br>" . mysqli_error($con);
//         }
//     }
//     else {
//         echo "Error: " . $cart_query . "<br>" . mysqli_error($con);
//     }
// }


session_start();
include '../Model/connection.php'; // Include your database connection file
require '../vendor/autoload.php'; // Include Stripe's PHP library

\Stripe\Stripe::setApiKey('sk_test_51PPoLbECxkP4UAgfPIUKlmoCju2hQBQ8SrJ3h6ZAllZHXGunWhDBF670xkEoSMXOnCn3nhf2AT2Z6L5Rlux0Uppc00OEunD4NB'); // Set your Stripe secret key

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $token = $_SESSION['token'];
    if (isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];
        $queryUser = ' user_id, ';
        $queryUserVal = '"' . $user_id . '" ,';
        $test = " user_id = '$user_id' or ip_address = '$token' ";
    } else {
        $queryUser = '';
        $queryUserVal = '';
        $test = "ip_address ='$token'";
    }

    $fname = mysqli_real_escape_string($con, $_POST['fname']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $address = mysqli_real_escape_string($con, $_POST['address']);
    $city = mysqli_real_escape_string($con, $_POST['city']);
    $state = mysqli_real_escape_string($con, $_POST['state']);
    $postcode = mysqli_real_escape_string($con, $_POST['postcode']);
    $country = mysqli_real_escape_string($con, $_POST['country']);
    $phone1 = mysqli_real_escape_string($con, $_POST['phone1']);
    $phone2 = isset($_POST['phone2']) ? mysqli_real_escape_string($con, $_POST['phone2']) : '';
    $notes = isset($_POST['notes']) ? mysqli_real_escape_string($con, $_POST['notes']) : '';
    $payment_method = mysqli_real_escape_string($con, $_POST['payment']);

    // Calculate total amount
    $cart_query = "SELECT * FROM card_detail WHERE ($test) AND deleted_at IS NULL";
    $cart_res = mysqli_query($con, $cart_query);
    $total_amount = 0;

    while ($cart_row = mysqli_fetch_assoc($cart_res)) {
        $total_amount += $cart_row['total_amount'];
    }

    // Add shipping cost
    $shipping_cost = 200;
    $net_amount = $total_amount + $shipping_cost;

    if ($payment_method == 'cashondelivery') {
        // Insert order details into the orders table
        $order_query = "INSERT INTO orders ($queryUser name, email, address, city, state, postcode, country, phone1, phone2, notes, payment_method, total_amount, shipping_cost, net_amount,ip_address, order_date) VALUES ($queryUserVal '$fname', '$email', '$address', '$city', '$state', '$postcode', '$country', '$phone1', '$phone2', '$notes', '$payment_method', '$total_amount', '$shipping_cost', '$net_amount','$token', NOW())";

        if (mysqli_query($con, $order_query)) {
            $order_id = mysqli_insert_id($con);

            // Insert each cart item into order_items table
            $cart_query = "SELECT * FROM card_detail WHERE ($test) AND deleted_at IS NULL";
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
            $clear_cart_query = "UPDATE card_detail set deleted_at = NOW() WHERE ($test)";
            mysqli_query($con, $clear_cart_query);

            // Redirect to a thank you page or order confirmation page

            include('../smtp/PHPMailerAutoload.php');

            $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
            $domainName = $_SERVER['HTTP_HOST'];
            $url = $protocol . $domainName . '/Able%20Choice/Views/Orders.php?order_id=' . $order_id;

            $mail = new PHPMailer(true);
            $mail->IsSMTP();
            $mail->SMTPDebug = 0;
            $mail->SMTPAuth = true;
            $mail->Host = "smtp.gmail.com";
            $mail->Port = 587;
            $mail->SMTPSecure = "tls";
            $mail->SMTPAuth = true;
            $mail->Username = "huzaifa2582003@gmail.com";
            $mail->Password = "grdjmwnxsaecnech";
            $mail->SetFrom("huzaifa2582003@gmail.com");
            $mail->AddAddress("huzaifa2582003@gmail.com");
            $mail->IsHTML(true);
            $mail->Subject = "Able Choice Order Tracking";
            $mail->Body = "Thank you for order. <a href='$url'>Track Your Order</a>";
            if (!$mail->Send()) {
                echo 1;
            } else {
                echo 0;
            }

            header('Location: ../Views/Orders.php?order_id=' . $order_id);
        } else {
            echo "Error: " . $order_query . "<br>" . mysqli_error($con);
        }
    } else if ($payment_method == 'banktransfer') {
        $_SESSION['fname'] = $fname;
        $_SESSION['email'] = $email;
        $_SESSION['address'] = $address;
        $_SESSION['city'] = $city;
        $_SESSION['state'] = $state;
        $_SESSION['postcode'] = $postcode;
        $_SESSION['country'] = $country;
        $_SESSION['phone1'] = $phone1;
        $_SESSION['phone2'] = $phone2;
        $_SESSION['notes'] = $notes;
        // Create a Stripe Checkout Session
        try {
            if ($_SERVER['SERVER_NAME'] === 'localhost') {
                // Localhost environment
                $domain = 'http://localhost/Able%20Choice';
            } else {
                // Live server (adjust this to your live domain)
                $domain = 'https://able-choice.cybernsoft.com';
            }
            $session = \Stripe\Checkout\Session::create([
                'payment_method_types' => ['card'],
                'line_items' => [
                    [
                        'price_data' => [
                            'currency' => 'pkr',
                            'product_data' => [
                                'name' => 'Order #' . uniqid(),
                            ],
                            'unit_amount' => $net_amount * 100, // Stripe amount is in cents
                        ],
                        'quantity' => 1,
                    ]
                ],
                'mode' => 'payment',
                'success_url' => $domain . '/Controllers/_success.php?session_id={CHECKOUT_SESSION_ID}',
                'cancel_url' => $domain . '/Able%20Choice/Views/cancel.php',
            ]);

            header("Location: " . $session->url);
        } catch (Exception $e) {
            echo 'Error creating Stripe session: ' . $e->getMessage();
        }
    }
}



?>