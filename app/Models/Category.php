<?php

require_once CORE.'/Model.php';

class Category extends Model
{
    protected static $table = 'categories';
    protected static $primaryKey = 'id';

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

}
