<?php
require_once CORE.'/Model.php';
require_once CORE.'/Connection.php';

class Product extends Model
{
    protected static $table = 'products';
    protected static $primaryKey = 'id';

    public static function getResource() {
        return self::$table;
    }

    public static function getProducts()
    {
        $sql = "SELECT t1.*, t2.picture FROM products t1
                    JOIN (SELECT resource, resource_id, filename picture FROM pictures group by resource_id) as t2
                    ON t2.resource = 'products' 
                    AND t1.id = t2.resource_id
                ";
        return parent::getWithSql($sql);
    }

    public static function getProduct($id)
    {
        $sql = "SELECT t1.*, t2.filename as picture, t2.resource_id  as resource_id FROM products t1 JOIN pictures t2 ON t2.resource = 'products' AND t1.id = t2.resource_id WHERE t1.id = :id";
        return parent::getWithSqlById($sql, $id);
    }

    public static function getProductsByCategory($category_id)
    {
        $sql = "SELECT t1.*, t2.picture FROM products t1
                    JOIN (SELECT resource, resource_id, filename picture FROM pictures group by resource_id) as t2
                    ON t2.resource = 'products' 
                    AND t1.id = t2.resource_id
                    WHERE t1.category_id = $category_id
                ";
        return parent::getWithSql($sql);
    }
}