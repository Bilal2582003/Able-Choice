<?php
header("Content-Type: application/json");
try{

    require '../vendor/autoload.php';
    include ('../smtp/PHPMailerAutoload.php');
    
    $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
    $domainName = $_SERVER['HTTP_HOST'];
                // $url = $protocol.$domainName . '/Able%20Choice/Views/Orders.php?order_id=' . $order_id;
                $name    = htmlspecialchars($_POST['name']);
    $email   = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $subject = htmlspecialchars($_POST['subject']);
    $msg     = nl2br(htmlspecialchars($_POST['msg']));
    $fromUrl = $_POST['fromUrl'] ?? '';
               
    $phone       = !empty($_POST['phone']) ? '<br><b>Phone:</b> ' . $_POST['phone'] : '';
    $service     = !empty($_POST['service']) ? '<br><b>Service:</b> ' . $_POST['service'] : '';
    $date        = !empty($_POST['date']) ? '<br><b>Date:</b> ' . $_POST['date'] : '';
    $projectType = !empty($_POST['projectType']) ? '<br><b>Project Type:</b> ' . $_POST['projectType'] : '';

                $mail = new PHPMailer(true);
                $mail->IsSMTP();
                $mail->SMTPDebug = 0;
                $mail->SMTPAuth = true;
                $mail->Host = "smtp.gmail.com";
                $mail->Port = 587;
                $mail->SMTPSecure = "tls";
                $mail->SMTPAuth = true;
                $mail->Username = "huzaifa2582003@gmail.com";
                $mail->Password = "nybnwgfacgvvneaq";
                $mail->SetFrom("huzaifa2582003@gmail.com");
                $mail->AddAddress($email, $name);
                $mail->IsHTML(true);
                $mail->Subject = $fromUrl . " - " . $subject;
                  $mail->Body = "
        <b>Name:</b> {$name}<br>
        <b>Email:</b> {$email}<br>
        <b>Message:</b><br>{$msg}
        {$phone}
        {$service}
        {$date}
        {$projectType}
    ";
                $mail->send();

                    echo json_encode(["status"=> true, "message"=>"Email sent"]);
               
            }catch(Exception $e){
                echo json_encode(["status"=> false, "message"=>"Email error: ". $e->getMessage()]);
            }
?>