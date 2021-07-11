<?php

class AdherentsManager {
    private $_db;

    public function __construct($db) {
        $this->setDb($db);
    }

    // CRUD

    // Ajouter un nouvel adhérent

    public function add(Adherent $adherent) {
        $q = $this->_db->prepare('INSERT INTO adherent(nom, prenom, nbr_livresempr) VALUES(:nom, :prenom, :nbr_livresempr)');

        $q->bindValue(':nom', $adherent->nom());
        $q->bindValue(':prenom', $adherent->prenom());
        $q->bindValue(':nbr_livresempr', $adherent->nbr_livresempr(), PDO::PARAM_INT);

        $q->execute();
    }

    // Supprimer un adherent

    public function delete(Adherent $adherent) {
        $this->_db->exec('DELETE FROM adherent WHERE id = '.$adherent->id());
    }

    // Afficher les adherents

    public function get($id) {
        $id = (int) $id;

        $q = $this->_db->query('SELECT id, nom, prenom, nbr_livresempr FROM adherent WHERE id = '.$id);
        $donnees = $q->fetch(PDO::FETCH_ASSOC);

        return new Adherent($donnees);
    }

    public function getList() {
        $adherents = [];

        $q = $this->_db->query('SELECT id, nom, prenom, nbr_livresempr FROM adherent ORDER BY nom');

        while ($donnees = $q->fetch(PDO::FETCH_ASSOC)) {
            $adherents[] = new Adherent($donnees);
        }

        return $adherents;
    }

    // Modifier les infos d'un adhérent

    public function update(Adherent $adherent) {
        $q = $this->_db->prepare('UPDATE adherent SET nom = :nom, prenom = :prenom, nbr_livresempr = :nbr_livresempr WHERE id = :id');

        $q->bindValue(':forcePerso', $adherent->nom());
        $q->bindValue(':degats', $adherent->prenom());
        $q->bindValue(':niveau', $adherent->nbr_livresempr(), PDO::PARAM_INT);
        $q->bindValue(':id', $adherent->id(), PDO::PARAM_INT);

        $q->execute();
    }

    public function setDb(PDO $db) {
        $this->_db = $db;
    }
}