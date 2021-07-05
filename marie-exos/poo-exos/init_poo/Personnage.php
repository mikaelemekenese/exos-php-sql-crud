<?php

class Personnage {

    // Attributs de notre classe

    private $_id;
    private $_nom;
    private $_forcePerso;
    private $_degats;
    private $_niveau;
    private $_experience;

    public function __construct(array $donnees) {
        /* $this->_id;
        $this->setNom($donnees {"nom"});
        $this->setForcePerso($donnees {"forcePerso"});
        $this->setDegats($donnees {"degats"});
        $this->setNiveau($donnees {"niveau"});
        $this->setExperience($donnees {"experience"}); */

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

    public function forcePerso() {
        return $this->_forcePerso;
    }

    public function degats() {
        return $this->_degats;
    }

    public function niveau() {
        return $this->_niveau;
    }

    public function experience() {
        return $this->_experience;
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

    public function setForcePerso($forcePerso) {
        $forcePerso = (int) $forcePerso;
        if ($forcePerso >= 1 && $forcePerso <= 100) {
            $this->_forcePerso = $forcePerso;
        }
    }

    public function setDegats($degats) {
        $degats = (int) $degats;
        if ($degats >= 0 && $degats <= 100) {
            $this->_degats = $degats;
        }
    }

    public function setNiveau($niveau) {
        $niveau = (int) $niveau;
        if ($niveau >= 1 && $niveau <= 100) {
            $this->_niveau = $niveau;
        }
    }

    public function setExperience($experience) {
        $experience = (int) $experience;
        if ($experience >= 1 && $experience <= 100) {
            $this->_experience = $experience;
        }
    }
}