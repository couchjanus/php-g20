<?php
/**
 * class.03.test
 */
 
class User {
  
  // Class properties and methods go here

  public $username = 'John Doo';
  public $email = 'doo@my.cat';

  protected $sex = "male"; // I'm a protected property
  private $_age = 22; // I'm a private property

}

$userOne = new User();

var_dump($userOne);

$userTwo = new User();

echo "\nThis are public properties of userOne:\n";
echo $userOne->username;
echo $userOne->email;

echo "\nThis are public properties of userTow:\n";
echo $userTwo->username;
echo $userTwo->email;

// выражение $userTwo->$prop1 будет пытаться найти значение, присвоенное переменной по имени $prop1, а затем обратиться к свойству $userTwo–>значение

// echo $userTwo->$prop1;

$userTwo->username = 'Marry Ann';
$userTwo->email = 'marn@my.cat';

echo "\nThis are public properties of userOne:\n";
echo $userOne->username;
echo $userOne->email;

echo "\nThis are public properties of userTow:\n";
echo $userTwo->username;
echo $userTwo->email;
