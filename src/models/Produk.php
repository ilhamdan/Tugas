<?php 
require_once __DIR__ . '/../database/db.php';

class Produk { 
    public static function ambilSemua() {
        try { 
               $stmt = Database::BuatKoneksi()->query("SELECT * FROM produk");
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        catch (PDOException $e) {
            return [];
        }
    }

     public static function ambilBerdasarkanId($id) {
        try {
            $stmt = Database::BuatKoneksi()->prepare("SELECT * FROM produk WHERE id = ?");
            $stmt->execute([$id]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return null;
        }
    }
}
