<?php
    function connect() {
        $servername = "localhost";
        $username = "root";
        $password = "";

        try {
            $conn = new PDO("mysql:host=$servername;dbname=blog", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $conn;
        } catch(PDOException $e) {
            return  $e->getMessage();
        }
    }

    function query($sql) {
        try {
            $stmt = connect()->prepare($sql);
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $stmt->execute();

            return $stmt;
        } catch(PDOException $e) {
            return  $e->getMessage();
        }
    }
?>