<?php

class Database {

    const servername = "localhost";
    const username = "root";
    const password = "";
    const database = "blog";

    public static $conn;

    protected static function connect() {
        try {
            if (empty(self::$conn)) {
                $conn = new PDO("mysql:host=" . self::servername . ";dbname=" . self::database, self::username, self::password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$conn = $conn;
            }

            return self::$conn;
        } catch(PDOException $e) {
            echo $e->getMessage();
        }
    }

    protected static function query($sql, $params = []) {
        try {
            $stmt = self::connect()->prepare($sql);
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $stmt->execute($params);

            return $stmt;
        } catch(PDOException $e) {
            echo $e->getMessage();
        }
    }

    protected static function insert($table, $params) {
        $columns = array_keys($params);
        $queries = array_reduce($columns, function($prev, $next) {
            return $prev . ($prev ? ', ' : '') . $next;
        }, '');
        $values = array_reduce($columns, function($prev, $next) {
            return $prev . ($prev ? ', ' : '') . ':' . $next;
        }, '');
        $stmt = self::query("INSERT INTO $table ($queries) VALUES ($values)", $params);

        return self::$conn->lastInsertId();
    }

    protected static function fetchAll() {
        $posts = self::query('SELECT * FROM posts');
        return $posts->fetchAll();
    }
}