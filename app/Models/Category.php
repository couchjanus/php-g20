<?php

require_once CORE.'/Connection.php';

class Category
{
    public function all() {
        $connection = new Connection(require_once DB_CONFIG_FILE);
        $stmt = $connection->pdo->query("SELECT * FROM categories ORDER BY id ASC");
        $categories = $stmt->fetchAll();
        return $categories;
    }

    public function save($name, $status){
        $connection = new Connection(require_once DB_CONFIG_FILE);
        $stmt = $connection->pdo->prepare("INSERT INTO categories (name, status) VALUES (?, ?)");
        $sql = "INSERT INTO categories (name, status) VALUES (?, ?)";
        $stmt->bindParam(1, $name);
        $stmt->bindParam(2, $status);
        $stmt->execute();
        return $connection->pdo->lastInsertId();
    }

    /**
     * Возвращает Список категорий, 
     * у которых статус отображения = 1  
     */

    public static function getCategories()
    {
        $connection = new Connection(require_once DB_CONFIG_FILE);
        $stmt = $connection->pdo->query(
            "SELECT id, name FROM categories
            WHERE status = 1
            ORDER BY name ASC"
        );
        $categories = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $categories;
    }
}
