<?php

// 10_regexp.preg_replace.test.php
// Замена по шаблону


$text = 'hello world 123';
$html = preg_replace('/([a-z]+)\s([0-9]+)/', '<b>$1</b>', $text);
echo $html."\n";

$html = preg_replace('/([a-z]+)\s([0-9]+)/', '<b>$2</b>', $text);
echo $html."\n";


$key="admin/categories/show/8";

$pattern = preg_replace("/([0-9]+)/", "$1", $key);

var_dump(
    $pattern
);

$result = preg_match("@^".$pattern."$@", $key, $match); // 

var_dump($result, $match);

// ## Простая группа с захватом

// $key="admin/categories/show/8";

$pattern = preg_replace("/([0-9]+)/", "$1", $key);
var_dump(
    $pattern
);

$result = preg_match("@^".$pattern."$@", $key, $match); // 
var_dump(
    $result,
    $match
);

$url="/admin/categories/show/198";
$key = "/admin/categories/show/{id}";

$pattern = "@^" .preg_replace('/{([a-z]+)}/', '?[0-9]+', $key). "$@";
echo $pattern."\n";
preg_match($pattern, $url, $matches);
var_dump($matches);

$pattern = "@^" .preg_replace('/{([a-z]+)}/', '(?<$1>[0-9]+)', $key). "$@";
echo $pattern."\n";
preg_match($pattern, $url, $matches);
var_dump($matches);


// $pattern = "@^" .preg_replace('/{([a-zA-Z0-9]+)}/', '(?<$1>[0-9]+)', $key). "$@";
// echo $pattern."\n";
// preg_match($pattern, $url, $matches);
// var_dump($matches);

