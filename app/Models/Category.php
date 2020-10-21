<?php

require_once CORE.'/Model.php';

class Category extends Model
{
    protected static $table = 'categories';
    protected static $primaryKey = 'id';

    // public static function getCategories()
    // {
    //     return parent::get(['status'=>1]);
    // }

    public static function getResource() {
        return self::$table;
    }

    public static function getCategories()
    {
        $sql = "SELECT t1.*, t2.picture FROM categories t1
                    JOIN (SELECT resource, resource_id, filename picture FROM pictures group by resource_id) as t2
                    ON t2.resource = 'categories'
                    AND t1.id = t2.resource_id
                ";
        return parent::getWithSql($sql);
    }

    // public static function getCategories()
    // {
    //     $sql = "SELECT COUNT(*) count_product, category_id, categories.* FROM products INNER JOIN categories 
    //     ON categories.id = products.category_id
    //     WHERE categories.status =1 GROUP BY category_id";
    //     return parent::getWithSql($sql);
    // }

}
