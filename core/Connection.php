<?php
/**
 * class Connection
 */
class Connection
{
    const ERROR_UNABLE = 'ERROR: no database connection';
    public $pdo;

    public function __construct(array $config, $options = [])
    {
        if (!isset($config['db']['driver'])) {
            $message = __METHOD__ . ' : ' 
            . self::ERROR_UNABLE . PHP_EOL;
            throw new Exception($message);
        }
        $dsn = $this->makeDsn($config['db']);
        $options = array_replace($config['options'], $options);
        try {
            $this->pdo = new PDO(
                $dsn, 
                $config['user'], 
                $config['password'],
                $options
            );
        } catch (PDOException $e) {
            throw new PDOException($e->getMessage(), (int)$e->getCode());
        }
    }
    
    public static function makeDsn($config)
    {
        $dsn = $config['driver'] . ':';
        unset($config['driver']);
        
        foreach ($config as $key => $value) {
                $dsn .= $key . '=' . $value . ';';
        }
        return substr($dsn, 0, -1);
    }
}
