<?php

require_once('CRUD.php');

class Comment extends Database implements CRUD {
    public static function create($params) {

    }

    public static function read($id) {

    }

    public static function update($id, $params) {

    }

    public static function delete($id) {

    }
}

class Shelf extends Database {
    public static function create($params) {
        $shelf = self::query('INSERT INTO rayon (nom, reference) VALUES (:nom, :reference)', $params);
        return $shelf;
    }

    

    /*
     * Get the shelves
     * 
     * @return array
     */

    public static function all() {
        $shelves = self::query('SELECT * FROM rayon');
        return $shelves->fetchAll();
    }

    /*
     * Get the shelves using where
     * 
     * @return array
     */

    public static function findById($id) {
        $shelf = self::query("SELECT * FROM rayon WHERE id = $id LIMIT 1");
        return $shelf->fetch();
    }
}