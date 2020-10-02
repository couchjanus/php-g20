<?php
/**
 * class.02.test
 */

class User {

  // Class properties and methods go here

}

// $instance = new User();

// Класс можно создать и с помощью переменной:

$className = 'User';
$instance = new $className(); // new User()
 
var_dump($instance);
// Возвращает имя класса, экземпляром которого является объект instance.
echo 'the class of instance is: ' . get_class($instance);
