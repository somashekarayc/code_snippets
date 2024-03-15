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
// print_r($_COOKIE);
// print_r($_SESSION);
// print_r($_REQUEST);


// $GLOBALS All variables that are currently defined in the global scope of
// the script. The variable names are the keys of the array.
// $_SERVER Information such as headers, paths, and locations of scripts.
// The entries in this array are created by the web server, and
// there is no guarantee that every web server will provide any
// or all of these.
// $_GET Variables passed to the current script via the HTTP GET
// method.
// $_POST Variables passed to the current script via the HTTP POST
// method.
// $_FILES Items uploaded to the current script via the HTTP POST
// method.
// $_COOKIE Variables passed to the current script via HTTP cookies.
// $_SESSION Session variables available to the current script.
// $_REQUEST Contents of information passed from the browser; by default, 
// $_GET, $_POST, and $_COOKIE.
// $_ENV Variables passed to the current script via the environment
// method.