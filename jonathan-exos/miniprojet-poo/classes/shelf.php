<?php

class Shelf extends Database {
    // public static $table = 'shelves';

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