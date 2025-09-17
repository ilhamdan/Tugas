<?php
session_start();

class Keranjang {
    public function __construct() {
        if (!isset($_SESSION['keranjang'])) {
            $_SESSION['keranjang'] = [];
        }
    }
    
    public function ambilSemuaBarang() {
        return $_SESSION['keranjang'] ?? [];
    }
    
    public function tambahBarang($idBarang, $jumlah = 1) {
        $barang = Produk::ambilBerdasarkanId($idBarang);
        if (!$barang) return;
        
        if (isset($_SESSION['keranjang'][$idBarang])) {
            $_SESSION['keranjang'][$idBarang]['jumlah'] += $jumlah;
        } else {
            $_SESSION['keranjang'][$idBarang] = [
                'id' => $barang['id'],
                'nama' => $barang['nama'],
                'harga' => $barang['harga'],
                'jumlah' => $jumlah
            ];
        }
    }
    
    public function hapusBarang($idBarang) {
        if (isset($_SESSION['keranjang'][$idBarang])) {
            unset($_SESSION['keranjang'][$idBarang]);
        }
    }
    
    public function kosongkanKeranjang() {
        $_SESSION['keranjang'] = [];
    }
    
    public function hitungTotalHarga() {
        $total = 0;
        foreach ($this->ambilSemuaBarang() as $barang) {
            $total += $barang['harga'] * $barang['jumlah'];
        }
        return $total;
    }
}