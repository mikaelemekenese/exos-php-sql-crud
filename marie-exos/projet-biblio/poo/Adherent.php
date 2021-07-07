<?php

class Adherent {

    // Attributs de notre classe

    private $_id;
    private $_nom;
    private $_prenom;
    private $_nbr_livresempr;

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

    public function prenom() {
        return $this->_prenom;
    }

    public function nbr_livresempr() {
        return $this->_nbr_livresempr;
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

    public function setPrenom($prenom) {
        if (is_string($prenom)) {
            $this->_prenom = $prenom;
        }
    }

    public function setNbrLivresEmpr($nbr_livresempr) {
        $nbr_livresempr = (int) $nbr_livresempr;
        if ($nbr_livresempr >= 1 && $nbr_livresempr <= 5) {
            $this->_nbr_livresempr = $nbr_livresempr;
        }
    }
}