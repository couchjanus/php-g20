<?php

$errors = [];
$feedback_msg = '';
$title = 'Contact us';

$comments = [];

require_once CONFIG.'/db.php';

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
        $subject = filter_var($_POST['subject'], FILTER_SANITIZE_STRING);
        if($subject == ''){
            $errors[] = 'Subject is not valid';
        }
    }else{
        $errors[] = 'Subject is required';
    }
         
    if($_POST['message'] != ''){
        $message = htmlentities(filter_var($_POST['message'], FILTER_SANITIZE_STRING));
        if($message == ''){
            $errors[] = 'Message is not valid';
        }
    }else{
        array_push($errors, 'Message is required');
    }
    $contact_copy = $_POST['contact-copy'] ?? false;
    $contact_copy = filter_var($contact_copy, FILTER_VALIDATE_BOOLEAN) ?? false;
    $feedback_msg = ($contact_copy) ? 'We are send You a copy of this message':'';
    return [$errors, $feedback_msg, $name, $email, $message, $subject];
}

if ($_POST) {
    list($errors, $feedback_msg, $name, $email, $message, $subject) = validate();
    try {
        $conn = mysqli_connect(HOST, DBUSER, DBPASSWORD, DATABASE);
            $sql = "INSERT INTO guestbook (name, email, message, subject) VALUES ('$name', '$email', '$message', '$subject')";
            mysqli_query($conn, $sql);
    } catch (Exception $e) {
        $error = mysqli_error($conn);
    } finally {
        mysqli_close($conn);
    }
}

try {
    $conn = mysqli_connect(HOST, DBUSER, DBPASSWORD, DATABASE);
    $sql = "SELECT * FROM guestbook";
    $result = mysqli_query($conn, $sql);
    $resCount = mysqli_num_rows($result);
    while($row = mysqli_fetch_assoc($result)){
        array_push($comments, $row);
    }
} catch (Exception $e) {
    $error = mysqli_error($conn);
} finally {
    mysqli_close($conn);
}

$address = conf('contacts');

render('contact/index', compact('title', 'errors', 'feedback_msg', 'address', 'comments', 'result'));
// 