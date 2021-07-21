<?php

public static function getAll() {
    return self::query("SELECT * FROM " . static::$table);
}

public static function findById($id) {
    return self::query("SELECT * FROM " . static::$table . " WHERE id=$id LIMIT 1");
}

public static function where($column, $value) {
    return self::query("SELECT * FROM " . static::$table . " WHERE " . $column . "=" . $value);
}

public static function create($params) {
    $columns = array_keys($params);
    $queries = array_reduce($columns, function($prev, $next) {
        return $prev . ($prev ? ', ' : '') . $next;
    }, '');
    $values = array_reduce($columns, function($prev, $next) {
        return $prev . ($prev ? ', ' : '') . ':' . $next;
    }, '');
    return self::query("INSERT INTO " . static::$table . " ($queries) VALUES($values)", $params);
}

public function update($params) {
    $queries = array_reduce($columns, function($prev, $next, $index) {
        echo $index;
        return $prev . ($prev ? ', ' : '') . $next;
    }, '');

    die();
    return $this->query("UPDATE ". static::$table . " SET $queries WHERE id=" . $this->id, $params);
}

public function delete() {
    return $this->query("DELETE FROM " . static::$table . " WHERE id=" . $this->id);
}

public static function buildColumns($params) {
    
}