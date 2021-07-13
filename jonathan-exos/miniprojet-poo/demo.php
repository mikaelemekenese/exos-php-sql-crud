<?php

$array = [
    'name' => 'Joe',
    'age' => 9,
];

$columns = array_keys($array);

$query = array_reduce($columns, function($prev, $next) {
    $str = $next . ':' . $next;
    return $prev . ($prev ? ', ' : '') . $str;
}, '');

echo 'VALUES(' . $query . ')'; // VALUES(name:name, age:age)


