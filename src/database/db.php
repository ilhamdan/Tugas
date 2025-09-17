<?php

class Database {
    private static $pdo = null;

    public static function BuatKoneksi() {
         if (!self::$pdo) {
            try { 
                 // Koneksi ke MySQL
                self::$pdo = new PDO('mysql:host=localhost', 'root', '');

                  // Buat database 
                self::$pdo->exec("CREATE DATABASE IF NOT EXISTS ecommerce");

                self::$pdo->exec("USE ecommerce");

                 // Buat tabel produk
                self::$pdo->exec("CREATE TABLE IF NOT EXISTS produk (
                    id INT AUTO_INCREMENT PRIMARY KEY,
                    nama VARCHAR(100) NOT NULL,
                    deskripsi TEXT,
                    harga DECIMAL(10,2) NOT NULL
                )");

                            // Tambah data 
                $stmt = self::$pdo->query("SELECT COUNT(*) FROM produk");
                if ($stmt->fetchColumn() == 0) {
                    self::$pdo->exec("INSERT INTO produk (nama, deskripsi, harga) VALUES
                        ('Laptop Gaming', 'Laptop high performance', 15000000),
                        ('Mouse Wireless', 'Mouse ergonomis', 250000)");
                        }
            }
            catch (PDOException $e){
                die("Error: " . $e->getMessage());
            }
         }
                 return self::$pdo;
    }
}
