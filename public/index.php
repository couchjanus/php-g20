<?php
// Альтернативный синтаксис
?>

<?php if ($_SERVER['REQUEST_URI']=='/') : ?>
    <h1>Home Page</h1>
<?php elseif ($_SERVER['REQUEST_URI']=='/about') : ?>
    <h1>About Page</h1>
<?php else : ?>
    <h1>404</h1>
<?php endif;?>
<?php
switch ($_SERVER['REQUEST_URI']) {
       case '/':
           # code...
           echo "<h1>Home Page</h1>";
           break;
       case '/about':
           # code...
           echo "<h1>About Page</h1>";
           break;
       default:
           # code...
           echo $_SERVER['REQUEST_URI'];
           echo "<h1>404</h1>";
   }
