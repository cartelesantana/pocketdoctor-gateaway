<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../basicStructures/PHPMailer/src/Exception.php';
require '../basicStructures/PHPMailer/src/PHPMailer.php';
require '../basicStructures/PHPMailer/src/SMTP.php';

$mail= new PHPMailer();
$mail->isSMTP();
$mail->SMTPDebug=0;
$mail->Host='';
$mail->Port=587;
$mail->SMTPSecure='tls';
$mail->SMTPAuth=true;
$mail->Username='';
$mail->Password='';
$mail->setFrom('');
$mail->addAddress('');
$mail->Subject='';