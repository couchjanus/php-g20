<?php

require_once CONFIG.'/db.php';

//============= извлечение ассоциативного массива ==============
class Category
{
    public function all() {
        // новое соединение с сервером MySQL 
        $conn = new mysqli(HOST, DBUSER, DBPASSWORD, DATABASE);

        if ($conn->connect_error) {
            die('Ошибка подключения (' . $conn->connect_errno . ') '
                . $conn->connect_error);
        }
        
        $categories = [];
        
        // Select запросы возвращают результирующий набор 
        
        if ($result = $conn->query("SELECT * FROM categories")) {
            $numRows = sprintf("Select вернул %d строк.\n", $result->num_rows);
        }
        
        // num_rows содержит количество результатов выборки
        if (!$result->num_rows) {
            // если нет результатов выборки - выполнить какое-то действие
        } 
   
        // извлечение ассоциативного массива
        // получить данные одной строки в виде ассоциативного массива
        
        // $row = $result->fetch_assoc();

        while ($row = $result->fetch_assoc()) {
            array_push($categories, $row);
        }
       
        // очищаем результирующий набор
        $result->close();
            
        // закрываем подключение
        $conn->close(); 
        return $categories;
    }

}

// получить все строки, вариант № 1
// mysqli_result::fetch_all() 
// class Category
// {
//     public function all() {
//         // новое соединение с сервером MySQL 
//         $conn = new mysqli(HOST, DBUSER, DBPASSWORD, DATABASE);

//         if ($conn->connect_error) {
//             die('Ошибка подключения (' . $conn->connect_errno . ') '
//                 . $conn->connect_error);
//         }
        
//         $categories = [];
        
//         // Select запросы возвращают результирующий набор 
//         if ($result = $conn->query("SELECT * FROM categories")) {
//             $numRows = sprintf("Select вернул %d строк.\n", $result->num_rows);
//         }

//         if($result && $result->num_rows>0){
//             $categories = $result->fetch_all(MYSQLI_BOTH);
//         }
//         // очищаем результирующий набор
//         $result->close();
//         // закрываем подключение
//         $conn->close(); 
//         return $categories;
//     }
// }
// получить все строки в виде ассоциативного массива, вариант № 2
// class Category
// {
//     public function all() {
//         // новое соединение с сервером MySQL 
//         $conn = new mysqli(HOST, DBUSER, DBPASSWORD, DATABASE);

//         if ($conn->connect_error) {
//             die('Ошибка подключения (' . $conn->connect_errno . ') '
//                 . $conn->connect_error);
//         }
//         $categories = [];
//         // Select запросы возвращают результирующий набор 
//         if ($result = $conn->query("SELECT * FROM categories")) {
//             $numRows = sprintf("Select вернул %d строк.\n", $result->num_rows);
//         }
//         // получить все строки в виде ассоциативного массива, вариант № 2
//         $categories = $result->fetch_all(MYSQLI_ASSOC);
//         // очищаем результирующий набор
//         $result->close();
//         // закрываем подключение
//         $conn->close(); 
//         return $categories;
//     }
// }

// получить все строки, вариант № 3
// получить данные одной строки в виде объекта
// $row = $result->fetch_object();
// ================= =======================
// class Category
// {
//     public function all() {
//         // новое соединение с сервером MySQL 
//         $conn = new mysqli(HOST, DBUSER, DBPASSWORD, DATABASE);

//         if ($conn->connect_error) {
//             die('Ошибка подключения (' . $conn->connect_errno . ') '
//                 . $conn->connect_error);
//         }
        
//         $categories = [];
//         // Select запросы возвращают результирующий набор 
       
//         if ($result = $conn->query("SELECT * FROM categories")) {
//             $numRows = sprintf("Select вернул %d строк.\n", $result->num_rows);
//         }
        
//         while ($entry = $result->fetch_object()) {
//             $categories[] = $entry;
//         }
       
//         // очищаем результирующий набор
//         $result->close();
//         // закрываем подключение
//         $conn->close(); 
//         return $categories;
//     }
// }

// class Category
// {
//     public function all() {
//         // новое соединение с сервером MySQL 
//         $conn = new mysqli(HOST, DBUSER, DBPASSWORD, DATABASE);

//         if ($conn->connect_error) {
//             die('Ошибка подключения (' . $conn->connect_errno . ') '
//                 . $conn->connect_error);
//         }
        
//         $categories = [];
//         // Select запросы возвращают результирующий набор 
       
//         if ($result = $conn->query("SELECT * FROM categories")) {
//             $numRows = sprintf("Select вернул %d строк.\n", $result->num_rows);
//         }
        
//         while ($entry = $result->fetch_object()) {
//             $categories[] = $entry;
//         }
       
//         // очищаем результирующий набор
//         $result->close();
//         // закрываем подключение
//         $conn->close(); 
//         return $categories;
//     }

//     public function save($name, $status){
//         $conn = new mysqli(HOST, DBUSER, DBPASSWORD, DATABASE);

//         if ($conn->connect_error) {
//             die('Ошибка подключения (' . $conn->connect_errno . ') '
//                 . $conn->connect_error);
//         }

//         $name = mysqli_real_escape_string($conn, $name);
//         $status = mysqli_real_escape_string($conn, $status);
//         // выполняем операции с базой данных
//         if ($conn->query("INSERT INTO categories (name, status) VALUES ('$name', '$status')")) {
//             $affected_rows = $conn->affected_rows;
//         }
//         // закрываем подключение
//         $conn->close(); 
//         return $affected_rows;
//     }
// }
