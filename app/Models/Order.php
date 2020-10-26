<?php
/**
 * Модель для работы с заказами
 */

require_once CORE.'/Model.php';
// namespace App\Models;

// use Core\Model;

class Order extends Model
{
    protected static $table = 'orders';
    protected static $primaryKey = 'id';
    /**
     * Список заказов
     *
     * @return array
     */

    public static function getAll()
    {
        $sql = "SELECT orders.id order_id, orders.user_id, orders.status, orders.order_date, users.name
            FROM orders INNER JOIN users
            ON orders.user_id = users.id
            ORDER BY orders.order_date DESC";
        return parent::getWithSql($sql);
    }

    public static function getOrders()
    {
        $sql = "SELECT *
               FROM orders INNER JOIN users
               ON orders.user_id = users.id
               ORDER BY orders.order_date DESC";
        return parent::getWithSql($sql);
    }


    /**
     * Выбираем заказ по id
     *
     * @param $id
     * @return mixed
     */
    public static function getById($id)
    {
        $sql = "SELECT *
                FROM orders
                INNER JOIN users
                ON orders.user_id = users.id
                WHERE orders.id = :id";

        return parent::getWithSqlById($sql, $id);
    }

    /**
     * Выбираем заказ по его id
     *
     * @param $id
     * @return mixed
     */
    public static function getUserOrderById($id)
    {
        $sql = "SELECT * FROM orders WHERE id = :id";
        return parent::getWithSqlById($sql, $id);
    }

    /**
     * Просмотр истории заказов для пользователя(личный кабинет)
     *
     * @param $id
     * @return array
     */
    public static function getOrdersListByUserId($id)
    {
        $sql = "SELECT id, status, products,
                    DATE_FORMAT(`order_date`, '%d.%m.%Y %H:%i:%s') AS formated_date
                FROM orders WHERE user_id = :id
                ORDER BY id DESC";
        return parent::getSqlById($sql, $id);
    }
}
