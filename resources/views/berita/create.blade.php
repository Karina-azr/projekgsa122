
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah Berita - HijauKita</title>

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
            max-width: 760px;
            margin: auto;
            padding: 30px;
            background: white;
            border: 1px solid #dce8d9;
            border-radius: 20px;
            box-shadow: 0 10px 30px #294b3610;
        }

        h1 { margin-top: 0; color: #28563b; }

        .subtitle {
            color: #718174;
            line-height: 1.6;
        }

        label {
            display: block;
            margin: 18px 0 7px;
            font-weight: 600;
            font-size: 14px;
        }

        input, textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #cddfca;
            border-radius: 10px;
            font: inherit;
        }

        textarea {
            min-height: 110px;
            resize: vertical;
        }

        .btn {
            display: inline-block;
            border: 0;
            border-radius: 10px;
            padding: 13px 18px;
            background: #315f42;
            color: white;
            font-weight: 700;
            text-decoration: none;
            cursor: pointer;
        }

        .secondary {
            background: #eaf3e6;
            color: #315f42;
        }

        .actions {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
            margin-top: 24px;
        }

        .error {
            color: #b42318;
            font-size: 13px;
            margin-top: 5px;
        }

        .alert {
            background: #fff0ef;
            color: #b42318;
            padding: 12px;
            border-radius: 10px;
        }

        small { color: #718174; }
    </style>
</head>

<body>
<div class="container">

    <h1>Tambah Berita 🌿</h1>
    <p class="subtitle">
        Tambahkan artikel baru ke beranda HijauKita.
    </p>

    @if ($errors->any())
        <div class="alert">
            <strong>Periksa kembali data berikut:</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form
        action="{{ route('berita.store') }}"
        method="POST"
        enctype="multipart/form-data"
    >
        @csrf

        <label for="judul">Judul berita</label>
        <input
            id="judul"
            type="text"
            name="judul"
            value="{{ old('judul') }}"
            required
            maxlength="255"
        >
        @error('judul')
            <div class="error">{{ $message }}</div>
        @enderror

        <label for="tanggal_berita">Tanggal berita</label>
        <input
            id="tanggal_berita"
            type="date"
            name="tanggal_berita"
            value="{{ old('tanggal_berita', date('Y-m-d')) }}"
            required
        >
        @error('tanggal_berita')
            <div class="error">{{ $message }}</div>
        @enderror

        <label for="ringkasan">Ringkasan berita</label>
        <textarea
            id="ringkasan"
            name="ringkasan"
            maxlength="500"
            required
        >{{ old('ringkasan') }}</textarea>

        <small>
            Ringkasan ini akan muncul di kartu berita beranda.
        </small>

        @error('ringkasan')
            <div class="error">{{ $message }}</div>
        @enderror

        <label for="isi_artikel">Isi lengkap artikel</label>
        <textarea
            id="isi_artikel"
            name="isi_artikel"
            style="min-height:240px"
            required
        >{{ old('isi_artikel') }}</textarea>

        <small>Tekan Enter untuk membuat paragraf baru.</small>

        @error('isi_artikel')
            <div class="error">{{ $message }}</div>
        @enderror

        <label for="gambar">Foto berita</label>
        <input
            id="gambar"
            type="file"
            name="gambar"
            accept=".jpg,.jpeg,.png,.webp,image/jpeg,image/png,image/webp"
            required
        >

        <small>
            Format JPG, PNG, atau WebP. Maksimal 5 MB.
        </small>

        @error('gambar')
            <div class="error">{{ $message }}</div>
        @enderror

        <div class="actions">
            <button class="btn" type="submit">
                Simpan Berita
            </button>

            <a
                class="btn secondary"
                href="{{ route('berita.index') }}"
            >
                Kembali ke Beranda
            </a>
        </div>
    </form>

</div>
</body>
</html>
