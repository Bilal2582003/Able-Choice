<?php
try{

    require '../vendor/autoload.php';
    include ('../smtp/PHPMailerAutoload.php');
    
    $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
    $domainName = $_SERVER['HTTP_HOST'];
                // $url = $protocol.$domainName . '/Able%20Choice/Views/Orders.php?order_id=' . $order_id;
                $name = $_POST['name'];
                $email = $_POST['email'];
                $subject = $_POST['subject'];
                $msg = $_POST['msg'];
                $fromUrl = $_POST['fromUrl']; 
                $phone = isset($_POST['phone']) ? '<br> Phone: '.$_POST['phone'] : '' ; 
                $service = isset($_POST['service']) ? '<br> Service: '.$_POST['service'] : '' ; 
                $date = isset($_POST['date']) ? '<br> Date: '.$_POST['date'] : '' ; 
                $projectType = isset($_POST['projectType']) ? '<br> Project Type: '.$_POST['projectType'] : '' ; 
                
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
                $mail->SetFrom("$email");
                $mail->AddAddress("huzaifa2582003@gmail.com");
                $mail->IsHTML(true);
                $mail->Subject = "$fromUrl $subject";
                $mail->Body = "$msg $phone $service";
                $mail->Body = "$msg $phone $service $date";
                if (!$mail->Send()) {
                    echo json_encode(["status"=> true, "message"=>"Email sent"]);
                } else {
                    echo json_encode(["status"=> false, "message"=>"Email not sent"]);
                }
            }catch(Exception $e){
                echo json_encode(["status"=> false, "message"=>"Email error: ". $e->getMessage()]);
            }
?>