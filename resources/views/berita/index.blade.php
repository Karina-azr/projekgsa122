
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kelola Berita - HijauKita</title>

    <style>
        * { box-sizing: border-box; }

        body {
            margin: 0;
            padding: 30px 16px;
            background: #f4f8f2;
            color: #294b36;
            font-family: "Segoe UI", sans-serif;
        }

        .container {
            max-width: 1050px;
            margin: auto;
        }

        .top {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 15px;
            flex-wrap: wrap;
            margin-bottom: 24px;
        }

        h1 { color: #28563b; }

        .btn {
            display: inline-block;
            padding: 11px 16px;
            border-radius: 10px;
            background: #315f42;
            color: white;
            text-decoration: none;
            font-weight: 700;
            border: 0;
            cursor: pointer;
        }

        .secondary {
            background: #eaf3e6;
            color: #315f42;
        }

        .card {
            background: white;
            padding: 18px;
            border: 1px solid #dce8d9;
            border-radius: 16px;
            margin-bottom: 14px;
            display: flex;
            gap: 18px;
            align-items: center;
        }

        .photo {
            width: 145px;
            height: 110px;
            object-fit: cover;
            border-radius: 12px;
            flex-shrink: 0;
        }

        .content {
            flex: 1;
            min-width: 0;
        }

        .content h2 {
            margin: 0 0 8px;
            font-size: 18px;
            overflow-wrap: anywhere;
        }

        .content p {
            color: #718174;
            line-height: 1.6;
            overflow-wrap: anywhere;
        }

        .actions {
            display: flex;
            gap: 8px;
            flex-wrap: wrap;
        }

        .alert {
            background: #e6f5e6;
            padding: 14px;
            border-radius: 10px;
            margin-bottom: 18px;
        }

        .empty {
            padding: 30px;
            background: white;
            border-radius: 15px;
            text-align: center;
        }

        .pagination { margin-top: 20px; }

        @media(max-width: 600px) {
            body { padding: 20px 12px; }

            .card {
                align-items: flex-start;
                flex-direction: column;
            }

            .photo {
                width: 100%;
                height: 190px;
            }

            .top { align-items: flex-start; }
        }
    </style>
</head>

<body>
<div class="container">

    <div class="top">
        <div>
            <h1>Kelola Berita 🌿</h1>
            <p>Kelola artikel yang tersimpan di database HijauKita.</p>
        </div>

        <div class="actions">
            <a href="{{ route('berita.create') }}" class="btn">
                + Tambah Berita
            </a>

            <a href="{{ route('home') }}" class="btn secondary">
                Beranda
            </a>
        </div>
    </div>

    @if (session('success'))
        <div class="alert">
            {{ session('success') }}
        </div>
    @endif

    @forelse ($beritas as $berita)
        <article class="card">

            @if ($berita->gambar)
                <img
                    class="photo"
                    src="{{ asset('storage/' . $berita->gambar) }}"
                    alt="{{ $berita->judul }}"
                    loading="lazy"
                >
            @endif

            <div class="content">
                <h2>{{ $berita->judul }}</h2>

                <small>
                    {{ $berita->tanggal_berita
                        ? $berita->tanggal_berita->format('d/m/Y')
                        : '-'
                    }}
                </small>

                <p>{{ $berita->ringkasan }}</p>

                <div class="actions">
                    <a
                        class="btn"
                        href="{{ route('berita.edit', $berita->slug) }}"
                    >
                        Edit Berita
                    </a>

                    <a
                        class="btn secondary"
                        href="{{ route('berita.show', $berita->slug) }}"
                    >
                        Lihat Artikel
                    </a>
                </div>
            </div>
        </article>
    @empty
        <div class="empty">
            <h2>Belum ada berita tambahan</h2>
            <p>Berita yang kamu buat akan muncul di halaman ini.</p>

            <a href="{{ route('berita.create') }}" class="btn">
                Buat Berita Pertama
            </a>
        </div>
    @endforelse

    <div class="pagination">
        {{ $beritas->links() }}
    </div>

</div>
</body>
</html>
