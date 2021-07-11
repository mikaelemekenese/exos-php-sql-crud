<?php

class LivresManager {
    private $_db;

    public function __construct($db) {
        $this->setDb($db);
    }

    // CRUD

    // Ajouter un nouveau livre

    public function add(Livre $livre) {
        $q = $this->_db->prepare('INSERT INTO livre(titre, auteur, disponible, id_rayon) VALUES(:titre, :auteur, :disponible, :id_rayon)');

        $q->bindValue(':titre', $livre->id_livre());
        $q->bindValue(':auteur', $livre->id_adherent());
        $q->bindValue(':disponible', $livre->date_emprunt(), PDO::PARAM_INT);
        $q->bindValue(':id_rayon', $livre->date_retourmax(), PDO::PARAM_INT);

        $q->execute();
    }

    // Supprimer un livre

    public function delete(Livre $livre) {
        $this->_db->exec('DELETE FROM livre WHERE id = '.$livre->id());
    }

    // Afficher les livres

    public function get($id) {
        $id = (int) $id;

        $q = $this->_db->query('SELECT id, titre, auteur, disponible, id_rayon FROM livre WHERE id = '.$id);
        $donnees = $q->fetch(PDO::FETCH_ASSOC);

        return new Livre($donnees);
    }

    public function getList() {
        $livres = [];

        $q = $this->_db->query('SELECT id, titre, auteur, disponible, id_rayon FROM livre');

        while ($donnees = $q->fetch(PDO::FETCH_ASSOC)) {
            $livres[] = new Emprunt($donnees);
        }

        return $livres;
    }

    // Modifier les infos d'un livre

    public function update(Livre $livre) {
        $q = $this->_db->prepare('UPDATE livre SET titre = :titre, auteur = :auteur, disponible = :disponible, id_rayon = :id_rayon WHERE id = :id');

        $q->bindValue(':titre', $livre->id_livre());
        $q->bindValue(':auteur', $livre->id_adherent());
        $q->bindValue(':disponible', $livre->date_emprunt(), PDO::PARAM_INT);
        $q->bindValue(':id_rayon', $livre->date_retourmax(), PDO::PARAM_INT);

        $q->execute();
    }

    public function setDb(PDO $db) {
        $this->_db = $db;
    }
}