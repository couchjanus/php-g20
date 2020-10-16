<?php
// PHP не определяет ситуацию «в статическом методе написано $this» на этапе парсинга или компиляции. Подобная ошибка может возникнуть только в рантайме, если вы попытаетесь выполнить код с $this внутри статического метода.

class A {
  public $id = 42;
  static public function foo() {
    echo $this->id;
  }
}

// не приведет ни к каким ошибкам, пока не пытаетесь использовать метод foo():

$a = new A;
$a->foo();

// (получите «Fatal error: Using $this when not in object context»)

// Статический метод, если он не содержит в коде $this, можно вызывать в динамическом контексте, как метод объекта. Это не является ошибкой в PHP.

class A {
    static public function foo() {
      echo 42;
    }
  }
  
$a = new A;
$a->foo();
  
// Обратное не совсем верно:
class A {
    public function foo() {
      echo 42;
    }
}
// Динамический метод, не использующий $this, можно выполнять в статическом контексте. Однако вы получите предупреждение «Non-static method A::foo() should not be called statically» уровня E_STRICT.
A::foo();
// Использование статического свойства через "->" невозможно и ведет к фатальной ошибке.


class Model {
    public static $table = 'table';
    public static function getTable() {
      return self::$table;
    }
  }
  
echo Model::getTable(); // 'table'

class User extends Model {
    public static $table = 'users';
}
  
echo User::getTable(); // 'table'
  
// self был связан с классом Model тогда, когда о классе User еще ничего не было известно, поэтому и указывает на Model.

// Механизм позднего статического связывания или LSB (Late Static Binding), выполняется на этапе рантайма. Работает он очень просто - достаточно вместо слова «self» написать «static» и связь будет установлена с тем классом, который вызывает данный код, а не с тем, где он написан:
class Model {
  public static $table = 'table';
  public static function getTable() {
    return static::$table;
  }
}

class User extends Model {
  public static $table = 'users';
}

echo User::getTable(); // 'users'

  