<?php
echo "Home Page";

// Использование global
$a = 1;
$b = 2;

function Sum() {
    global $a, $b;
    $b = $a + $b;
    // Использование $GLOBALS вместо global
    // $GLOBALS['b'] = $GLOBALS['a'] + $GLOBALS['b'];
} 
Sum();
echo "<h3>Sum(a + b) = $b</h3>";

// $GLOBALS - список всех глобальных переменных в скрипте (исключая суперглобалов)
var_dump($GLOBALS);// Суперглобальные переменные
// $_GET - список всех полей формы, отправленной браузером с помощью запроса GET
var_dump($_GET);// Суперглобальные переменные
// $_POST - список всех полей формы отправленной браузером с помощью запроса POST
// $_COOKIE - содержит список всех куки, отправленных браузером
var_dump($_COOKIE);
// $_REQUEST - все сочетания ключ/значение в массивах $_GET, $_POST, $_COOKIE
var_dump($_REQUEST);
// $_FILES - содержит список всех файлов, загруженных браузером
// $_SESSION - позволяет хранить и использовать переменные сессии для текущего браузера
// $_SERVER - информация о сервере: имя файла скрипта и IP адрес браузера.
var_dump($_SERVER);
// $_ENV - список переменных среды, передаваемых PHP, например, CGI переменные.


// try {
//     // checking if
//     if(filter_var($email, FILTER_VALIDATE_EMAIL) === FALSE) {
//       // throwing an exception in case email is not valid
//       throw new Exception($email);
//     }
//   } catch (Exception $e) {
//            // CATCH the exception if something goes wrong.
//            echo $e->getMessage();
//   }
