<?php

class Emprunt {

    // Attributs de notre classe

    private $_id;
    private $_id_livre;
    private $_id_adherent;
    private $_date_emprunt;
    private $_date_retourmax;
    private $_date_retour;

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

    public function id_livre() {
        return $this->_id_livre;
    }

    public function id_adherent() {
        return $this->_id_adherent;
    }

    public function date_emprunt() {
        return $this->_date_emprunt;
    }

    public function date_retourmax() {
        return $this->_date_retourmax;
    }

    public function date_retour() {
        return $this->_date_retour;
    }


    // Setters (mutateurs)

    public function setId($id) {
        $id = (int) $id;
        if ($id > 0) {
            $this->_id = $id;
        }
    }

    public function setId_Livre($id_livre) {
        $id_livre = (int) $id_livre;
        if ($id_livre > 0) {
            $this->_id_livre = $id_livre;
        }
    }

    public function setId_Adherent($id_adherent) {
        $id_adherent = (int) $id_adherent;
        if ($id_adherent > 0) {
            $this->_id_adherent = $id_adherent;
        }
    }

    public function setDate_Emprunt($date_emprunt) {
        $this->_date_emprunt = $date_emprunt;
    }

    public function setDate_Retourmax($date_retourmax) {
        $this->_date_retourmax = $date_retourmax;
    } 

    public function setDate_Retour($date_retour) {
        $this->_date_retour = $date_retour;
    }
}