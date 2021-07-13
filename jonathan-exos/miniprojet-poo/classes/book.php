<?php

class Book extends Database {

    
    // public static $table = 'books';

    /*
     * Get the books
     * 
     * @return array
     */
    public static function all() {
        $books = self::query('SELECT * FROM livre');
        return $books->fetchAll();
    }
}