<?php
require_once __DIR__ . '/../database/db.php';

class Produk {
    public static function ambilSemua() {
        try { 
            return Database::getConnection()
                ->query("SELECT * FROM products")
                ->fetchAll(PDO::FETCH_ASSOC); 
        } catch (PDOException $e) { return []; }
    }

    public static function ambilBerdasarkanId($id) {
        try {
            $stmt = Database::getConnection()->prepare("SELECT * FROM products WHERE id=?");
            $stmt->execute([$id]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) { return null; }
    }
}
