<?php
session_start();

class Keranjang {
    public function __construct() {
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }
    }
    
    public function ambilSemuaBarang() {
        return $_SESSION['cart'] ?? [];
    }
    
    public function tambahBarang($idBarang, $jumlah = 1) {
        $barang = Produk::ambilBerdasarkanId($idBarang);
        if (!$barang) return;
        
        if (isset($_SESSION['cart'][$idBarang])) {
            $_SESSION['cart'][$idBarang]['qty'] += $jumlah;
        } else {
            $_SESSION['cart'][$idBarang] = [
                'id' => $barang['id'],
                'name' => $barang['name'],
                'price' => $barang['price'],
                'qty' => $jumlah
            ];
        }
    }
    
    public function hapusBarang($idBarang) {
        if (isset($_SESSION['cart'][$idBarang])) {
            unset($_SESSION['cart'][$idBarang]);
        }
    }
    
    public function kosongkanKeranjang() {
        $_SESSION['cart'] = [];
    }
    
    public function hitungTotalHarga() {
        $total = 0;
        foreach ($this->ambilSemuaBarang() as $barang) {
            $total += $barang['price'] * $barang['qty'];
        }
        return $total;
    }
}