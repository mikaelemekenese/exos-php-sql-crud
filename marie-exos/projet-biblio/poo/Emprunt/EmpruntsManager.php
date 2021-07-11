<?php

class EmpruntsManager {
    private $_db;

    public function __construct($db) {
        $this->setDb($db);
    }

    // CRUD

    // Ajouter un nouvel emprunt

    public function add(Emprunt $emprunt) {
        $q = $this->_db->prepare('INSERT INTO emprunt(id_livre, id_adherent, date_emprunt, date_retourmax, date_retour) VALUES(:id_livre, :id_adherent, :date_emprunt, :date_retourmax, :date_retour)');

        $q->bindValue(':id_livre', $emprunt->id_livre(), PDO::PARAM_INT);
        $q->bindValue(':id_adherent', $emprunt->id_adherent(), PDO::PARAM_INT);
        $q->bindValue(':date_emprunt', $emprunt->date_emprunt());
        $q->bindValue(':date_retourmax', $emprunt->date_retourmax());
        $q->bindValue(':date_retour', $emprunt->date_retour());

        $q->execute();
    }

    // Supprimer un emprunt

    public function delete(Emprunt $emprunt) {
        $this->_db->exec('DELETE FROM emprunt WHERE id = '.$emprunt->id());
    }

    // Afficher les emprunts

    public function get($id) {
        $id = (int) $id;

        $q = $this->_db->query('SELECT id, id_livre, id_adherent, date_emprunt, date_retourmax, date_retour FROM emprunt WHERE id = '.$id);
        $donnees = $q->fetch(PDO::FETCH_ASSOC);

        return new Emprunt($donnees);
    }

    public function getList() {
        $emprunts = [];

        $q = $this->_db->query('SELECT id, id_livre, id_adherent, date_emprunt, date_retourmax, date_retour FROM emprunt ORDER BY date_emprunt');

        while ($donnees = $q->fetch(PDO::FETCH_ASSOC)) {
            $emprunts[] = new Emprunt($donnees);
        }

        return $emprunts;
    }

    // Modifier les infos d'un emprunt

    public function update(Emprunt $emprunt) {
        $q = $this->_db->prepare('UPDATE emprunt SET id_livre = :id_livre, id_adherent = :id_adherent, date_emprunt = :date_emprunt, date_retourmax = :date_retourmax, date_retour = :date_retour WHERE id = :id');

        $q->bindValue(':id_livre', $emprunt->id_livre(), PDO::PARAM_INT);
        $q->bindValue(':id_adherent', $emprunt->id_adherent(), PDO::PARAM_INT);
        $q->bindValue(':date_emprunt', $emprunt->date_emprunt());
        $q->bindValue(':date_retourmax', $emprunt->date_retourmax());
        $q->bindValue(':date_retour', $emprunt->date_retour());

        $q->execute();
    }

    public function setDb(PDO $db) {
        $this->_db = $db;
    }
}