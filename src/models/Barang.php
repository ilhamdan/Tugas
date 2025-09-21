<?php
session_start();
class Keranjang {
    public function __construct() { $_SESSION['cart'] = $_SESSION['cart'] ?? []; }
    public function ambilSemuaBarang() { return $_SESSION['cart']; }
    public function tambahBarang($idBarang, $jumlah = 1) {
        if ($barang = Produk::ambilBerdasarkanId($idBarang)) {
            $_SESSION['cart'][$idBarang]['qty'] = ($_SESSION['cart'][$idBarang]['qty'] ?? 0) + $jumlah;
            $_SESSION['cart'][$idBarang] += ['id'=>$barang['id'],'name'=>$barang['name'],'price'=>$barang['price']];
        }
    }
    public function hapusBarang($idBarang) { unset($_SESSION['cart'][$idBarang]); }
    public function kosongkanKeranjang() { $_SESSION['cart'] = []; }
    public function hitungTotalHarga() {
        return array_sum(array_map(fn($b)=>$b['price']*$b['qty'],$this->ambilSemuaBarang()));
    }
    /*
    qty = Quantity -> jumlah
    Price = harga
    */

}
