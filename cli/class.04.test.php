<?php

/**
 * class.04.test
 */ 

class User {
  
  // Class properties and methods go here
  public $username = 'John Doo';
  public $email = 'doo@my.cat';

  protected $sex = "male"; // I'm a protected property
  private $_age = 22; // I'm a private property

  public function addFriend(){
    //return "added a new friend";
    return "$this->username just added a new friend";
  }

  public function setSex($newSex)
  {
    $this->sex = $newSex;
  }
  public function getSex()
  {
    return $this->sex;
  }
}

$userOne = new User();
$userTwo = new User();

echo $userOne->addFriend();
