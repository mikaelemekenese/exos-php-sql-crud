<?php
    class Chien {

        // Properties
        public $type;
        public $color;

        // Constructor
        function __construct($type, $color) {
            $this->type = $type;
            $this->color = $color;
        }

        // Methods
        function get_type() {
            return $this->type;
        }

        function get_color() {
            return $this->color;
        }
    }

    $dog = new Chien("dog", "white");
    echo $dog->get_type();
    echo "<br>";
    echo $dog->get_color();


    include 'animal.php';

    class Chat extends Animal {
        public function message() {
            echo "<br><br>What type of animal am I ? ";
        }
    }

    $cat = new Chat("cat", "brown");
    $cat->message();
    $cat->intro();