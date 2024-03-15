<?php

// echo "This is line " . __LINE__ . " of file " . __FILE__;

function longdate($timestamp)
{
return date("l F jS Y", $timestamp);
}

echo longdate(time() - 17 * 24 * 60 * 60);

echo '<pre>';
print_r($GLOBALS );

[_COOKIE] => Array
(
    [sb-auth-auth-token-code-verifier] => "
    [19191b4153b0e01d697684e1135587ed] => 
    [XSRF-TOKEN] => =
    [project_session] => =
    [ci_session] => 
)