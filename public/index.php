<?php 
require_once __DIR__ . '/../src/database/db.php';
require_once __DIR__ . '/../src/models/Produk.php';
require_once __DIR__ . '/../src/models/Barang.php';


$page = $_GET['page'] ?? 'utama';
$contentFile = '';
$keranjang = new Keranjang();

// Handle aksi keranjang
if (isset($_GET['aksi'])) {
    switch ($_GET['aksi']) {
       
        case 'tambah':
            if (isset($_GET['id'])) {
                $keranjang->tambahBarang($_GET['id'], 1);
                header("Location: ?page=keranjang");
                exit;
            }
            break;
        case 'hapus':
            if (isset($_GET['id'])) {
                $keranjang->hapusBarang($_GET['id']);
                header("Location: ?page=keranjang");
                exit;
            }
            break;
        case 'kosongkan':
            $keranjang->kosongkanKeranjang();
            header("Location: ?page=keranjang");
            exit;
    }
    switch ($page) {
    case 'produk':
        $daftarProduk = Produk::ambilSemua();
        $contentFile = __DIR__ . '/../src/views/form_product.php';
        break;
    case 'keranjang':
        $contentFile = __DIR__ . '/../src/views/form_Cart.php';
        break;
    case 'checkout':
        if (empty($keranjang->ambilSemuaBarang())) {
            header("Location: ?page=keranjang");
            exit;
        }
        $contentFile = __DIR__ . '/../src/views/form_checkout.php';
        break;
    case 'selesai':
        $keranjang->kosongkanKeranjang();
        $contentFile = __DIR__ . '/../src/views/out/output.php';
        break;
         default:
        $contentFile = __DIR__ . '/../src/views/form_main.php';
    }
}

include __DIR__ . '/../src/views/layout/layout.php';
