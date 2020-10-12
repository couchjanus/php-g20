<?php
// 04_regexp.preg.group.test.php

## Простая группа с захватом
$url = "admin/categories/show/8";
$pattern = "@^admin/categories/show/([a-zA-Z0-9]+)$@";
$result = preg_match($pattern, $url, $match); // 

var_dump(
    $result,
    $match
);
