<?php

    class Animal {
        public $type;

        function __construct($type) {
            $this->type = $type;
        }

        function setType($type) {
            $this->type = $type;
        }

        function getType() {
            return $this->type;
        }
    }

    class Dog extends Animal {
        private $name;

        function __construct($name) {
            parent::__construct(Dog::class);

            $this->name = $name;
        }

        function setName($name) {
            if (self::isValidName($name) == 'string') {
                $this->name = $name;
            } else {
                echo $name . ' is not a string!';
            }
        }
        
        function getName() {
            return $this->name;
        }

        public static function isValidName($name) {
            return gettype($name) == 'string';
        }
    }

    $myAnimal = new Dog('Hebert');
    $myAnimal->setName('Jane');
    echo $myAnimal->getName();