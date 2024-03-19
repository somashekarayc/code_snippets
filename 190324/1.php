<?php


$obj = new stdClass();
$obj->property1 = "Value 1";
$obj->property2 = "Value 2";
echo $obj->property1;
echo $obj->property2;
$obj->property1 = "New Value 1";
$obj->property2 = "New Value 2";
unset($obj->property1);

print_r($obj);
