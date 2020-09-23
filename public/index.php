<?php

// В элементе глобального массива $_SERVER['REQUEST_URI'] содержится полный адрес по которому обратился пользователь.

function getURI() {
    if (isset($_SERVER['REQUEST_URI']) and !empty($_SERVER['REQUEST_URI']))
    return trim($_SERVER['REQUEST_URI'], '/');
}

// function getUrl() {
//    $url  = ( $_SERVER["HTTPS"] != 'on' ) ? 'http://'.$_SERVER["SERVER_NAME"] :  'https://'.$_SERVER["SERVER_NAME"];
//    $url .= ( $_SERVER["SERVER_PORT"] != 80 ) ? ":".$_SERVER["SERVER_PORT"] : "";
//    return $url .= $_SERVER["REQUEST_URI"];
// }    
// Пример использования:  echo getUrl(); // вернет url вида http://xx.yy/404.html

$uri = getURI();
   switch ($uri) {
       case '':
           include 'home.php';
           break;
       case 'about':
           include 'about.php';
           break;
       case 'contact':
           include 'contact.php';
           break;
        case 'test':
            include 'form.php';
            break;
       default:
           include '404.php';
} 

