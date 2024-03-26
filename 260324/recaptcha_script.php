<?php

$recaptchaSiteKey = ''; // som

?>

<script src="https://www.google.com/recaptcha/api.js?render=<?php echo $recaptchaSiteKey; ?>"></script>

<script>
  grecaptcha.ready(function () {
    grecaptcha.execute('<?php echo $recaptchaSiteKey; ?>', { action: 'submit' })
      .then(function (token) {
        var forms = document.getElementsByClassName("recaptcha-v-3");
        for (var i = 0; i < forms.length; i++) {
          var form = forms[i];
          var input = document.createElement("input");
          input.type = "hidden";
          input.name = "g-recaptcha-response";
          input.value = token;
          form.appendChild(input);
          form.addEventListener('submit', function (event) {
            // You can add any additional form submission handling here if needed
            return true;
          });
        }
      });
  });
</script>

<?php
if (isset($_SESSION['toaster_info'])) {
?>

  <script>
    const toasterInfo = <?php echo $_SESSION['toaster_info'] ?>;
    alert(toasterInfo);
    unset($_SESSION['toaster_info']);
  </script>

<?php
}
?>

