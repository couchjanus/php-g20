<?php

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

function render($template, $data = null) {
    if ( $data ) {
        extract($data);
    }
    $template .= '.php';
    include VIEWS."/layouts/app.php"; 
}


// function conf($mix)
// {
//     $url = CONFIG."/".$mix.".json";
  
//     if (file_exists($url)) { 
//         $jsonFile = file_get_contents($url);
//         return json_decode($jsonFile, TRUE);
//     } else { 
//         echo "The file $url does not exists";
//         return false;
//     }
// }

function conf($mix) {
    $url = CONFIG."/".$mix.".json";
    try{
        //Attempt to open json file.
        $jsonFile = file_get_contents($url);
        //If fopen returns a boolean FALSE value, then an error has occurred.
        if($jsonFile === false){
            throw new Exception('Could not open json file!');
        }
        return json_decode($jsonFile, TRUE);
    } 
    //CATCH the exception if something goes wrong.
    catch (Exception $ex) {
        //Print out the exception message.
        echo $ex->getMessage();
        return false;
    }
}
// ============================
require_once realpath(__DIR__.'/../config').'/app.php';
init();
setErrorLogging();
error_log("Hello Log!");

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
    case 'config':
        require_once CONTROLLERS.'/ConfigController.php';
        break;
    default:
        require_once CONTROLLERS.'/ErrorController.php';
}