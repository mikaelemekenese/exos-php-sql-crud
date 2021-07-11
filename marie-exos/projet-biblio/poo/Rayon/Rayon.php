<?php

class Emprunt {

    // Attributs de notre classe

    private $_id;
    private $_nom;
    private $_reference;

    public function __construct(array $donnees) {
        $this->hydrate($donnees);
    }

    public function hydrate (array $donnees) {
        foreach ($donnees as $key => $value) {
            $method = 'set'.ucfirst($key); // ucfirst() met une majuscule à la première lettre du premier mot

            if (method_exists($this, $method)) { // On vérifie que la méthode existe
                $this->$method($value);
            }
        }
    }


    // Getters (accesseurs)

    public function id() {
        return $this->_id;
    }

    public function nom() {
        return $this->_nom;
    }

    public function reference() {
        return $this->_reference;
    }


    // Setters (mutateurs)

    public function setId($id) {
        $id = (int) $id;
        if ($id > 0) {
            $this->_id = $id;
        }
    }

    public function setNom($nom) {
        if (is_string($nom)) {
            $this->_nom = $nom;
        }
    }

    public function setReference($reference) {
        if (is_string($reference)) {
            $this->_reference = $reference;
        }
    }
}