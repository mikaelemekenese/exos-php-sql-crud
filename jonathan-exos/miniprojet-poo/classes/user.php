<?php

// Definition

class Mom {
    public static $version = '1.0';
    var $name;
    function __construct($name) {
        $this->name = $name;
    }
    function getName() {
        return $this->name;
    }
    function setName($name) {
        $this->name = $name;
    }

    static public function getVersion() {
        return static::$version;
    }
}

class Kid extends Mom {
    public static $version = '2.0';
    function __construct($name) {
        $this->mom = new Mom($name);
    }
}

// Start
$kid = new Kid('Jane');
echo $kid->mom->getName();
echo Mom::$version;
echo Kid::getVersion();



