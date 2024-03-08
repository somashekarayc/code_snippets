<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/phpmailer/src/Exception.php';
require 'phpmailer/phpmailer/src/PHPMailer.php';
require 'phpmailer/phpmailer/src/SMTP.php';

$to = "developer2.onecity@gmail.com";

$subject = "Your message subject";

$body = "<h3>This is a test email sent using PHPMailer.</h3>
          <p>This is the body of the email in HTML format.</p>";

$mail = new PHPMailer(true);

$mail->isSMTP();
$mail->Host       = 'smtp.gmail.com';
$mail->SMTPAuth   = true;
$mail->Username   = ''; // Your Gmail address
$mail->Password   = '';  // Your Gmail password
$mail->SMTPSecure = 'tls';
$mail->Port       = 587;                   

$mail->setFrom('developer1.onecity@gmail.com', 'rajesh');

$mail->addAddress($to);

$mail->isHTML(true);
$mail->Subject = $subject;
$mail->Body    = $body;

// Send the email
if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "Email sent successfully!";
}

