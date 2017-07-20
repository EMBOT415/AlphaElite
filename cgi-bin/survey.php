<?php
require("class.phpmailer.php");
require("PHPMailerAutoload.php");
header('Content-Type: application/json');

$email = $_REQUEST['email'];

  $name = $_REQUEST['name'];
  $phone1 = $_REQUEST['phone1'];
  $phone2 =$_REQUEST['phone2'];
  $phone3 =$_REQUEST['phone3'];
  
  $bestcontact = $_REQUEST['bestcontact'];
  $services = $_REQUEST['services'];
  $goals = $_REQUEST['goals'];
  $goals2 = $_REQUEST['goals2'];
  $goals3 = $_REQUEST['goals3'];
  $goals4 = $_REQUEST['goals4'];
  $experience = $_REQUEST['experience'];
  $experience2 = $_REQUEST['experience2'];
  $experience3 = $_REQUEST['experience3'];
  $experience4 = $_REQUEST['experience4'];
  $experience5 = $_REQUEST['experience5'];
  $weekworkout = $_REQUEST['weekworkout'];
  $trainerbefore = $_REQUEST['trainerbefore'];
  $fullshot = "Name: $name. \nEmail: $email. \nPhone: $phone1 - $phone2 - $phone3. \nBest contact method: $bestcontact. \nServices Desired: $services. \nGoals of Workout: $goals, $goals2, $goals3, $goals4. \nPast Experience: $experience, $experience2, $experience3, $experience4, $experience5. \nWorks out $weekworkout a week. \nHad a trainer before? $trainerbefore";

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

$mail->AddAddress('alex.usherenko@me.com');
$mail->AddReplyTo = $email;
$mail->AddCC('nick@alphaelitefitness.nyc');

$mail->WordWrap = 50;                                 // set word wrap to 50 characters

$mail->IsHTML(true);                                  // set email format to HTML

$mail->Subject = "New Questionare Submittance";
$mail->Body    = nl2br($fullshot);

$mail->AltBody = $message;
$mail->CharSet = "UTF-8";

if(!$mail->Send())
{
   echo "Message could not be sent. <p>";
    $mail->ErrorInfo;
   
   exit;
}

echo "Message has been sent";
?>