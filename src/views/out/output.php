<div class="bg-white rounded-lg shadow-md p-8 max-w-2xl mx-auto text-center">
    <i class="bi bi-check-circle text-6xl text-green-500 mb-4"></i>
    <h2 class="text-2xl font-bold mb-4">Pesanan Berhasil!</h2>
    <p class="mb-6">Terima kasih telah berbelanja di toko kami. Pesanan Anda akan segera diproses.</p>
    <div class="bg-gray-50 p-4 rounded-lg mb-6">
        <p class="font-semibold">Kode Pesanan: <span class="text-blue-600">#ORD-12345</span></p>
        <p>Total Pembayaran: <span class="text-blue-600">Rp <?= number_format($keranjang->hitungTotalHarga(), 0, ',', '.') ?></span></p>
    </div>
    <a href="?page=utama" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700">
        <i class="bi bi-house"></i> Kembali ke Beranda
    </a>
</div>