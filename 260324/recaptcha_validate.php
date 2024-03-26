<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $action = $_POST['action'] ?? '';
  $token = $_POST['g-recaptcha-response'] ?? '';

  if ($token) {
    $url = 'https://www.google.com/recaptcha/api/siteverify';
    $recaptchaSecretKey = ''; // som

    $data = array(
      'secret' => $recaptchaSecretKey,
      'response' => $token,
      'remoteip' => $_SERVER['REMOTE_ADDR'],
    );

    $options = array(
      'http' => array(
        'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
        'method'  => 'POST',
        'content' => http_build_query($data),
      ),
    );

    $context  = stream_context_create($options);
    $response = file_get_contents($url, false, $context);

    if ($response) {
      $decodedResponse = json_decode($response);
      if ($decodedResponse->success) {
        // die('Form submission successful!');
        return true;
      } else {
       $_SESSION['toaster_info'] =  "Failed reCAPTCHA validation.";
        header('Location: ' . $_SERVER['HTTP_REFERER']);
      }
    } else {
      $_SESSION['toaster_info'] =  "Error validating reCAPTCHA.";
      header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
  } else {
    $_SESSION['toaster_info'] =  "Please verify using reCAPTCHA.";
    header('Location: ' . $_SERVER['HTTP_REFERER']);
  }
}
