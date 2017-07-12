<?php
function Send_Mail($to,$subject,$body)
{
require 'class.phpmailer.php';
$from       = "wangoken2@gmail.com";
$mail       = new PHPMailer();
$mail->IsSMTP(true);            // use SMTP
$mail->IsHTML(true);
$mail->SMTPAuth   = true;                  // enable SMTP authentication
$mail->Host       = "tls://smtp.gmail.com"; // Amazon SES server, note "tls://" protocol
$mail->Port       =  465;                    // set the SMTP port
$mail->Username   = "wangoken2@gmail.com";  // SMTP  username
$mail->Password   = "samsonkennedy";  // SMTP password
$mail->SetFrom($from, 'One Menu System');
$mail->AddReplyTo($from,'One Menu System');
$mail->Subject    = $subject;
$mail->MsgHTML($body);
$address = $to;
$mail->AddAddress($address, $to);
$mail->Send();   
}
?>
