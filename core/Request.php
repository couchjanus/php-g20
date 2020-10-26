<?php
// namespace core;
class Request
{
    private $request; // переменная хранящая данные GET, POST и FILES
   
    public function __construct() {
        $this->request = $this->mergeData($_REQUEST, $_FILES);   
    }

    public function __get($name) {
        return array_key_exists($name, $this->request)? $this->request[$name]: null;
    }

    /**
     * merge post and files data
     * You shouldn't have two fields with the same 'name' attribute in $_POST & $_FILES
     *
     * @param  array $post
     * @param  array $files
     * @return array the merged array
     */
    private function mergeData(array $post, array $files){
        $post = $this->cleanInput($post);
        return array_merge($files, $post);
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