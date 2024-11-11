<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

require 'vendor/autoload.php';

// Create a new PHPMailer instance
$mail = new PHPMailer();

// Configure SMTP
$mail->isSMTP();
// $mail->SMTPDebug = SMTP::DEBUG_SERVER;
$mail->SMTPDebug = 0;   
$mail->Host = 'smtp.gmail.com';
$mail->Port = 465;
$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
$mail->SMTPAuth = true;

// Gmail SMTP credentials
$mail->Username = 'gvirdi@arekpm.com';
$mail->Password = 'ixamttvsimxwewrs';

// // Set email details
$mail->setFrom('gvirdi@arekpm.com', 'Arek Property Management');
$mail->addAddress($mail_address); // Add a recipient
$mail->addAddress('gurpreetv@virdirealestate.com', 'Gurpreet Virdi Real Estate'); // Add Another recipient

// Content
$mail->isHTML(true);                                    // Set email format to HTML
$mail->Subject = $mail_subject;
$mail->Body    = $mail_html_body;
$mail->AltBody = $mail_paintext_body;

// Send email and check for errors
if (!$mail->send()) {
    // echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    // echo 'Message sent!';
}

?>
