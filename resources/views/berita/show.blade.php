
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $berita->judul }} - HijauKita</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            background: #f4f8f2;
            color: #294b36;
            font-family: "Segoe UI", sans-serif;
        }

        nav {
            padding: 18px 7%;
            background: #f7fbf5;
            border-bottom: 1px solid #dce8d9;
            font-weight: 700;
            color: #28563b;
        }

        main {
            max-width: 850px;
            margin: 35px auto;
            padding: 0 20px 50px;
        }

        article {
            background: white;
            border: 1px solid #e0e9dd;
            border-radius: 20px;
            overflow: hidden;
        }

        .cover {
            display: block;
            width: 100%;
            max-height: 460px;
            object-fit: cover;
        }

        .content {
            padding: 30px;
        }

        .date {
            color: #78a27c;
            font-size: 13px;
            font-weight: 700;
        }

        h1 {
            color: #28563b;
            line-height: 1.3;
        }

        .summary {
            color: #718174;
            font-size: 17px;
            line-height: 1.8;
        }

        .body-text {
            line-height: 1.9;
            overflow-wrap: anywhere;
            white-space: normal;
        }

        .back {
            display: inline-block;
            margin-bottom: 20px;
            color: #386143;
            text-decoration: none;
            font-weight: 700;
        }

        .back:hover {
            color: #254f35;
            text-decoration: underline;
        }

        @media (max-width: 500px) {
            .content {
                padding: 20px;
            }

            h1 {
                font-size: 25px;
            }
        }
    </style>
</head>

<body>

<nav>🌿 HijauKita</nav>

<main>

    <a class="back" href="{{ url('/home') }}">
        ← Kembali ke Beranda
    </a>

    <article>

        @if ($berita->gambar)
            <img
                class="cover"
                src="{{ asset('storage/' . $berita->gambar) }}"
                alt="{{ $berita->judul }}"
            >
        @endif

        <div class="content">

            <div class="date">
                {{ $berita->tanggal_berita
                    ? $berita->tanggal_berita->translatedFormat('d F Y')
                    : ''
                }}
            </div>

            <h1>{{ $berita->judul }}</h1>

            <p class="summary">
                {{ $berita->ringkasan }}
            </p>

            <div class="body-text">{!! nl2br(e($berita->isi ?? $berita->isi_artikel ?? '')) !!}</div>

        </div>

    </article>

</main>

</body>
</html>
