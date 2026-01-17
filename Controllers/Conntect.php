<?php
header("Content-Type: application/json");
try{
    
    include("../Model/connection.php");

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
                (name, email, phone, service, date, project_type, subject, message, from_url, created_at)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, NOW())
                ");

                $stmt->bind_param(
                "sssssssss",
                $name,
                $email,
                $phone,
                $service,
                $date,
                $projectType,
                $subject,
                $msg,
                $fromUrl
                );

                $stmt->execute();
                                

                    echo json_encode(["status"=> true, "message"=>"Conntect saved"]);
               
            }catch(Exception $e){
                echo json_encode(["status"=> false, "message"=>"Connect Saved: ". $e->getMessage()]);
            }
?>