
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Penanaman Pohon - HijauKita</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #f3f8f2;
            color: #233c2b;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        .navbar {
            background: #176b43;
            color: white;
            padding: 17px 7%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
            flex-wrap: wrap;
            box-shadow: 0 4px 15px #00000012;
        }

        .logo {
            font-size: 24px;
            font-weight: 800;
        }

        .logo span {
            color: #b8f28b;
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 22px;
            flex-wrap: wrap;
        }

        .nav-links a {
            font-size: 14px;
            font-weight: 600;
        }

        .nav-links a:hover {
            color: #c9f8a7;
        }

        .hero {
            padding: 65px 7%;
            background:
                linear-gradient(90deg, rgba(10, 67, 40, .90), rgba(18, 105, 61, .65)),
                url('https://images.unsplash.com/photo-1441974231531-c6227db76b6e?auto=format&fit=crop&w=1800&q=85');
            background-size: cover;
            background-position: center;
            color: white;
        }

        .hero-content {
            max-width: 720px;
        }

        .hero-label {
            display: inline-block;
            padding: 8px 14px;
            background: #ffffff24;
            border: 1px solid #ffffff50;
            border-radius: 30px;
            margin-bottom: 18px;
            font-size: 13px;
        }

        .hero h1 {
            font-size: clamp(32px, 5vw, 52px);
            line-height: 1.15;
            margin-bottom: 18px;
        }

        .hero p {
            max-width: 600px;
            line-height: 1.8;
            color: #e3f4e7;
            font-size: 16px;
        }

        .hero-button {
            display: inline-block;
            margin-top: 25px;
            background: #b8f28b;
            color: #174b2e;
            padding: 13px 22px;
            border-radius: 10px;
            font-weight: bold;
        }

        .hero-button:hover {
            background: white;
        }

        .container {
            width: 86%;
            max-width: 1250px;
            margin: 0 auto;
        }

        .stats {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 18px;
            margin-top: -28px;
            position: relative;
        }

        .stat-card {
            background: white;
            border-radius: 15px;
            padding: 23px;
            box-shadow: 0 8px 25px #1d4c2810;
            border: 1px solid #e3eee2;
        }

        .stat-card .stat-icon {
            font-size: 27px;
            margin-bottom: 9px;
        }

        .stat-card h3 {
            font-size: 22px;
            color: #176b43;
            margin-bottom: 5px;
        }

        .stat-card p {
            color: #718173;
            font-size: 13px;
        }

        .section {
            padding: 65px 0;
        }

        .section-heading {
            display: flex;
            justify-content: space-between;
            align-items: end;
            gap: 20px;
            margin-bottom: 28px;
            flex-wrap: wrap;
        }

        .section-heading h2 {
            font-size: 30px;
            margin-bottom: 9px;
        }

        .section-heading p {
            color: #718173;
            line-height: 1.6;
        }

        .cart-button {
            display: inline-flex;
            gap: 8px;
            align-items: center;
            background: #176b43;
            color: white;
            padding: 12px 17px;
            border-radius: 10px;
            font-weight: bold;
            font-size: 14px;
        }

        .cart-button:hover {
            background: #0d5030;
        }

        .plant-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 24px;
        }

        .plant-card {
            background: white;
            border-radius: 17px;
            overflow: hidden;
            border: 1px solid #e3eee2;
            box-shadow: 0 8px 25px #1d4c280b;
            transition: transform .2s, box-shadow .2s;
        }

        .plant-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 14px 32px #1d4c2818;
        }

        .plant-image-wrap {
            width: 100%;
            height: 220px;
            overflow: hidden;
            background: #e2eee0;
        }

        .plant-image {
            display: block;
            width: 100%;
            height: 220px;
            object-fit: cover;
            transition: transform .3s;
        }

        .plant-card:hover .plant-image {
            transform: scale(1.04);
        }

        .plant-info {
            padding: 21px;
        }

        .plant-category {
            display: inline-block;
            padding: 6px 10px;
            border-radius: 20px;
            background: #e8f7e8;
            color: #287747;
            font-size: 11px;
            font-weight: bold;
            margin-bottom: 12px;
        }

        .plant-info h3 {
            font-size: 20px;
            margin-bottom: 10px;
            text-transform: capitalize;
        }

        .plant-description {
            color: #758175;
            font-size: 13px;
            line-height: 1.7;
            min-height: 44px;
            margin-bottom: 15px;
        }

        .plant-details {
            display: flex;
            justify-content: space-between;
            gap: 10px;
            font-size: 12px;
            color: #718173;
            padding: 12px 0;
            border-top: 1px solid #edf2ec;
            border-bottom: 1px solid #edf2ec;
        }

        .plant-price {
            font-size: 22px;
            font-weight: 800;
            color: #176b43;
            margin: 17px 0;
        }

        .plant-price small {
            font-size: 12px;
            font-weight: normal;
            color: #718173;
        }

        .add-form {
            display: flex;
            gap: 9px;
        }

        .quantity-input {
            width: 65px;
            min-width: 0;
            padding: 11px 8px;
            border: 1px solid #d7e4d5;
            border-radius: 9px;
            font-size: 14px;
        }

        .add-button {
            flex: 1;
            border: none;
            border-radius: 9px;
            background: #176b43;
            color: white;
            padding: 12px 8px;
            font-size: 13px;
            font-weight: bold;
            cursor: pointer;
        }

        .add-button:hover {
            background: #0d5030;
        }

        .empty-state {
            background: white;
            padding: 45px 20px;
            text-align: center;
            border-radius: 15px;
            border: 1px solid #e3eee2;
        }

        .empty-state h3 {
            margin-bottom: 10px;
        }

        .empty-state p {
            color: #718173;
            line-height: 1.7;
        }

        .benefits {
            background: #e7f3e4;
            padding: 45px 0;
        }

        .benefit-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 25px;
        }

        .benefit {
            padding: 15px;
        }

        .benefit .icon {
            font-size: 30px;
            margin-bottom: 12px;
        }

        .benefit h3 {
            margin-bottom: 8px;
            font-size: 17px;
        }

        .benefit p {
            font-size: 13px;
            color: #627563;
            line-height: 1.7;
        }

        .footer {
            background: #123e29;
            color: white;
            text-align: center;
            padding: 28px 7%;
            font-size: 13px;
            line-height: 1.8;
        }

        .footer span {
            color: #b8f28b;
        }

        @media (max-width: 900px) {
            .plant-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            .navbar {
                padding: 17px 5%;
            }

            .container {
                width: 90%;
            }
        }

        @media (max-width: 600px) {
            .nav-links {
                gap: 13px;
            }

            .nav-links a {
                font-size: 12px;
            }

            .hero {
                padding: 48px 5%;
            }

            .stats {
                grid-template-columns: 1fr;
                margin-top: 20px;
            }

            .plant-grid,
            .benefit-grid {
                grid-template-columns: 1fr;
            }

            .section {
                padding: 45px 0;
            }

            .section-heading h2 {
                font-size: 25px;
            }
        }
    </style>
</head>

<body>

    <nav class="navbar">
        <a href="{{ url('/') }}" class="logo">
            🌱 Hijau<span>Kita</span>
        </a>

        <div class="nav-links">
            <a href="{{ url('/') }}">Beranda</a>
            <a href="{{ route('penanaman-pohon.index') }}">Bibit Pohon</a>
            <a href="{{ route('penanaman-pohon.cart') }}">
                🛒 Keranjang ({{ $cartCount ?? 0 }})
            </a>
        </div>
    </nav>

    <header class="hero">
        <div class="hero-content">
            <span class="hero-label">🌿 Satu Bibit, Sejuta Harapan</span>

            <h1>Mulai Penghijauan dari Bibit Pilihan</h1>

            <p>
                Pilih bibit pohon terbaik untuk lingkungan yang lebih hijau.
                Bersama HijauKita, mari tumbuhkan masa depan yang lebih sehat
                dan berkelanjutan.
            </p>

            <a href="#katalog" class="hero-button">
                Jelajahi Bibit →
            </a>
        </div>
    </header>

    <main>
        <section class="container">
            <div class="stats">
                <div class="stat-card">
                    <div class="stat-icon">🌳</div>
                    <h3>{{ isset($bibit) ? $bibit->count() : 0 }}</h3>
                    <p>Pilihan bibit tersedia</p>
                </div>

                <div class="stat-card">
                    <div class="stat-icon">🛒</div>
                    <h3>{{ $cartCount ?? 0 }}</h3>
                    <p>Jumlah bibit di keranjang</p>
                </div>

                <div class="stat-card">
                    <div class="stat-icon">💚</div>
                    <h3>Hijau</h3>
                    <p>Langkah kecil untuk bumi</p>
                </div>
            </div>
        </section>

        <section class="section" id="katalog">
            <div class="container">
                <div class="section-heading">
                    <div>
                        <h2>Katalog Bibit Pohon 🌱</h2>
                        <p>Pilih bibit sesuai kebutuhan penghijauanmu.</p>
                    </div>

                    <a href="{{ route('penanaman-pohon.cart') }}"
                       class="cart-button">
                        🛒 Lihat Keranjang ({{ $cartCount ?? 0 }})
                    </a>
                </div>

                @if(isset($bibit) && $bibit->count() > 0)
                    <div class="plant-grid">
                        @foreach($bibit as $item)
                            @php
                                $nama = strtolower($item->nama ?? '');

                                if (str_contains($nama, 'mangga')) {
                                    $foto = 'https://images.unsplash.com/photo-1553279768-865429fa0078?auto=format&fit=crop&w=800&q=85';
                                } elseif (str_contains($nama, 'alpukat')) {
                                    $foto = 'https://images.unsplash.com/photo-1523049673857-eb18f1d7b578?auto=format&fit=crop&w=800&q=85';
                                } elseif (str_contains($nama, 'jeruk')) {
                                    $foto = 'https://images.unsplash.com/photo-1547514701-42782101795e?auto=format&fit=crop&w=800&q=85';
                                } elseif (str_contains($nama, 'kelapa')) {
                                    $foto = 'https://images.unsplash.com/photo-1518509562904-e7ef99cdcc86?auto=format&fit=crop&w=800&q=85';
                                } elseif (str_contains($nama, 'jambu')) {
                                    $foto = 'https://images.unsplash.com/photo-1536511132770-e5058c7e8c46?auto=format&fit=crop&w=800&q=85';
                                } elseif (str_contains($nama, 'durian')) {
                                    $foto = 'https://images.unsplash.com/photo-1591073113125-e46713c829ed?auto=format&fit=crop&w=800&q=85';
                                } else {
                                    $foto = 'https://images.unsplash.com/photo-1441974231531-c6227db76b6e?auto=format&fit=crop&w=800&q=85';
                                }

                                $harga = (float) ($item->harga ?? 0);
                                $stok = (int) ($item->stok ?? 0);
                            @endphp

                            <article class="plant-card">
                                <div class="plant-image-wrap">
                                    <img
                                        src="{{ $foto }}"
                                        alt="Bibit {{ $item->nama }}"
                                        class="plant-image"
                                        loading="eager"
                                        onerror="this.onerror=null;this.src='https://placehold.co/600x400/198754/ffffff?text=HijauKita';"
                                    >
                                </div>

                                <div class="plant-info">
                                    <span class="plant-category">
                                        🌿 Bibit Pohon
                                    </span>

                                    <h3>{{ $item->nama }}</h3>

                                    <p class="plant-description">
                                        Bibit {{ $item->nama }} untuk mendukung
                                        penghijauan dan lingkungan yang lebih asri.
                                    </p>

                                    <div class="plant-details">
                                        <span>📦 Stok: {{ $stok }}</span>
                                        <span>🌱 Siap ditanam</span>
                                    </div>

                                    <div class="plant-price">
                                        Rp{{ number_format($harga, 0, ',', '.') }}
                                        <small>/ bibit</small>
                                    </div>

                                    @if($stok > 0)
                                        <form
                                            action="{{ route('penanaman-pohon.cart.add', $item->id) }}"
                                            method="POST"
                                            class="add-form"
                                        >
                                            @csrf

                                            <input
                                                type="number"
                                                name="jumlah"
                                                class="quantity-input"
                                                value="1"
                                                min="1"
                                                max="{{ $stok }}"
                                                required
                                                aria-label="Jumlah bibit"
                                            >

                                            <button type="submit" class="add-button">
                                                🛒 Tambah ke Keranjang
                                            </button>
                                        </form>
                                    @else
                                        <button
                                            type="button"
                                            class="add-button"
                                            disabled
                                            style="width:100%; opacity:.6; cursor:not-allowed;"
                                        >
                                            Stok Habis
                                        </button>
                                    @endif
                                </div>
                            </article>
                        @endforeach
                    </div>
                @else
                    <div class="empty-state">
                        <h3>🌱 Bibit Belum Tersedia</h3>
                        <p>
                            Saat ini belum ada bibit yang tersedia untuk dibeli.
                            Silakan periksa kembali nanti.
                        </p>
                    </div>
                @endif
            </div>
        </section>

        <section class="benefits">
            <div class="container">
                <div class="section-heading">
                    <div>
                        <h2>Mengapa HijauKita?</h2>
                        <p>Mulai perubahan baik dari langkah sederhana.</p>
                    </div>
                </div>

                <div class="benefit-grid">
                    <div class="benefit">
                        <div class="icon">🌱</div>
                        <h3>Pilihan Bibit</h3>
                        <p>
                            Temukan pilihan bibit untuk mendukung kegiatan
                            penghijauan di lingkunganmu.
                        </p>
                    </div>

                    <div class="benefit">
                        <div class="icon">🌍</div>
                        <h3>Peduli Lingkungan</h3>
                        <p>
                            Setiap pohon yang ditanam menjadi langkah kecil
                            untuk bumi yang lebih hijau.
                        </p>
                    </div>

                    <div class="benefit">
                        <div class="icon">💚</div>
                        <h3>Mudah dan Praktis</h3>
                        <p>
                            Pilih bibit, tentukan jumlah, lalu tambahkan
                            ke keranjang belanja.
                        </p>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer class="footer">
        <p>
            © {{ date('Y') }} <span>HijauKita</span> —
            Bersama Menanam, Bersama Menjaga Bumi 🌳
        </p>
    </footer>

</body>
</html>
