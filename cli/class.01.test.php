<?php

/**
 * class.01.test
 */

class User {

  // Class properties and methods go here

}

// Если с директивой new используется строка (string), 
// содержащая имя класса, то будет создан новый экземпляр этого класса. 

$userOne = new User();
var_dump($userOne);

// Если имя находится в пространстве имен, 
// то оно должно быть задано полностью.

$userTwo = new \User();

// Возвращает имя класса, экземпляром которого является объект userTwo.
echo 'the class of userTwo is: ' . get_class($userTwo);

