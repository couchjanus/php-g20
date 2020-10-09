<?php

    define('HOST', 'localhost');
    define('DBUSER', 'root');
    define('DBPASSWORD', 'ghbdtn');
    define('DATABASE', 'store');
    
    const DRIVER = 'mysql';
    const CHARSET = 'utf8mb4';
    const PORT = 3306;
    /**
     * Данные для подключения к БД
     */
    
    return [
        'db' => [
            'driver' => DRIVER,
            'dbname' => DATABASE,
            'host'    => HOST,
            'charset' => CHARSET,
            'port' => PORT,
        ],
        'user' => DBUSER,
        'password' => DBPASSWORD,
        
        'options' => [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ]
    ];  