<?php

// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\Exception;

// require 'PHPMailer/src/Exception.php';
// require 'PHPMailer/src/PHPMailer.php';
// require 'PHPMailer/src/SMTP.php';

// function sendMail($name, $email, $phone, $location, $message)
// {
//     $mail = new PHPMailer(true);

//     try {
//         $mail->isSMTP();
//         $mail->Mailer = "smtp";
//         $mail->SMTPDebug  = 0;
//         $mail->Host       = 'mail.1-414.us';
//         $mail->SMTPAuth   = true;
//         $mail->Username   = 'jpaul@1-414.us';
//         $mail->Password   = '1qw2er3ty';
//         $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
//         $mail->Port       = 587;

//         $formcontent = "html code";
//         $recipient2 = "developer2.onecity@gmail.com";
//         $subject = "Free consultation lead !";

//         $mail->setFrom('test@gmail.com', 'test2@gmail.com');
//         $mail->addAddress($recipient2);
//         $mail->isHTML(true);
//         $mail->Subject = $subject;
//         $mail->Body    = $formcontent;
//         $mail->AltBody = "Name : $name\n Email : $email\nPhone : $phone\nMessage : $message\nLocation : $location";

//         return $mail->Send();
//     } catch (Exception $e) {
//         return false;
//     }



use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

function sendMail($name, $email, $phone, $location, $message)
{
    $phpmailer = new PHPMailer(true);

    try {

        $phpmailer->isSMTP();
        $phpmailer->Mailer = "smtp";
        $phpmailer->SMTPDebug  = 0;
        $phpmailer->Host       = '';
        $phpmailer->SMTPAuth   = true;
        $phpmailer->Username   = '';
        $phpmailer->Password   = '';
        $phpmailer->SMTPSecure = 'tls'; // Change this line
        $phpmailer->Port       = 587;
        $phpmailer->SMTPDebug = 2;


        $formcontent = "html code";
        $recipient2 = "developer1.onecity@gmail.com";
        $subject = "Free consultation lead !";

        $phpmailer->setFrom('developer2.onecity@gmail.com');
        $phpmailer->addAddress($recipient2);
        $phpmailer->isHTML(true);
        $phpmailer->Subject = $subject;
        $phpmailer->Body    = $formcontent;
        $phpmailer->AltBody = "Name : $name\n Email : $email\nPhone : $phone\nMessage : $message\nLocation : $location";

        return $phpmailer->Send();
    } catch (Exception $e) {
        return false;
    }
}

// Main code
header('Content-type: application/json');

$contact_form_name = 'ddd';
$contact_form_email = 'test@gmail.com';
$contact_form_phone = '9876543210';
$contact_form_location = 'bangalore';
$contact_form_message = 'test message';


if (sendMail($contact_form_name, $contact_form_email, $contact_form_phone, $contact_form_location, $contact_form_message)) {
    $response_array['status'] = 'success';
} else {
    $response_array['status'] = 'error';
}

echo json_encode($response_array);
