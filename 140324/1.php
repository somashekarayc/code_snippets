<?php

// echo "This is line " . __LINE__ . " of file " . __FILE__;

function longdate($timestamp)
{
return date("l F jS Y", $timestamp);
}

echo longdate(time() - 17 * 24 * 60 * 60);

echo '<pre>';
// print_r($GLOBALS);
// echo '=======================================';
print_r($_SERVER);
