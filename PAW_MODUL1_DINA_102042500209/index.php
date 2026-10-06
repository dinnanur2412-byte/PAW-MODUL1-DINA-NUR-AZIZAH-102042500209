<?php
$products = [
    [
        "nama" => "Monitor Gaming Curved 27 Inch",
        "kategori" => "MONITOR",
        "harga" => 2450000,
        "stok" => 5,
        "gambar" => "Monitor Gaming Curved 27 Inch.jpeg" 
    ],
    [
        "nama" => "Laptop Workstation i7",
        "kategori" => "LAPTOP",
        "harga" => 12500000,
        "stok" => 2,
        "gambar" => "Laptop Workstation i7.jpeg"
    ],
    [
        "nama" => "Keyboard Wireless Custom",
        "kategori" => "AKSESORIS",
        "harga" => 850000,
        "stok" => 10,
        "gambar" => "Keyboard Wireless Custom.webp"
    ],
    [
        "nama" => "Mouse Gaming RGB",
        "kategori" => "AKSESORIS",
        "harga" => 450000,
        "stok" => 0, // Stok habis
        "gambar" => "Mouse Gaming RGB.jpg"
    ],
    [
        "nama" => "Headphone Noise Cancelling",
        "kategori" => "AUDIO",
        "harga" => 1750000,
        "stok" => 4,
        "gambar" => "Headphone Noise Cancelling.png" 
    ],
    [
        "nama" => "Webcam 4K Ultra HD",
        "kategori" => "AKSESORIS",
        "harga" => 1350000,
        "stok" => 3,
        "gambar" => "Webcam 4K Ultra HD.webp" 
    ]
];

// Menghitung jumlah seluruh produk secara otomatis
$total_produk = count($products);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cia Store - Katalog Produk Girly</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: #fff0f5; /* Lavender Blush / Soft Pink */
            color: #4a3b32;
        }

        /* Header / Navbar */
        header {
            background: linear-gradient(135deg, #ffb6c1 0%, #ff69b4 100%);
            color: #ffffff;
            padding: 18px 5%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 4px 12px rgba(255, 105, 180, 0.25);
        }

        header .logo {
            font-size: 22px;
            font-weight: 700;
            color: #ffffff;
            letter-spacing: 0.5px;
        }

        header nav a {
            color: #ffffff;
            text-decoration: none;
            margin-left: 20px;
            font-size: 14px;
            font-weight: 500;
            transition: color 0.2s ease;
        }

        header nav a:hover {
            color: #ffe4e1;
        }

        /* Hero Section */
        .hero {
            background: linear-gradient(135deg, #ffc0cb 0%, #ffb6c1 100%);
            color: #ffffff;
            padding: 45px 5%;
            border-radius: 20px;
            margin: 25px 5%;
            text-align: left;
            box-shadow: 0 8px 20px rgba(255, 182, 193, 0.35);
        }

        .hero h1 {
            font-size: 30px;
            margin-bottom: 8px;
        }

        .hero p {
            color: #ffffff;
            margin-bottom: 20px;
            font-size: 14px;
        }

        .hero .btn-hero {
            display: inline-block;
            background-color: #ffffff;
            color: #ff1493;
            padding: 10px 22px;
            border-radius: 25px;
            text-decoration: none;
            font-weight: 600;
            font-size: 13px;
            box-shadow: 0 4px 10px rgba(255, 20, 147, 0.15);
            transition: transform 0.2s ease;
        }

        .hero .btn-hero:hover {
            transform: translateY(-2px);
        }

        /* Catalog Section Header */
        .catalog-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin: 30px 5% 20px 5%;
        }

        .catalog-header h2 {
            font-size: 22px;
            color: #d87093;
        }

        .total-badge {
            background-color: #ffe4e1;
            color: #ff1493;
            padding: 6px 16px;
            border-radius: 20px;
            font-size: 13px;
            font-weight: 600;
            border: 1px solid #ffb6c1;
        }

        /* Responsive Product Grid */
        .product-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 22px;
            padding: 0 5% 40px 5%;
        }

        @media (max-width: 900px) {
            .product-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 600px) {
            .product-grid {
                grid-template-columns: 1fr;
            }
        }

        /* Product Card Styling */
        .product-card {
            background: #ffffff;
            border-radius: 20px;
            padding: 18px;
            box-shadow: 0 6px 18px rgba(255, 182, 193, 0.2);
            border: 1px solid #fff0f5;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            transition: transform 0.25s ease, box-shadow 0.25s ease;
        }

        .product-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 10px 22px rgba(255, 105, 180, 0.25);
        }

        .product-image {
            width: 100%;
            height: 180px;
            object-fit: cover;
            border-radius: 14px;
            margin-bottom: 14px;
        }

        .category-discount {
            font-size: 11px;
            font-weight: 700;
            color: #db7093;
            text-transform: uppercase;
            margin-bottom: 6px;
        }

        .discount-label {
            color: #ffffff;
            background-color: #ff69b4;
            padding: 2px 8px;
            border-radius: 10px;
            margin-left: 4px;
            font-size: 10px;
        }

        .product-title {
            font-size: 16px;
            font-weight: 600;
            margin-bottom: 10px;
            color: #4a3b32;
        }

        .price-section {
            margin-bottom: 14px;
        }

        .original-price {
            text-decoration: line-through;
            color: #b0a8a0;
            font-size: 12px;
        }

        .final-price {
            font-size: 18px;
            font-weight: 700;
            color: #ff1493;
        }

        .stock-status {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 16px;
            font-size: 13px;
            color: #6d5959;
        }

        .badge-tersedia {
            background-color: #e8f5e9;
            color: #2e7d32;
            padding: 3px 10px;
            border-radius: 12px;
            font-size: 11px;
            font-weight: 600;
        }

        .badge-habis {
            background-color: #ffebee;
            color: #c62828;
            padding: 3px 10px;
            border-radius: 12px;
            font-size: 11px;
            font-weight: 600;
        }

        .buy-button {
            width: 100%;
            padding: 11px;
            background: linear-gradient(135deg, #ffb6c1 0%, #ff69b4 100%);
            color: #ffffff;
            border: none;
            border-radius: 20px;
            font-weight: 600;
            font-size: 14px;
            cursor: pointer;
            box-shadow: 0 4px 12px rgba(255, 105, 180, 0.3);
            transition: opacity 0.2s ease, transform 0.1s ease;
        }

        .buy-button:hover {
            opacity: 0.92;
            transform: scale(1.02);
        }
    </style>
</head>
<body>

    <!-- Navbar / Header -->
    <header>
        <div class="logo">Cia Store</div>
        <nav>
            <a href="#">Home</a>
            <a href="#products">Products</a>
            <a href="#">About</a>
        </nav>
    </header>

    <!-- Hero Section -->
    <section class="hero">
        <h1>Simple Tech Store.</h1>
        <p>Temukan berbagai perangkat dan aksesoris teknologi untuk kebutuhanmu.</p>
        <a href="#products" class="btn-hero">Lihat Produk</a>
    </section>

    <!-- Header Katalog (Menampilkan Jumlah Produk) -->
    <section id="products" class="catalog-header">
        <h2>Katalog Produk</h2>
        <span class="total-badge">Total Produk: <?php echo $total_produk; ?></span>
    </section>

    <!-- Grid Produk (Perulangan PHP) -->
    <main class="product-grid">
        <?php foreach ($products as $item): ?>
            <?php
                // Logika Diskon (Aritmatika PHP)
                $harga_normal = $item['harga'];
                $dapat_diskon = false;
                $persentase_diskon = 0;
                $harga_setelah_diskon = $harga_normal;

                if ($harga_normal >= 1000000) {
                    $dapat_diskon = true;
                    $persentase_diskon = 10;
                    $potongan = $harga_normal * ($persentase_diskon / 100);
                    $harga_setelah_diskon = $harga_normal - $potongan;
                }
            ?>

            <article class="product-card">
                <div>
                    <!-- Menampilkan Gambar Produk -->
                    <img src="<?php echo $item['gambar']; ?>" alt="<?php echo $item['nama']; ?>" class="product-image">

                    <!-- Menampilkan Kategori & Badge Diskon -->
                    <div class="category-discount">
                        <?php echo $item['kategori']; ?> 
                        <?php if ($dapat_diskon): ?>
                            <span class="discount-label">DISKON <?php echo $persentase_diskon; ?>%</span>
                        <?php endif; ?>
                    </div>

                    <!-- Nama Produk -->
                    <h3 class="product-title"><?php echo $item['nama']; ?></h3>

                    <!-- Menampilkan Harga Normal & Harga Diskon -->
                    <div class="price-section">
                        <?php if ($dapat_diskon): ?>
                            <div class="original-price">
                                Rp<?php echo number_format($harga_normal, 0, ',', '.'); ?>
                            </div>
                        <?php endif; ?>
                        <div class="final-price">
                            Rp<?php echo number_format($harga_setelah_diskon, 0, ',', '.'); ?>
                        </div>
                    </div>

                    <!-- Menampilkan Stok & Status (Percabangan PHP) -->
                    <div class="stock-status">
                        <span>Stok: <?php echo $item['stok']; ?></span>
                        <?php if ($item['stok'] > 0): ?>
                            <span class="badge-tersedia">Tersedia</span>
                        <?php else: ?>
                            <span class="badge-habis">Stok Habis</span>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Percabangan Tombol Beli -->
                <?php if ($item['stok'] > 0): ?>
                    <button class="buy-button">Beli Sekarang</button>
                <?php endif; ?>
            </article>
        <?php endforeach; ?>
    </main>

</body>
</html>