<?php
require("class.phpmailer.php");
require("PHPMailerAutoload.php");
header('Content-Type: application/json');

$email = $_REQUEST['email'];

  $name = $_REQUEST['name'];
  $message = $_REQUEST['message'];
  $subject = $_REQUEST['subject'];

$mail = new PHPMailer();

$mail->IsSMTP();                                      // set mailer to use SMTP
$mail->Host = 'gator4261.hostgator.com';  // specify main and backup server
$mail->SMTPAuth = true;     // turn on SMTP authentication
$mail->Username = 'mailer@alphaelitefitness.nyc';  // SMTP username
$mail->SMTPSecure = "ssl";
$mail->Port = "465";
$mail->Password = 'harold123@'; // SMTP password

$mail->From =$email;
$mail->FromName = $name;

$mail->AddAddress('daniel@alphaelitefitness.nyc');
$mail->AddReplyTo = $email;
$mail->AddCC('nick@alphaelitefitness.nyc');

$mail->WordWrap = 50;                                 // set word wrap to 50 characters

$mail->IsHTML(true);                                  // set email format to HTML

$mail->Subject = $subject;
$mail->Body    = $message;
$mail->AltBody = $message;
$mail->CharSet = "UTF-8";

if(!$mail->Send())
{
   echo "Message could not be sent" . $mail->ErrorInfo;
   exit;
}

echo "Message has been sent";
?>