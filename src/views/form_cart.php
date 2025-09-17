<div class="mb-6">
    <h1 class="text-2xl font-bold"><i class="bi bi-cart"></i> Keranjang Belanja</h1>
</div>
<div class="bg-white rounded-lg shadow p-6">
    <?php $items = $keranjang->ambilSemuaBarang(); ?>
    
    <?php if (!empty($items)): ?>
    <div class="space-y-3">
        <?php foreach ($items as $id => $item): ?>
        <div class="flex justify-between items-center py-2 border-b">
            <div class="flex-1">
                <div class="font-medium"><?= htmlspecialchars($item['name']) ?></div>
                <div class="text-sm text-gray-500"><?= $item['qty'] ?> x Rp <?= number_format($item['price'], 0, ',', '.') ?></div>
            </div>
            <div class="flex items-center gap-3">
                <span class="font-medium">Rp <?= number_format($item['price'] * $item['qty'], 0, ',', '.') ?></span>
                <a href="?aksi=hapus&id=<?= $id ?>" class="text-red-500 hover:text-red-700">
                    <i class="bi bi-trash"></i>
                </a>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
    <?php else: ?>
    <div class="text-center py-8">
        <i class="bi bi-cart-x text-4xl text-gray-400 mb-3"></i>
        <p class="text-gray-500">Keranjang belanja kosong</p>
    </div>
    <?php endif; ?>
    
    <div class="flex justify-between items-center font-bold text-lg mt-4 pt-4 border-t">
        <span>Total:</span>
        <span>Rp <?= number_format($keranjang->hitungTotalHarga(), 0, ',', '.') ?></span>
    </div>
    
    <div class="mt-6 flex gap-3">
        <?php if (!empty($items)): ?>
        <a href="?page=checkout" class="flex-1 bg-blue-600 text-white py-2 rounded text-center hover:bg-blue-700">
            <i class="bi bi-credit-card"></i> Checkout
        </a>
        <a href="?aksi=kosongkan" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">
            <i class="bi bi-trash"></i> Hapus Semua
        </a>
        <?php endif; ?>
        <a href="?page=products" class="flex-1 bg-gray-500 text-white py-2 rounded text-center hover:bg-gray-700">
            <i class="bi bi-arrow-left"></i> Lanjut Belanja
        </a>
    </div>
</div>