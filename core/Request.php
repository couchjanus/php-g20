<?php

class Request
{
    private $request; // переменная хранящая данные GET и POST
   
    public function __construct() {
        $this->request = $this->cleanInput($_REQUEST);    
    }

    public function __get($name) {
        if (isset($this->request[$name])) return $this->request[$name];
    }
   
    private function cleanInput($data) {
        if (is_array($data)) {
            $cleaned = [];
            foreach ($data as $key => $value) {
                $cleaned[$key] = $this->cleanInput($value);
            }
            return $cleaned;
        }
        return trim(htmlspecialchars($data, ENT_QUOTES));
    }
   
    public function getRequestEntries()
    {
        return $this->request;
    }

    public static function uri()
	{
        return isset($_SERVER['REQUEST_URI'])? trim($_SERVER["REQUEST_URI"], '/'): null;
    }
    public static function method()
    {
        return $_SERVER['REQUEST_METHOD'];
    }
}