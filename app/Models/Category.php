<?php

require_once CORE.'/Model.php';

class Category extends Model
{
    protected static $table = 'categories';
    protected static $primaryKey = 'id';

    public static function getCategories()
    {
        return parent::get(['status'=>1]);
    }

    // public static function getCategories()
    // {
    //     $sql = "SELECT COUNT(*) count_product, category_id, categories.* FROM products INNER JOIN categories 
    //     ON categories.id = products.category_id
    //     WHERE categories.status =1 GROUP BY category_id";
    //     return parent::getWithSql($sql);
    // }

}
