<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toko Online</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
</head>
<body class="bg-gray-100">
    <nav class="bg-blue-600 text-white p-4">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-xl font-bold"><i class="bi bi-shop"></i> TokoKu</h1>
            <div class="space-x-4">
                <a href="?page=main" class="hover:text-blue-200"><i class="bi bi-house"></i> Beranda</a>
                <a href="?page=products" class="hover:text-blue-200"><i class="bi bi-bag"></i> Produk</a>
                <a href="?page=cart" class="hover:text-blue-200"><i class="bi bi-cart"></i> Keranjang</a>
            </div>
        </div>
    </nav>
    <main class="container mx-auto p-4">
        <?php include $contentFile; ?>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>