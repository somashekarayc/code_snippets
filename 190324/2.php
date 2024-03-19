<?php

class Car {
    public $brand;
    public $color;

    public function __construct($brand, $color) {
        $this->brand = $brand;
        $this->color = $color;
        echo "A new $color $brand car is created.";
    }

    public function startEngine() {
        return "The $this->brand car is starting the engine.";
    }

    public function __destruct() {
        echo "The $this->color $this->brand car is destroyed.";
    }
}

$myCar = new Car("Toyota", "red");

echo $myCar->brand; 

echo $myCar->startEngine(); 
unset($myCar);
