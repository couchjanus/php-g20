<?php

$link = mysqli_init();

if (!$link) {
    die('mysqli_init завершилась провалом');
}

if (!mysqli_options($link, MYSQLI_INIT_COMMAND, 'SET AUTOCOMMIT = 0')) {
    die('Установка MYSQLI_INIT_COMMAND завершилась провалом');
}

if (!mysqli_options($link, MYSQLI_OPT_CONNECT_TIMEOUT, 5)) {
    die('Установка MYSQLI_OPT_CONNECT_TIMEOUT завершилась провалом');
}

if (!mysqli_real_connect($link, 'localhost', "root", "ghbdtn", 'mydb')) {
    die('Ошибка подключения (' . mysqli_connect_errno() . ') '
            . mysqli_connect_error());
}
var_dump($link);
echo 'Выполнено... ' . mysqli_get_host_info($link) . "\n";

mysqli_close($link);
