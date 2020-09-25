<?php

// echo __DIR__;
// echo '<h3>DIRECTORY_SEPARATOR (string): '.DIRECTORY_SEPARATOR.'</h3>';

// define('ROOT', realpath(__DIR__.'/../'));
// var_dump(ROOT);

// var_dump(__DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'config/app.php');
// var_dump(realpath(__DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'config'));

// ===============Устанавливаем временную зону=========
// Получение временной зоны по умолчанию
echo "<h2>Get date default timezone</h2>";
echo date_default_timezone_get();

// Получение временной зоны по умолчанию
echo "<h2>Get date timezone from php.ini</h2>";

if (ini_get('date.timezone')) {
    echo 'date.timezone: ' . ini_get('date.timezone');
}
// Получение временной зоны по умолчанию
echo "<h2>Set date default timezone</h2>";
date_default_timezone_set('Europe/Kiev');

if (function_exists('date_default_timezone_set')) {
    date_default_timezone_set('Europe/Kiev');   
}
    
if (date_default_timezone_get()) {
    echo 'date_default_timezone_set: ' . date_default_timezone_get();
}

// ===============Устанавливаем временную зону=========
function init() {
    // Устанавливаем временную зону по умолчанию
    if (function_exists('date_default_timezone_set')) {
        date_default_timezone_set('Europe/Kiev');  
    }
    setlocale(LC_ALL, '');
    // Установка ukraine локали
    setlocale(LC_ALL, 'uk_UA');
}

// ============Установка display errors===========    
echo ini_get('display_errors');
    
ini_set('display_errors', 1);
echo "<br>display_errors: ", ini_get('display_errors');
     
echo "<h2>Get display errors</h2>";

echo ini_get('display_errors');
  
echo "<h2>Set display errors</h2>";
if (!ini_get('display_errors')) {
    ini_set('display_errors', '1');
}   

echo ini_get('display_errors');

// ============Установка display errors===========

require_once realpath(__DIR__.'/../config').'/app.php';
var_dump(APP);

// ============Установка ErrorLogging===========
function setErrorLogging(){
    if (APP_ENV == 'local') {
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL | E_WARNING | E_PARSE | E_NOTICE| E_DEPRECATED);
        ini_set('display_errors', "1");
    } 
    else{
        error_reporting(E_ALL);
        ini_set('display_errors', "0");
    }
    ini_set('log_errors', "1");
    ini_set('error_log', LOGS . '/error_log.php');
}
 
setErrorLogging();
error_log("Hello Log!");

// ============Установка ErrorLogging===========

/**
 *  @return string текущий адрес запроса 
**/ 
function getURI()
{
    if (isset($_SERVER['REQUEST_URI']) and !empty($_SERVER['REQUEST_URI'])) {
        // var_dump(debug_backtrace());
        // debug_print_backtrace();
        return trim($_SERVER['REQUEST_URI'], '/');
    }
}


 $uri = getURI();
 echo "<pre>";
 print_r($uri);
 echo "</pre>";
 

// function render($template, $data = null) {
//     $template .= '.php';
//     include VIEWS."/layouts/app.php"; 
// }

function render($template, $data = null) {
    if ( $data ) {
        extract($data);
    }
    $template .= '.php';
    include VIEWS."/layouts/app.php"; 
}

switch (getURI()) {
    case '':
        require_once CONTROLLERS.'/HomeController.php';
        break;
    case 'about':
        require_once CONTROLLERS.'/AboutController.php';
        break;
    case 'contact':
        require_once CONTROLLERS.'/ContactController.php';
        break;
    }