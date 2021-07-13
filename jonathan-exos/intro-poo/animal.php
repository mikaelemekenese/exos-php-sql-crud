<?php 
    class Animal {
        public $type;
        public $color;

        public function __construct($type, $color) {
            $this->type = $type;
            $this->color = $color;
        }

        public function intro() {
            echo "The animal is a/an {$this->type} and the color is {$this->color}.";
        }
    }
?>