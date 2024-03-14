<?php

require __DIR__ . "/vendor/autoload.php";

use Postmark\PostmarkClient;
use Postmark\Models\PostmarkAttachment;
use Postmark\Models\PostmarkException;

$name = 'dave';
$email = 'developer2.onecity@gmail.com';
$subject = 'Your message subject';
$body = '<h3>This is a test email sent using postmarkapp.</h3>
<p>This is the body of the email in HTML format.</p>';



try {

    $client = new PostmarkClient("defc4800-beb3-4804-81ba-59d60850bb18");

    $result = $client->sendEmail(
        from: "Name <jajaxes109@aersm.com>",
        to: "$name <$email>",
        subject: $subject,
        htmlBody: $body,
        textBody: strip_tags($body),
    );

    echo "Message sent.";

} catch (PostmarkException $e) {

    echo $e->message;

} catch (Exception $e) {

    echo $e->getMessage();

}