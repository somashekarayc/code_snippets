

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
