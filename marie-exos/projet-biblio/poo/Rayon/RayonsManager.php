<?php

class rayonsManager {
    private $_db;

    public function __construct($db) {
        $this->setDb($db);
    }

    // CRUD

    // Ajouter un nouveau rayon

    public function add(rayon $rayon) {
        $q = $this->_db->prepare('INSERT INTO rayon(nom, reference) VALUES(:nom, :reference)');

        $q->bindValue(':nom', $rayon->nom());
        $q->bindValue(':reference', $rayon->reference());

        $q->execute();
    }

    // Supprimer un rayon

    public function delete(rayon $rayon) {
        $this->_db->exec('DELETE FROM rayon WHERE id = '.$rayon->id());
    }

    // Afficher les rayons

    public function get($id) {
        $id = (int) $id;

        $q = $this->_db->query('SELECT id, nom, reference FROM rayon WHERE id = '.$id);
        $donnees = $q->fetch(PDO::FETCH_ASSOC);

        return new rayon($donnees);
    }

    public function getList() {
        $rayons = [];

        $q = $this->_db->query('SELECT id, nom, reference FROM rayon');

        while ($donnees = $q->fetch(PDO::FETCH_ASSOC)) {
            $rayons[] = new Emprunt($donnees);
        }

        return $rayons;
    }

    // Modifier les infos d'un rayon

    public function update(rayon $rayon) {
        $q = $this->_db->prepare('UPDATE rayon SET nom = :nom, reference = :reference WHERE id = :id');

        $q->bindValue(':nom', $rayon->nom());
        $q->bindValue(':reference', $rayon->reference());

        $q->execute();
    }

    public function setDb(PDO $db) {
        $this->_db = $db;
    }
}