<?php
header("Content-Type: application/json");
try{
    
    include("../Model/connection.php");

     // ===== RATE LIMIT CONFIG =====
    $dailyLimit = 3; // max requests per IP per day
    $ip = $_SERVER['REMOTE_ADDR'];
    $today = date('Y-m-d');

    // Check daily limit
    $checkStmt = $con->prepare("
        SELECT COUNT(*) 
        FROM contact_requests 
        WHERE ip_address = ? 
        AND DATE(created_at) = ?
    ");
    $checkStmt->bind_param("ss", $ip, $today);
    $checkStmt->execute();
    $checkStmt->bind_result($count);
    $checkStmt->fetch();
    $checkStmt->close();

    if ($count >= $dailyLimit) {
        echo json_encode([
            "status" => false,
            "message" => "Daily contact request limit reached. Please try again tomorrow."
        ]);
        exit;
    }


    $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
    $domainName = $_SERVER['HTTP_HOST'];
                // $url = $protocol.$domainName . '/Able%20Choice/Views/Orders.php?order_id=' . $order_id;
                $name    = htmlspecialchars($_POST['name']);
                $email   = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
                $subject = htmlspecialchars($_POST['subject'] ?? 'no subject');
                $msg     = nl2br(htmlspecialchars($_POST['message']));
                $fromUrl = $_POST['fromUrl'] ?? '';
                $phone       = $_POST['phone'] ?? null;
                $service     = $_POST['service'] ?? null;
                $date        = $_POST['date'] ?? null;
                $projectType = $_POST['projectType'] ?? null;

                $stmt = $con->prepare("
                INSERT INTO contact_requests 
                (name, email, phone, service, date, project_type, subject, message, from_url, ip_address, created_at)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW())
                ");

                $stmt->bind_param(
                "ssssssssss",
                $name,
                $email,
                $phone,
                $service,
                $date,
                $projectType,
                $subject,
                $msg,
                $fromUrl,
                $ip
                );

                $stmt->execute();
                $stmt->close();           

                    echo json_encode(["status"=> true, "message"=>"Conntect saved"]);
               
            }catch(Exception $e){
                echo json_encode(["status"=> false, "message"=>"Connect Saved: ". $e->getMessage()]);
            }
?>