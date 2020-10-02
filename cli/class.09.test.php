<?php

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
        echo 'The class '.__CLASS__." was initiated!\n";
        $this->name = $name;
        $this->email = $email;
    }

    // магический метод __destruct() для очистки класса 
    // (например, закрытие соединения с базой данных). 
    
    // волшебная константа __CLASS__ возвращает имя класса, в котором оно вызывается
    public function __destruct()
    {
        // Вывести сообщение, когда объект уничтожен:
        echo 'The class '.__CLASS__." was destroyed.\n";
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

// Create a new object
$userOne = new User('mario', 'mario@my.cat');

// Get the value of property
echo $userOne->name . "\n";
echo $userOne->email . "\n";
echo $userOne->getEmail() . "\n";
 
// Output a message at the end of the file
echo "End of file.\n";
// Когда достигнут конец файла, PHP автоматически освобождает все ресурсы».

// Чтобы явно вызвать деструктор, вы можете уничтожить объект, используя функцию unset():
 // Destroy the object
unset($userOne);
