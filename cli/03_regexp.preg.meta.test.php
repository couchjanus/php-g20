<?php

// 03_regexp.preg.meta.test.php

$uri = 'admin/categories/show/1';

## Метасимвол начала строки

$pattern = "@^admin/categories/show/[a-zA-Z0-9]+@";
$result = preg_match($pattern, $uri, $match); 

var_dump(
    $result,
    $match
);

## Метасимвол конца строки

$pattern = "@^admin/categories/show/[a-zA-Z0-9]+$@";
preg_match($pattern, $uri, $matches);
var_dump($matches);
