<?php
    class Vehicle{
        private $color;
        private $model;

        public function __construct($color, $model){
            $this->color = $color;
            $this->model = $model;
        }

        public function getColor(){
            return $this->color;
        }

        public function getModel(){
            return $this->model;
        }
    }

    class Car extends Vehicle{
        private $numDoors;

        public function __construct($color, $model, $numDoors){
            parent::__construct($color, $model);
            $this->numDoors = $numDoors;
        }
    }

    class Motorcycle extends Vehicle{
        private $hasSidecar;

        public function __construct($color,$model,$hasSidecar){
            parent::__construct($color,$model);
            $this->hasSidecar = $hasSidecar;
        }
    }

    $car = new Car("red", "Toyota", 4);
    echo "Car Model: " . $car->getModel() . ", Color: " . $car->getColor() . "<br>";

    $motorcycle = new Motorcycle("blue", "Honda", false);
    echo "Motorcycle Model: " . $motorcycle->getModel() . ", Color: " . $motorcycle->getColor() . "<br>";
?>