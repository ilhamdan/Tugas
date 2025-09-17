<?php
require_once __DIR__ . '/../database/db.php';

class Produk {
    // Ambil semua produk
    public static function ambilSemua() {
        try {
            $stmt = Database::getConnection()->query("SELECT * FROM products");
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return [];
        }
    }
    
    // Ambil produk berdasarkan ID
    public static function ambilBerdasarkanId($id) {
        try {
            $stmt = Database::getConnection()->prepare("SELECT * FROM products WHERE id = ?");
            $stmt->execute([$id]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return null;
        }
    }
}