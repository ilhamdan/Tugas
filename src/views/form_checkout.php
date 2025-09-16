<div class="mb-6">
    <h1 class="text-2xl font-bold"><i class="bi bi-credit-card"></i> Checkout</h1>
</div>
<div class="bg-white rounded-lg shadow-md p-6">
    <div class="mb-6">
        <h2 class="text-lg font-semibold mb-3">Ringkasan Pesanan</h2>
        <?php foreach ($cart->getItems() as $item): ?>
        <div class="flex justify-between py-1">
            <span><?= htmlspecialchars($item['name']) ?> (<?= $item['qty'] ?>x)</span>
            <span>Rp <?= number_format($item['price'] * $item['qty'], 0, ',', '.') ?></span>
        </div>
        <?php endforeach; ?>
        <div class="flex justify-between font-bold text-lg mt-3 pt-3 border-t">
            <span>Total:</span>
            <span>Rp <?= number_format($cart->getTotal(), 0, ',', '.') ?></span>
        </div>
    </div>
    
    <form method="post" action="?page=out">
        <div class="mb-4">
            <label class="block text-gray-700 mb-2">Nama Lengkap</label>
            <input type="text" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 mb-2">Alamat Pengiriman</label>
            <textarea class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" rows="3" required></textarea>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 mb-2">Metode Pembayaran</label>
            <select class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                <option>Transfer Bank</option>
                <option>COD</option>
                <option>E-Wallet</option>
            </select>
        </div>
        <button type="submit" class="w-full bg-green-600 text-white py-3 rounded-lg hover:bg-green-700">
            <i class="bi bi-check-circle"></i> Konfirmasi Pesanan
        </button>
    </form>
</div>