<?php
require('connect.php');
require('functions.inc.php');
$email = get_safe_value($conn, $_POST['email']);
$otp = rand(1111, 9999);
$html = "$otp is your otp";

$_SESSION['EMAIL_OTP'] = $otp;

include('smtp/PHPMailerAutoload.php');
$mail = new PHPMailer(true);
$mail->isSMTP();
$mail->Host = "smtp.gmail.com";
$mail->Port = 587;
$mail->SMTPSecure = "tls";
$mail->SMTPAuth = true;
$mail->Username = "daspawan53785@gmail.com";
$mail->Password = "oktuohsloezutkuf";
$mail->SetFrom("daspawan53785@gmail.com");
$mail->addAddress($email);
$mail->IsHTML(true);
$mail->Subject = "New OTP";
$mail->Body = $html;
$mail->SMTPOptions = array('ssl' => array(
	'verify_peer' => false,
	'verify_peer_name' => false,
	'allow_self_signed' => false
));
	if($mail->send()){
		echo "done";
	}else{

	}

