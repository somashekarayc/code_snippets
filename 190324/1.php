<?php


// $obj = new stdClass();
// $obj->property1 = "Value 1";
// $obj->property2 = "Value 2";
// echo $obj->property1;
// echo $obj->property2;
// $obj->property1 = "New Value 1";
// $obj->property2 = "New Value 2";
// unset($obj->property1);

// print_r($obj);

// print_r(phpinfo());



class User
{
    public $name, $password;
    function save_user()
    {
        echo "Save User code goes here";
    }
}

$object = new User;
print_r($object);
echo "<br>";
$object->name = "Joe";
$object->password = "mypass";
print_r($object);
echo "<br>";
$object->save_user();