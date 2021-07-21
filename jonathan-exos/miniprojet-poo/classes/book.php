<?php

require_once('database.php');
require_once('CRUD.php');

class Bookj extends Database {

    /*
     * Set the attributes mapping the columns
     */
    public $id;
    public $titre;
    public $auteur;
    public $disponible;
    public $id_rayon;

    function __construct($params) {
        // Insert post and set the ID
        var_dump($params); die();
        if (isset($params['id'])) {
            var_dump($params); die();
            $this->id = self::insert('posts', $params);
        }

        // Set the attributes from the params
        foreach ($params as $key => $value) {
            $this->$key = $value;
        }
    }

    /*
     * Get all the books
     * 
     * @return array
     */
    public static function all() {
        $books = array_map(function ($book) {
            return new Book($book);
        }, self::fetchAll('books'));

        return $books;
    }
}