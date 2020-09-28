<?php

$errors = [];
$feedback_msg = '';
$title = 'Contact us';

function validate(){
    $errors = [];
    if($_POST['name'] != ''){
        $name = htmlspecialchars(filter_var($_POST['name'],FILTER_SANITIZE_STRING));
        if($name == ''){
            array_push($errors, 'Name is not valid');
        }
    }else{
        array_push($errors, 'Name is required');
    }
         
    if($_POST['email'] != ''){
        $email = filter_var($_POST['email'],FILTER_SANITIZE_STRING);
         
        if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
            $errors[] = 'Email is not valid';
        }
    }else{
        $errors[] = 'Email is required';
    }
         
    if($_POST['subject'] != ''){
        $subject = filter_var($_POST['subject'],FILTER_SANITIZE_STRING);
        if($subject == ''){
            $errors[] = 'Subject is not valid';
        }
    }else{
        $errors[] = 'Subject is required';
    }
         
    if($_POST['message'] != ''){
        $message = htmlentities(filter_var($_POST['message'],FILTER_SANITIZE_STRING));
        if($message == ''){
            $errors[] = 'Message is not valid';
        }
    }else{
        array_push($errors, 'Message is required');
    }
    $contact_copy = $_POST['contact-copy'] ?? false;
    $contact_copy = filter_var($contact_copy, FILTER_VALIDATE_BOOLEAN) ?? false;
    $feedback_msg = ($contact_copy) ? 'We are send You a copy of this message':'';
    return [$errors, $feedback_msg];
}

if ($_POST) {
    list($errors, $feedback_msg) = validate();
}

// Чтобы проверить факт существования файла:

// if (file_exists(CONFIG."/contacts.txt")) {   
//     echo "Файл существует"; 
// }

// fopen() - открывает локальный или удаленный файл и возвращает указатель на него.

// $fh = fopen(CONFIG."/contacts.txt", 'r') or die("не удалось открыть файл");
// $fh = fopen(CONFIG."/contacts.txt", 'rb') or die("не удалось открыть файл");

// if (!is_dir(CONFIG."/contacts.txt")) {
//     $fh = fopen(CONFIG."/contacts.txt", 'rb') or die("не удалось открыть файл");    
// }

// ошибка при работе с файлами
// if (!is_dir(CONFIG."/contacts.txt")) {
//     $fh = @fopen(CONFIG."/contacts.txt", 'rb') or die("не удалось открыть файл");    
// }

// if ($fh) {
//     echo "File opened";
// }

// Для построчного чтения используется функция fgets()
// while (!feof($fh)) {
//     echo fgets($fh);
// } 

// поблочное считывание определенного количества байт из файла с помощью функции fread():
// while (!feof($fh)) {
//     echo fread($fh, 4096);
// }


// fclose($fh);
// echo "File closed";


// if (!is_dir(CONFIG."/contacts.txt")) {
//     $file = @file(CONFIG."/contacts.txt");
// }

// $count=count($file);
// echo $count;

// Если нам надо прочитать файл полностью:
// $contacts = file_get_contents(CONFIG."/contacts.txt");
// При этом нам не надо открывать явно файл, получать дескриптор, а затем закрывать файл.
// echo $contacts;


// $url = CONFIG."/contacts.json"; // your json file path
// $data = array(); // create empty array

// read json file from url
// $readJSONFile = file_get_contents($url);
// print_r($readJSONFile); // display contents

//convert json to array in php
// $data = json_decode($readJSONFile, TRUE);
// var_dump($data); // print array

$address = conf('contacts');
// render('contact/index', array(
//     'title' => 'Contact us',
//     'address' => $address
// ));

render('contact/index', compact('title', 'errors', 'feedback_msg', 'address'));
