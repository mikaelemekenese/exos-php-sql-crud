<?php

interface CRUD {
    public static function create($params);
    public static function read($id);
    public static function update($id, $params);
    public static function delete($id);
}

?>