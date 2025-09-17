<div class="mb-6">
    <h1 class="text-2xl font-bold"><i class="bi bi-bag"></i> Daftar Produk</h1>
</div>
<div class="grid grid-cols-1 md:grid-cols-3 gap-4">
    <?php foreach ($daftarProduk as $produk): ?>
    <div class="bg-white rounded-lg shadow p-4">
        <div class="text-center mb-3">
            <i class="bi bi-box text-5xl text-gray-300"></i>
        </div>
        <h3 class="font-bold mb-1"><?= htmlspecialchars($produk['nama']) ?></h3>
        <p class="text-sm text-gray-600 mb-2"><?= htmlspecialchars($produk['deskripsi']) ?></p>
        <div class="flex justify-between items-center">
            <span class="text-blue-600 font-bold">Rp <?= number_format($produk['harga'], 0, ',', '.') ?></span>
            <a href="?aksi=tambah&id=<?= $produk['id'] ?>" 
               class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600 text-sm">
                <i class="bi bi-cart-plus"></i> Tambah
            </a>
        </div>
    </div>
    <?php endforeach; ?>
</div>