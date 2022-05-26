<?php


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

function send_otp_via_email($email, $nama, $otp){
	
	$mail = new PHPMailer(true);

	try{
		$mail->SMTPDebug = 0;
		$mail->isSMTP();
		$mail->Host = 'smtp.gmail.com';
		$mail->SMTPAuth = true;
		$mail->Username = 'ikamibox@gmail.com';
		$mail->Password = 'ka!boxmidi';
		$mail->SMTPSecure = 'tls';
		$mail->Port = 587;

		$mail->setFrom('ikamibox@gmail.com', 'Kamibox');
		$mail->addAddress($email, $nama);

		$mail->isHTML(true);
		$mail->Subject = 'Kode OTP Kamibox Anda';
		$mail->Body = 'Kode OTP Anda : <b> '.$otp.'</b>';
		$mail->AltBody = 'mail clients';
		$mail->send();

		echo "Mail has been sent successfully!";
		return true;
	}catch(Exception $e){
		echo "Mail failed!";
		return false;
	}

}



?>