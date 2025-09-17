<?php
class Database {
    private static $pdo = null;
    
    public static function getConnection() {
        if (!self::$pdo) {
            try {
                self::$pdo = new PDO('mysql:host=localhost', 'root', '');
                self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
                // Buat database jika belum ada
                self::$pdo->exec("CREATE DATABASE IF NOT EXISTS ecommerce");
                self::$pdo->exec("USE ecommerce");
                
                // Buat tabel produk
                self::$pdo->exec("CREATE TABLE IF NOT EXISTS products (
                    id INT AUTO_INCREMENT PRIMARY KEY,
                    name VARCHAR(100) NOT NULL,
                    description TEXT,
                    price DECIMAL(10,2) NOT NULL
                )");
                
                // Tambah data contoh jika tabel kosong
                $stmt = self::$pdo->query("SELECT COUNT(*) FROM products");
                if ($stmt->fetchColumn() == 0) {
                    self::$pdo->exec("INSERT INTO products (name, description, price) VALUES
                        ('Laptop Gaming', 'Laptop high performance', 15000000),
                        ('Mouse Wireless', 'Mouse ergonomis', 250000),
                        ('Keyboard Mechanical', 'Keyboard with mechanical switch', 800000)");
                }
                
            } catch (PDOException $e) {
                die("Error: " . $e->getMessage());
            }
        }
        return self::$pdo;
    }
}