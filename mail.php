<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Include PHPMailer via Composer or download manually

$mail = new PHPMailer(true); // Create a new PHPMailer instance

try {
    // Server settings
    $mail->SMTPDebug = 0;                                   // Enable verbose debug output (for development)
    $mail->isSMTP();                                        // Set mailer to use SMTP
    $mail->Host       = 'intellai.org';                     // Specify main SMTP server
    $mail->SMTPAuth   = true;                               // Enable SMTP authentication
    $mail->Username   = 'muzahid@intellai.org';             // SMTP username
    $mail->Password   = '@Muzahid221';                      // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;        // Enable SSL encryption (port 465)
    $mail->Port       = 465;                                // TCP port for SSL

    // Recipients
    $mail->setFrom('muzahid@intellai.org', 'Arek Preoperty Manangement');       // Sender's email and name
    
    
    $mail->addAddress($mail_address); // Add a recipient
    $mail->addAddress('gurpreetv@virdirealestate.com', 'Gurpreet Virdi Real Estate'); // Add Another recipient
    

    // Content
    $mail->isHTML(true);                                    // Set email format to HTML
    $mail->Subject = $mail_subject;
    $mail->Body    = $mail_html_body;
    $mail->AltBody = $mail_paintext_body;


    $mail->send();
    // echo 'Message has been sent';
} catch (Exception $e) {
    // echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
