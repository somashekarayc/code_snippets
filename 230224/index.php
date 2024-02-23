<?php

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';


// SMTP Configuration
$smtpHost = 'mail.lacalle.cl';
$smtpUsername = 'jenniffer@lacalle.cl';
$smtpPassword = 'Jenny2006!';
$smtpPort = 587; // Adjust port if necessary
$smtpEncryption = 'tls'; // Options: 'ssl' or 'tls'

// Sender and recipient details
$fromEmail = 'som@gmail.com';
$toEmail = 'somsundar98@gmail.com';
$subject = 'Test Email';
$message = 'This is a test email sent using PHPMailer with SMTP authentication.';

// Create a PHPMailer instance
$mail = new PHPMailer\PHPMailer\PHPMailer();

// SMTP Configuration
$mail->isSMTP();
$mail->Host = $smtpHost;
$mail->SMTPAuth = true;
$mail->Username = $smtpUsername;
$mail->Password = $smtpPassword;
$mail->SMTPSecure = $smtpEncryption;
$mail->Port = $smtpPort;

// Sender and recipient settings
$mail->setFrom($fromEmail, 'Sender Name');
$mail->addAddress($toEmail);

// Email content
$mail->isHTML(false);
$mail->Subject = $subject;
$mail->Body = $message;

// Attempt to send the email
if ($mail->send()) {
    echo "Email sent successfully!";
} else {
    echo "Email sending failed. Error: " . $mail->ErrorInfo;
}
?>
