<?php

class Livre {

    // Attributs de notre classe

    private $_id;
    private $_titre;
    private $_auteur;
    private $_disponible;
    private $_id_rayon;

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

    public function titre() {
        return $this->_titre;
    }

    public function auteur() {
        return $this->_auteur;
    }

    public function disponible() {
        return $this->_disponible;
    }

    public function id_rayon() {
        return $this->_id_rayon;
    }


    // Setters (mutateurs)

    public function setId($id) {
        $id = (int) $id;
        if ($id > 0) {
            $this->_id = $id;
        }
    }

    public function setTitre($titre) {
        if (is_string($titre)) {
            $this->_titre = $titre;
        }
    }

    public function setAuteur($auteur) {
        if (is_string($auteur)) {
            $this->_auteur = $auteur;
        }
    }

    public function setDisponible($disponible) {
        $disponible = (int) $disponible;
        if ($disponible >= 0 && $disponible <= 1) {
            $this->_disponible = $disponible;
        }
    }

    public function setId_Rayon($id_rayon) {
        $id_rayon = (int) $id_rayon;
        if ($id_rayon > 0) {
            $this->_id_rayon = $id_rayon;
        }
    }
}