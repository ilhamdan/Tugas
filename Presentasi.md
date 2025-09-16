
## Alur Aplikasi
1. **Entry Point**: `public/index.php` adalah titik masuk utama aplikasi
2. **Routing**: Berdasarkan parameter `?page=`, aplikasi akan menampilkan halaman yang sesuai
3. **Layout**: Semua halaman menggunakan template yang sama di `layout/layout.php`

**Alur Interaksi Pengguna** 

    1. Melihat Produk

                    User akses ?page=products
                                ⬇️
                    Product::getAll() ambil data dari database
                                ⬇️     
                    Tampilkan produk di form_products.php

    2. Menambah ke Keranjang
                    User klik "Tambah" pada produk
                                 ⬇️
                    Request ke ?action=add&id=X
                                 ⬇️
                    Cart::add() tambahkan ke session
                                 ⬇️
                    Redirect ke ?page=cart

    3. Mengelola keranjang
                    User di halaman keranjang (?page=cart)
                                  ⬇️ 
                    Cart::getItems() tampilkan semua item
                                  ⬇️      
                    User bisa:
                    - Hapus item (?action=remove&id=X)
                    - Update quantity (?action=update)
                    - Hapus semua (?action=clear)
                    - Lanjut ke checkout (?page=checkout)


    4. Proses Checkout
                    User klik "Checkout" dari keranjang
                                     ⬇️       
                    Validasi: jika keranjang kosong → redirect ke cart
                                     ⬇️           
                    Tampilkan form checkout di form_checkout.php
                                      ⬇️  
                    User submit form → redirect ke ?page=out
                                      ⬇️      
                    Cart::clear() kosongkan keranjang
                                     ⬇️       
                    Tampilkan halaman konfirmasi

 **State Management**

                        session_start();
                        $_SESSION['cart'] = [];

                        // Struktur data session cart
                        $_SESSION['cart'] = [
                            'product_id_1' => [
                                'id' => 1,
                                'name' => 'Laptop Gaming',
                                'price' => 15000000,
                                'qty' => 1
                            ],
                            'product_id_2' => [
                                'id' => 2,
                                'name' => 'Mouse Wireless',
                                'price' => 250000,
                                'qty' => 2
                            ]
                        ];

                        // Perhitungan total
                        $total = 0;
                        foreach ($_SESSION['cart'] as $item) {
                            $total += $item['price'] * $item['qty'];
                        }



## Keamanan
- **SQL Injection**: Menggunakan prepared statement di `Product.php`

                        // Menggunakan prepared statement
                $stmt = Database::getConnection()->prepare
                ("SELECT * FROM products WHERE id = ?");
                $stmt->execute([$id]);

- **XSS**: Menggunakan `htmlspecialchars()` untuk output data

                    // Escape output data
                    htmlspecialchars($item['name'])

- **CSRF**: Protection( basic)

                header("Location: ?page=cart");
                exit;

- **Session**: Menggunakan session untuk keranjang, aman karena diserver

## Teknologi yang Digunakan
- **Backend**: PHP (Native)
- **Frontend**: HTML,Tailwind CSS, Bootstrap Icons
- **Database**: MySQL dengan PDO
- **Pattern**: MVC sederhana (Model-View-Controller)

## Kesimpulan
Proyek ini adalah e-commerce sederhana dengan fitur:
- Manajemen produk (CRUD dasar)
- Keranjang belanja dengan session
- Checkout sederhana
- Desain responsif menggunakan Tailwind CSS dan Bootstrap
