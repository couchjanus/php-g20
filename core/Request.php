<?php

class Request
{
    private $request; // переменная хранящая данные GET и POST
   
    // при создании объекта запроса мы пропускаем все данные
    // через фильтр-функцию для очистки параметров от нежелательных данных
    
    public function __construct() {
        $this->request = $_REQUEST;
        // clear data from dangerous characters
        // $this->request = $this->cleanInput($_REQUEST);
    
    }

    // магическая функция, которая позволяет обращатья к GET и POST переменным
    // по имени, например, echo $request->id
    public function __get($name) {
        if (isset($this->request[$name])) return $this->request[$name];
    }
   
    // очистка данных от опасных символов
    // clearing data from dangerous characters
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
   
    // return the request content
    public function getRequestEntries()
    {
        return $this->request;
    }
}