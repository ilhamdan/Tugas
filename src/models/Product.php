<?php
require_once __DIR__ . '/../database/db.php';

class Product {
    public static function getAll() {
        try {
            $stmt = Database::getConnection()->query("SELECT * FROM products");
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return [];
        }
    }
    
    public static function getById($id) {
        try {
            $stmt = Database::getConnection()->prepare("SELECT * FROM products WHERE id = ?");
            $stmt->execute([$id]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return null;
        }
    }
}