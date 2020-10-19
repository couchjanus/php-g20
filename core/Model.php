<?php
require_once CORE.'/Connection.php';

class Model
{
    protected static $table = '';
    protected static $primaryKey = '';

    public static function all(){
        $pdo = Connection::connect();
        $statment = $pdo->preparedStatment("select * from ". static::$table);
        $statment->execute();
        return $statment->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     * Get an item by the primarykey
     */
    public static function getByPrimaryKey($value){
        $pdo = Connection::connect();
        $statment = $pdo->preparedStatment("SELECT * FROM " . static::$table." WHERE ". static::$primaryKey . "=". $value);
        $statment->execute();
        return $statment->fetch(PDO::FETCH_OBJ);
    }

    /**
     * Delete this item data from database
     */
    public static function destroy($id){
        $pdo = Connection::connect();
        $statment = $pdo->preparedStatment("DELETE FROM " . static::$table . " WHERE ".static::$primaryKey."=? LIMIT 1");
        $statment->execute([$id]);
    }

    public static function insert($parameters){
        $pdo = Connection::connect();
        $sql = sprintf(
            'insert into %s (%s) values (%s)',
            static::$table,
            implode(', ', array_keys($parameters)),
            ':' . implode(', :', array_keys($parameters))
        );
        try{
            $statment = $pdo->preparedStatment($sql);
            $statment->execute($parameters);
        }catch(Execption $e){
            die('Whooops, something went wrong');
        }
    }

    public static function update($id, $parameters){
        $keys = array();
        foreach ($parameters as $key => $value) {
            array_push($keys, $key."='".$value."'");
        }
        $query = sprintf(
            'UPDATE %s SET %s WHERE %s = %s',
            static::$table,
            implode(",", $keys), static::$primaryKey, $id
        );
        $pdo = Connection::connect();
        try{
            $statment = $pdo->preparedStatment($query);
            $statment->execute();
        }catch(Execption $e){
            die('Whooops, something went wrong');
        }
    }

    /**
     * Get items by condition
     */
    protected static function get($condition=array()){
        $query = "SELECT * FROM " . static::$table;
        if(!empty($condition)){
            $query .= " WHERE ";
            foreach ($condition as $key => $value) {
                $query .= $key . "=:".$key." AND ";
            }
        }
        $query = rtrim($query,' AND ');
        $pdo = Connection::connect();
        $statment = $pdo->preparedStatment($query);
        foreach ($condition as $key => $value) {
            $condition[':'.$key] = $value;
            unset($condition[$key]);
        }
        $statment->execute($condition);
        return $statment->fetchAll(PDO::FETCH_OBJ);
    }

    public static function getWithSql($sql){
        $pdo = Connection::connect();
        $statment = $pdo->preparedStatment($sql);
        $statment->execute();
        return $statment->fetchAll(PDO::FETCH_OBJ);
    }

    public static function getWithSqlById($sql, $id){
        $pdo = Connection::connect();
        $statment = $pdo->preparedStatment($sql);
        $statment->bindParam(':id', $id);
        $statment->execute();
        return $statment->fetch(PDO::FETCH_OBJ);
    }

    public static function lastId() 
    {
        $query = "SELECT id FROM " . static::$table . " ORDER BY id DESC LIMIT 1";
        $pdo = Connection::connect();
        $statment = $pdo->preparedStatment($query);
        $statment->execute();
        return $statment->fetch(PDO::FETCH_ASSOC)['id'];
    }
}