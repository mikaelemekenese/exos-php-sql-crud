<?php

class Database {

    const servername = "localhost";
    const username = "root";
    const password = "";
    const database = "blog";

    public static $table;
    public $id;

    function __construct($params) {
        self::create($params);
    }

    private static function connect() {
        try {
            $conn = new PDO("mysql:host=" . self::servername . ";dbname=" . self::database, self::username, self::password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $conn;
        } catch(PDOException $e) {
            echo $e->getMessage();
        }
    }

    private static function query($sql, $params = []) {
        try {
            $stmt = self::connect()->prepare($sql);
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $stmt->execute($params);

            return $stmt;
        } catch(PDOException $e) {
            echo $e->getMessage();
        }
    }
}