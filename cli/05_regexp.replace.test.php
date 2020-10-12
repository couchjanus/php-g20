<?php

// 05_regexp.replace.test.php

$key="admin/categories/show/8";

$pattern = preg_replace("/([0-9]+)/", "$1", $key);

var_dump(
    $pattern
);

$result = preg_match("@^".$pattern."$@", $key, $match); // 

var_dump($result, $match);

## Простая группа с захватом

$key="admin/categories/show/8";

$pattern = preg_replace("/([0-9]+)/", "$1", $key);
var_dump(
    $pattern
);

$result = preg_match("@^".$pattern."$@", $key, $match); // 
var_dump(
    $result,
    $match
);

// // preg_replace
// echo "\nPattern\n";

$key="admin/categories/show/{id}";
var_dump(preg_replace("/{([a-zA-Z]+)}/", "$1", $key));

// Pattern
// string(24) "admin/categories/show/id"

// echo "\nReplace Pattern\n";

$url="admin/categories/show/8";
$key="admin/categories/show/{id}";

$pattern = preg_replace("/{([a-zA-Z]+)}/", "(?<$1>[0-9]+)", $key);
var_dump(
    $pattern
);

$result = preg_match("@^".$pattern."$@", $url, $match); // 
var_dump(
    $result,
    $match
);

// Replace Pattern
// string(35) "admin/categories/show/(?<id>[0-9]+)"
// int(1)
// array(3) {
//   [0]=>
//   string(23) "admin/categories/show/8"
//   ["id"]=>
//   string(1) "8"
//   [1]=>
//   string(1) "8"
// }

$key = 'admin/categories/show/{id}';
$pattern = "/{[a-zA-Z0-9]+}/";
preg_match($pattern, $key, $matches);
var_dump($matches);


$key = 'admin/categories/show/{id}';
$pattern = "/{([a-zA-Z0-9]+)}/";
var_dump($pattern);
preg_match($pattern, $key, $matches);
var_dump($matches);


$pattern = "@^" .preg_replace('/{([a-zA-Z0-9]+)}/', '(?<${1}>[0-9]+)', $key). "$@";
var_dump($pattern);
preg_match($pattern, $url, $matches);
var_dump($matches);


$pattern = "@^" .preg_replace('/{([a-zA-Z0-9]+)}/', '(?<$1>[0-9]+)', $key). "$@";
echo $pattern;
preg_match($pattern, $url, $matches);
var_dump($matches);

