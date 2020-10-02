<?php
/**
 * class.08.test
 */     

class User {

    private $username;
    public $name;
    public $email;

    static public $status = 0;

    public function setName($first_name, $last_name)
    {
        $this->username = $first_name.' '.$last_name;
    }
   
    public function getName()
    {
        return $this->username;
    }

    public function __construct($name, $email){
        echo 'The class "', __CLASS__, '" was initiated!<br />';

        $this->name = $name;
        $this->email = $email;
    }

    // getters
    public function getEmail(){
        return $this->email;
    }
      
    // setters
    public function setEmail($email){
        if(strpos($email, '@') > -1){
            $this->email = $email;
        };
    }
}

$userOne = new User('mario', 'mario@my.cat');
$userTwo = new User('luigi', 'luigi@my.cat');

echo $userOne->name . "\n";
echo $userOne->email . "\n";
  
echo $userTwo->name . "\n";
echo $userTwo->email . "\n";

echo $userOne->getEmail() . "\n";
echo $userTwo->getEmail() . "\n";
  
$userTwo->setEmail('yoshi@my.cat');
  
echo $userTwo->getEmail() . "\n";
