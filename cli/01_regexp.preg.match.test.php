<?php

// 01_regexp.preg.match.test.php

// Чтобы извлечь соответствующую часть данных, нужно вызвать функцию PHP preg_match() с третьим аргументом, обычно называемым matches.

$text = "hello world";
$regexp = "/o/"; // Поиск символа в строке
$result = preg_match($regexp, $text, $matches);

var_dump(
    $result,
    $matches
);

// Фактические совпадения (если они есть) с регулярным выражением, переданным в качестве первого аргумента в preg_match(), в строке, переданной в качестве второго аргумента, будут храниться внутри matches (третьего аргумента). Он представляет собой массив с определенной структурой.

// int(1)
// // Ассоциативный массив - содержит искомый паттерн
// array(1) {
//   [0]=>
//   string(1) "o"
// }

// preg_match_all
// В PHP разница между preg_match и preg_match_all в том, 
// что функция preg_match найдет только первый match и закончит поиск, 
// в то время как функция preg_match_all вернет все вхождения.

$text = "hello world";
$regexp = "/o/";
$result = preg_match_all($regexp, $text, $match);

var_dump(
    $result,
    $match
);

// int(2)
// array(1) {
//   [0]=>
//   array(2) {
//     [0]=>
//     string(1) "o"
//     [1]=>
//     string(1) "o"
//   }
// }

$text = 'hello $world';
$regexp = "@\$@";
$result = preg_match($regexp, $text, $match);

var_dump(
    $result,
    $match
);

// Чтобы написать в регулярке \$, мы пишем в коде "\\$"
$text = 'hello $world';
$regexp = "@\\$@";
$result = preg_match($regexp, $text, $match);

var_dump(
    $result,
    $match
);

// Чтобы написать в регулярке \\, мы удваиваем каждый бекслеш и пишем "\\\\"
$text = 'hello \\world';
$regexp = "@\\\\@";
$result = preg_match($regexp, $text, $match);

var_dump(
    $result,
    $match
);
