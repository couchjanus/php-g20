<?php
/**
 *  @return string текущий адрес запроса 
 **/ 
function getURI()
{
    if (isset($_SERVER['REQUEST_URI']) and !empty($_SERVER['REQUEST_URI'])) {
        return trim($_SERVER['REQUEST_URI'], '/');
    }
}

$result = null;

// Подключаем файл routes
$filename = CONFIG.'/routes'.EXT;
if (file_exists($filename)) {
    $routes = include_once $filename;
} else {
    echo "Файл $filename не существует";
}

function getController($path) {
    $segments = explode('\\', $path);
    list($controller, $action)=explode('@', array_pop($segments));
    $controllerPath = DIRECTORY_SEPARATOR;
    foreach ($segments as $segment) {
        $controllerPath .= $segment.DIRECTORY_SEPARATOR;
    }
    return [$controllerPath, $controller, $action];
}

function initController($controllerPath, $controller, $action, $result = null) {
    $controllerPath = CONTROLLERS . $controllerPath . $controller . EXT;
    if (file_exists($controllerPath)) {
        include_once $controllerPath;
        $controller = new $controller;
        if (method_exists($controller, $action)) {
            $controller->$action();
            $result = true;
        }
    }
    return $result;
}

foreach ($routes as $route => $path) {
    if ($route == getURI()) {
        $result = initController(...getController($path));
        break;
    }
}

if ($result === null) {
    include_once CONTROLLERS.'/ErrorController.php';
}