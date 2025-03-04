<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Include PHPMailer via Composer or download manually

$mail = new PHPMailer(true); // Create a new PHPMailer instance

try {
    // Server settings
    $mail->SMTPDebug = 0;                                   // Enable verbose debug output (for development)
    $mail->isSMTP();                                        // Set mailer to use SMTP
    $mail->Host       = 'mail.arekpm.com';                     // Specify main SMTP server
    $mail->SMTPAuth   = true;                               // Enable SMTP authentication
    $mail->Username   = 'info@arekpm.com';             // SMTP username
    $mail->Password   = '@GVirdi2025';                      // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;        // Enable SSL encryption (port 465)
    $mail->Port       = 465;                                // TCP port for SSL

    // Recipients
    $mail->setFrom('info@arekpm.com', 'Arek Property Management');       // Sender's email and name
    
    
    // $mail->addAddress($mail_address); // Add a recipient
    $mail->addAddress('gvirdi@arekpm.com', 'Arek Property Support'); // Add Another recipient
    $mail->addReplyTo('gvirdi@arekpm.com', 'Arek Property Support'); // Add a different reply-to email address

    

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

