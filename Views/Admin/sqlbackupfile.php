<?php
$page = "sqlBackUp";
include "../../Model/connection.php";
include_once "Mysqldump.php";
// include ('smtp/PHPMailerAutoload.php');
try {
	$dump = new Ifsnop\Mysqldump\Mysqldump('mysql:host=localhost;dbname=' . $db, 'root', '');
	$date = date("Y-m-d");
	$dump->start('../../Database/able-choice(' . $date . ').sql');
	echo "Backup Completed Successfully.";
} catch (\Exception $e) {
	echo 'Dump failed: ' . $e->getMessage();
}

// 	 $mail = new PHPMailer(true); 
// 	 $mail->IsSMTP();
// 	 $mail->SMTPDebug = 0; 
// 	 $mail->SMTPAuth = true; 
// 	 $mail->Host = "smtp.gmail.com";
// 	 $mail->Port = 587;
// 	 $mail->SMTPSecure = "tls";
// 	 $mail->SMTPAuth = true;
// 	 $mail->Username = "huzaifa2582003@gmail.com";
// 	 $mail->Password = "grdjmwnxsaecnech";
// 	 $mail->SetFrom("huzaifa2582003@gmail.com");
//      $mail->AddAddress("huzaifa2582003@gmail.com");
// 	 $mail->IsHTML(true);
// 	 $mail->Subject = "database backup ".$date;
// 	 $mail->Body ="database Back up file of date" . $date;
// 	 $mail->AddAttachment('storage/dumpfile'.$date.'.sql');
// 	 $mail->SMTPOptions=array('ssl'=>array(
// 		 'verify_peer'=>false,
// 		 'verify_peer_name'=>false,
// 		 'allow_self_signed'=>false
// 	 ));
//  if(!$mail->Send()){
// echo 1;
// }else{
//  echo 0;
//  }
