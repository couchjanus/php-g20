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
        $stmt->bindParam(1, $name);
        $stmt->bindParam(2, $status);
        $stmt->execute();
        return $connection->pdo->lastInsertId();
    }

    public function getByPrimaryKey($id) {
        $connection = new Connection(require_once DB_CONFIG_FILE);
        $stmt = $connection->pdo->prepare("SELECT * FROM categories WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public function destroy($id){
        $connection = new Connection(require_once DB_CONFIG_FILE);
        $stmt = $connection->pdo->prepare("DELETE FROM categories WHERE id = ? LIMIT 1");
        $stmt->execute([$id]);
    }
    
    public function update($id, $name, $status){
        $connection = new Connection(require_once DB_CONFIG_FILE);
        $stmt = $connection->pdo->prepare("UPDATE categories SET name = ?, status = ? WHERE id = ?");
        $stmt->execute([$name, $status, $id]);
    }

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
