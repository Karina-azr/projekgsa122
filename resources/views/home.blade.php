
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HijauKita - Beranda</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Segoe UI", sans-serif;
        }

        html { scroll-behavior: smooth; }

        body {
            background: #f4f8f2;
            color: #294b36;
        }

        .navbar {
            position: sticky;
            top: 0;
            z-index: 100;
            width: 100%;
            background: rgba(247, 251, 245, 0.96);
            backdrop-filter: blur(15px);
            border-bottom: 1px solid #dce8d9;
            padding: 17px 7%;
        }

        .nav-inner {
            max-width: 1180px;
            margin: auto;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .logo {
            width: 43px;
            height: 43px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 13px;
            background: #dcebd7;
            color: #28563b;
            font-weight: 700;
            font-size: 18px;
        }

        .brand-name {
            color: #28563b;
            font-size: 16px;
            font-weight: 700;
            letter-spacing: 1.5px;
        }

        .nav-link {
            color: #477754;
            text-decoration: none;
            font-size: 13px;
            font-weight: 600;
        }

        .hero {
            min-height: 570px;
            display: flex;
            align-items: center;
            background:
                linear-gradient(
                    rgba(20, 60, 38, 0.70),
                    rgba(15, 52, 34, 0.82)
                ),
                url("https://images.unsplash.com/photo-1448375240586-882707db888b?auto=format&fit=crop&w=1920&q=85")
                center/cover no-repeat;
            padding: 70px 7%;
        }

        .hero-content {
            width: 100%;
            max-width: 1180px;
            margin: auto;
            color: white;
        }

        .hero-badge {
            display: inline-block;
            padding: 8px 14px;
            margin-bottom: 20px;
            border-radius: 30px;
            background: rgba(220, 235, 215, 0.16);
            border: 1px solid rgba(255,255,255,0.25);
            font-size: 12px;
            font-weight: 600;
        }

        .hero h1 {
            max-width: 720px;
            font-size: 48px;
            line-height: 1.15;
            margin-bottom: 20px;
        }

        .hero p {
            max-width: 650px;
            color: rgba(255,255,255,0.84);
            font-size: 16px;
            line-height: 1.8;
            margin-bottom: 30px;
        }

        .hero-button {
            display: inline-block;
            padding: 14px 23px;
            border-radius: 13px;
            background: #76a87d;
            color: white;
            text-decoration: none;
            font-size: 14px;
            font-weight: 700;
            box-shadow: 0 10px 25px rgba(0,0,0,0.18);
            transition: 0.25s;
        }

        .hero-button:hover {
            background: #638f6a;
            transform: translateY(-2px);
        }

        .section {
            max-width: 1180px;
            margin: auto;
            padding: 75px 25px;
        }

        .section-title {
            text-align: center;
            color: #28563b;
            font-size: 29px;
            margin-bottom: 10px;
        }

        .section-subtitle {
            max-width: 650px;
            margin: 0 auto 30px;
            text-align: center;
            color: #718174;
            font-size: 14px;
            line-height: 1.7;
        }

        /* TOMBOL TAMBAH DAN KELOLA BERITA */
        .news-actions {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 12px;
            flex-wrap: wrap;
            margin-bottom: 35px;
        }

        .add-news-button,
        .manage-news-button {
            display: inline-block;
            padding: 13px 22px;
            border-radius: 12px;
            text-decoration: none;
            font-size: 13px;
            font-weight: 700;
            transition: 0.25s;
        }

        .add-news-button {
            background: #315f42;
            color: white;
            box-shadow: 0 6px 15px rgba(49, 95, 66, 0.15);
        }

        .manage-news-button {
            background: white;
            color: #315f42;
            border: 1px solid #cddfca;
        }

        .add-news-button:hover,
        .manage-news-button:hover {
            transform: translateY(-3px);
            opacity: 0.9;
        }

        .news-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 22px;
        }

        .news-card {
            background: white;
            border: 1px solid #e0e9dd;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(38, 82, 52, 0.07);
            transition: 0.25s;
            min-width: 0;
        }

        .news-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(38, 82, 52, 0.12);
        }

        .news-image {
            display: block;
            width: 100%;
            height: 180px;
            object-fit: cover;
        }

        .news-content { padding: 22px; }

        .news-date {
            color: #78a27c;
            font-size: 11px;
            font-weight: 700;
            margin-bottom: 9px;
        }

        .news-card h3 {
            color: #315d40;
            font-size: 17px;
            line-height: 1.4;
            margin-bottom: 11px;
        }

        .news-card p {
            color: #718174;
            font-size: 13px;
            line-height: 1.7;
            margin-bottom: 17px;
            overflow-wrap: anywhere;
        }

        .news-link {
            color: #568568;
            font-size: 12px;
            font-weight: 700;
            text-decoration: none;
        }

        .news-link:hover { text-decoration: underline; }

        .impact-section { background: #eaf3e6; }

        .impact-grid {
            max-width: 1180px;
            margin: auto;
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            padding: 0 25px 75px;
        }

        .impact-card {
            padding: 30px 24px;
            text-align: center;
            background: rgba(255,255,255,0.8);
            border: 1px solid #d8e6d4;
            border-radius: 20px;
        }

        .impact-number {
            color: #568568;
            font-size: 34px;
            font-weight: 800;
            margin-bottom: 8px;
        }

        .impact-card h3 {
            color: #315d40;
            font-size: 15px;
            margin-bottom: 8px;
        }

        .impact-card p {
            color: #718174;
            font-size: 12px;
            line-height: 1.6;
        }

        .donation {
            max-width: 1000px;
            margin: 70px auto;
            padding: 55px 35px;
            text-align: center;
            border-radius: 28px;
            background: linear-gradient(135deg, #315f42, #568568);
            color: white;
            box-shadow: 0 20px 50px rgba(42, 91, 58, 0.20);
        }

        .donation h2 {
            font-size: 30px;
            margin-bottom: 12px;
        }

        .donation p {
            max-width: 600px;
            margin: 0 auto 27px;
            color: rgba(255,255,255,0.82);
            font-size: 14px;
            line-height: 1.7;
        }

        .donation-button {
            display: inline-block;
            padding: 15px 30px;
            border-radius: 13px;
            background: white;
            color: #386143;
            text-decoration: none;
            font-size: 14px;
            font-weight: 700;
            transition: 0.25s;
        }

        .donation-button:hover {
            transform: translateY(-2px);
            background: #edf6ea;
        }

        footer {
            padding: 25px;
            text-align: center;
            background: #234b32;
            color: rgba(255,255,255,0.72);
            font-size: 11px;
        }

        @media (max-width: 800px) {
            .hero { min-height: 500px; }
            .hero h1 { font-size: 36px; }

            .news-grid,
            .impact-grid {
                grid-template-columns: 1fr;
            }

            .nav-link { display: none; }
        }

        @media (max-width: 480px) {
            .hero { padding: 55px 25px; }
            .hero h1 { font-size: 30px; }
            .hero p { font-size: 14px; }
            .section { padding: 55px 20px; }

            .donation {
                margin: 45px 20px;
                padding: 40px 22px;
            }

            .donation h2 { font-size: 25px; }
        }
    </style>
</head>

<body>

    <nav class="navbar">
        <div class="nav-inner">
            <div class="brand">
                <div class="logo">H</div>
                <div class="brand-name">HijauKita</div>
            </div>

            <a href="#berita" class="nav-link">
                Berita Karhutla
            </a>
        </div>
    </nav>

    <section class="hero">
        <div class="hero-content">
            <div class="hero-badge">
                🌿 Bersama Menjaga Hutan Kalimantan
            </div>

            <h1>
                Satu kepedulian kecil,
                untuk hutan yang lebih hijau.
            </h1>

            <p>
                HijauKita menjadi ruang untuk berbagi informasi,
                mendukung aksi pelestarian, dan ikut membantu
                menjaga hutan Kalimantan dari ancaman kebakaran.
            </p>

            <a href="#berita" class="hero-button">
                Lihat Kabar Terkini
            </a>
        </div>
    </section>

    <section class="section" id="berita">

        <h2 class="section-title">
            Kabar Karhutla Terkini
        </h2>

        <p class="section-subtitle">
            Ikuti informasi terbaru mengenai kebakaran hutan
            dan lahan di Kalimantan dari berbagai sumber.
        </p>

        {{-- TOMBOL TAMBAH DAN KELOLA --}}
        <div class="news-actions">
            <a href="{{ route('berita.create') }}"
               class="add-news-button">
                + Tambah Berita
            </a>

            <a href="{{ route('berita.index') }}"
               class="manage-news-button">
                Kelola Berita
            </a>
        </div>

        <div class="news-grid">

            {{-- BERITA BAWAAN 1 --}}
            <article class="news-card">
                <img
                    class="news-image"
                    src="https://images.unsplash.com/photo-1511497584788-876760111969?auto=format&fit=crop&w=900&q=80"
                    alt="Hutan Kalimantan"
                >

                <div class="news-content">
                    <div class="news-date">10 September 2026</div>

                    <h3>
                        Pengendalian Karhutla Kalimantan Terus Diperkuat
                    </h3>

                    <p>
                        Kementerian Kehutanan melaporkan pengendalian
                        karhutla masih diperkuat, terutama di Kalimantan
                        Barat dan Kalimantan Tengah.
                    </p>

                    <a
                        href="https://www.kehutanan.go.id/pers/kalsel-nihil-hotspot-karhutla-pengendalian-kalbar-dan-kalteng-diperkuat"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="news-link"
                    >
                        Baca berita →
                    </a>
                </div>
            </article>

            {{-- BERITA BAWAAN 2 --}}
            <article class="news-card">
                <img
                    class="news-image"
                    src="https://images.unsplash.com/photo-1473448912268-2022ce9509d8?auto=format&fit=crop&w=900&q=80"
                    alt="Hutan hijau"
                >

                <div class="news-content">
                    <div class="news-date">31 Agustus 2026</div>

                    <h3>
                        Hotspot Menurun, Penanganan Tetap Diperkuat
                    </h3>

                    <p>
                        Kementerian Kehutanan mencatat hotspot high
                        confidence menurun, tetapi operasi pemadaman
                        dan pencegahan masih dilakukan di sejumlah wilayah.
                    </p>

                    <a
                        href="https://www.kehutanan.go.id/news/update-terbaru-karhutla-hotspot-menurun-penanganan-diperkuat"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="news-link"
                    >
                        Baca berita →
                    </a>
                </div>
            </article>

            {{-- BERITA BAWAAN 3 --}}
            <article class="news-card">
                <img
                    class="news-image"
                    src="https://images.unsplash.com/photo-1516026672322-bc52d61a55d5?auto=format&fit=crop&w=900&q=80"
                    alt="Hutan tropis"
                >

                <div class="news-content">
                    <div class="news-date">20 Agustus 2026</div>

                    <h3>
                        Operasi Terpadu Karhutla Diperkuat di Kalimantan
                    </h3>

                    <p>
                        Pemerintah memperkuat operasi terpadu melalui
                        pemadaman darat, dukungan udara, patroli,
                        serta pemantauan titik panas.
                    </p>

                    <a
                        href="https://www.kehutanan.go.id/pers/pemerintah-perkuat-operasi-terpadu-karhutla-di-kalimantan-tambah-dukungan-udara-dan-pemadaman-darat"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="news-link"
                    >
                        Baca berita →
                    </a>
                </div>
            </article>

            {{-- BERITA DARI DATABASE --}}
            @foreach ($beritas as $berita)
                <article class="news-card">
                    <img
                        class="news-image"
                        src="{{ asset('storage/' . $berita->gambar) }}"
                        alt="{{ $berita->judul }}"
                    >

                    <div class="news-content">
                        <div class="news-date">
                            {{ \Carbon\Carbon::parse($berita->tanggal_berita)->format('d F Y') }}
                        </div>

                        <h3>{{ $berita->judul }}</h3>

                        <p>{{ $berita->ringkasan }}</p>

                        <a
                            href="{{ route('berita.show', $berita->slug) }}"
                            class="news-link"
                        >
                            Baca artikel →
                        </a>
                    </div>
                </article>
            @endforeach

        </div>
    </section>

    <section class="impact-section">
        <div class="section">
            <h2 class="section-title">
                Apa yang Sudah Kita Lakukan?
            </h2>

            <p class="section-subtitle">
                Contoh tampilan dampak donasi yang nantinya bisa
                kamu hubungkan dengan data asli dari database.
            </p>
        </div>

        <div class="impact-grid">
            <div class="impact-card">
                <div class="impact-number">1.250+</div>
                <h3>Bibit Pohon</h3>
                <p>
                    Bibit pohon ditanam bersama relawan
                    untuk membantu menghijaukan kembali area terdampak.
                </p>
            </div>

            <div class="impact-card">
                <div class="impact-number">18</div>
                <h3>Area Dibantu</h3>
                <p>
                    Dukungan disalurkan untuk kegiatan penghijauan
                    dan pemulihan lingkungan.
                </p>
            </div>

            <div class="impact-card">
                <div class="impact-number">320+</div>
                <h3>Relawan</h3>
                <p>
                    Relawan ikut berpartisipasi dalam kegiatan
                    edukasi dan pelestarian lingkungan.
                </p>
            </div>
        </div>
    </section>

    <div class="donation">
        <h2>Hutan membutuhkan kita.</h2>

        <p>
            Setiap dukungan dapat membantu kegiatan pelestarian,
            penghijauan, edukasi masyarakat, dan aksi lingkungan
            di Kalimantan.
        </p>

        <a href="{{ route('donation') }}" class="donation-button">
            Donasi Sekarang 🌱
        </a>
    </div>

    <footer>
        HijauKita &nbsp;•&nbsp;
        Pelestarian Hutan Kalimantan
    </footer>

</body>
</html>
