<?php
// Это единая точка входа для приложения.
// На этот файл будут переадресованы все запросы сайта.

var_dump(__DIR__);
// define('ROOT', dirname(__DIR__));
// var_dump(ROOT);

// var_dump(__DIR__ . "/../bootstrap/app.php");
// var_dump(realpath(__DIR__ . "/../bootstrap/app.php"));

// Подключаем файл, где храниться автозагрузчик
require_once realpath(__DIR__ . "/../bootstrap/app.php");
