<?php
$siteKey = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $action = $_POST['action'] ?? ''; // Optional action for reCAPTCHA v3
  $token = $_POST['g-recaptcha-response'] ?? '';

  if ($token) {
    $url = 'https://www.google.com/recaptcha/api/siteverify';
    $secretKey = '';

    $data = array(
      'secret' => $secretKey,
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
        // reCAPTCHA validation successful, proceed with form processing
        // ... (your form processing logic here)

        die('Form submission successful!');
      } else {
        // Handle failed reCAPTCHA validation (e.g., display an error message)
        die('Failed reCAPTCHA validation.');
      }
    } else {
      // Handle error during validation request (e.g., display an error message)
      die('Error validating reCAPTCHA.');
    }
  } else {
    // Handle missing reCAPTCHA token (e.g., display an error message)
    die('Please verify using reCAPTCHA.');
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>reCAPTCHA v3 Integration</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
  <script src="https://www.google.com/recaptcha/api.js?render=<?php echo $siteKey; ?>"></script>
</head>
<body>
  <h1>Your Form</h1>
  <form method="post" id="yourForm">
    <input type="text" name="name" placeholder="Your Name">
    <input type="email" name="email" placeholder="Your Email">
    <textarea name="message" placeholder="Your Message"></textarea>
    <button type="submit" name="submit">Submit</button>
  </form>

  <script>
    grecaptcha.ready(function() {
      grecaptcha.execute('<?php echo $siteKey; ?>', { action: 'submit' }) // Optional action for reCAPTCHA v3
        .then(function(token) {
          var form = document.getElementById("yourForm");
          var input = document.createElement("input");
          input.type = "hidden";
          input.name = "g-recaptcha-response";
          input.value = token;
          form.appendChild(input);
          // Proceed with form submission
          form.addEventListener('submit', function(event) {
            // You can add any additional form validation here if needed
            return true;
          });
        });
    });
  </script>
</body>
</html>
