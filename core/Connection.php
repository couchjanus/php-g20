<?php
/**
 * class Connection
 */
class Connection extends PDO
{
    protected static $instance;
    protected static $config = [];

    protected function __construct($dsn, $dbname, $dbpass, $options) {
        parent::__construct($dsn, $dbname, $dbpass, $options);
    }
    
    /**
     * Private clone method to prevent cloning of the instance of the
     * *Singleton* instance.
     *
     * @return void
     */
    private function __clone()
    {
    }

    public function preparedStatment($query)
    {
        return $this->prepare($query);
    }
    
    /**
     * Get instance of the PDO
     * @return PDO
     */
    public static function connect()
    {
        self::$config = require_once DB_CONFIG_FILE;
        if(!self::$instance){
            $dsn = self::makeDsn(self::$config['db']);
            self::$instance = new Connection($dsn, self::$config['user'], self::$config['password'], self::$config['options']);
        }
        return self::$instance;
    }
    
    private static function makeDsn($config)
    {
        $dsn = $config['driver'] . ':';
        unset($config['driver']);
        foreach ($config as $key => $value) {
                $dsn .= $key . '=' . $value . ';';
        }
        return substr($dsn, 0, -1);
    }
}
