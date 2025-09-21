<div class="mb-6">
    <h1 class="text-2xl font-bold"><i class="bi bi-bag"></i> Daftar Produk</h1>
</div>
<div class="grid grid-cols-1 md:grid-cols-3 gap-4">
    <?php foreach ($products as $product): ?>
    <div class="bg-white rounded-lg shadow p-4">
        <div class="text-center mb-3">
            <i class="bi bi-box text-5xl text-gray-300"></i>
        </div>
        <h3 class="font-bold mb-1"><?= htmlspecialchars($product['name']) ?></h3>
        <p class="text-sm text-gray-600 mb-2"><?= htmlspecialchars($product['description']) ?></p>
        <div class="flex justify-between items-center">
            <span class="text-blue-600 font-bold">
                Rp <?= number_format($product['price'], 0, ',', '.') ?>
            </span>
        </div>
        <!-- Form tambah dengan qty -->
        <form method="get" class="mt-3 flex items-center gap-2">
            <input type="hidden" name="aksi" value="tambah">
            <input type="hidden" name="id" value="<?= $product['id'] ?>">
            <input type="number" name="qty" value="1" min="1" 
                   class="w-16 border rounded px-2 py-1 text-center">
            <button type="submit" 
                    class="flex-1 bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600 text-sm">
                <i class="bi bi-cart-plus"></i> Tambah
            </button>
        </form>
    </div>
    <?php endforeach; ?>
</div>
