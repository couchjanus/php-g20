<?php
/**
 * class.06.test
 */   
const ONE = 1;

class User {
    // Class properties and methods go here
    public $username = 'John Doo'; // значение по умолчанию
    public $email = 'doo@my.cat';
    protected $sex = "male"; // I'm a protected property
    private $_age = 22; // I'm a private property

    // Объявление константы
    const TABLE = 'users';

    public function showConstant() {
        echo self::TABLE . "\n";
    }

    // Пример констант, заданных выражением
    // Для задания констант класса возможно использовать скалярные выражения с цифрами, строками и/или другими константами.
    
    // Начиная с PHP 5.6.0
    const TWO = ONE * 2;
    const THREE = ONE + self::TWO;
    const SENTENCE = 'Значение константы THREE - ' . self::THREE;

    // Модификаторы видимости констант класса
    // Начиная с PHP 7.1.0 для констант класса можно использовать модификаторы области видимости.

    public const BAR = 'bar';
    private const BAZ = 'baz';

    // Начиная с PHP 5.3.0
    const BARACUDA = <<<'BEOT'
        baracuda
    BEOT;
    
    // Начиная с PHP 5.3.0
    const BAZUKA = <<<ZEOT
        bazuka
    ZEOT;
      
    public function addFriend(){
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
  
// использование константы

echo User::TABLE . "\n";

// Начиная с PHP 5.5.0 доступна специальная константа ::class, которой на этапе компиляции присваивается полное имя класса. Полезна при использовании с классами, использующие пространства имен.
// Пример использования ::class с пространством имен
echo User::class; // \User

$classname = "User";
echo $classname::TABLE . "\n"; // начиная с PHP 5.3.0

$userOne = new User();
$userOne->showConstant();

echo $userOne::TABLE."\n"; // начиная с PHP 5.3.0

// Модификаторы видимости констант класса
echo User::BAR, PHP_EOL;
// echo User::BAZ, PHP_EOL;

// Пример со статичными данными
echo User::BARACUDA, PHP_EOL;
echo User::BAZUKA, PHP_EOL;
