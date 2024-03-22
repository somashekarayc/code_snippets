<?php
$_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

echo '<pre>';
print_r($_POST);