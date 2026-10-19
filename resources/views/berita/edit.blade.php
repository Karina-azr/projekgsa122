
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Berita - HijauKita</title>

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
        }

        h1 {
            color: #28563b;
            margin-top: 0;
        }

        label {
            display: block;
            margin: 18px 0 7px;
            font-weight: 600;
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
        }

        .alert {
            background: #fff0ef;
            color: #b42318;
            padding: 12px;
            border-radius: 10px;
        }

        .preview {
            width: 100%;
            max-width: 320px;
            height: 190px;
            object-fit: cover;
            border-radius: 12px;
        }

        small { color: #718174; }
    </style>
</head>

<body>
<div class="container">

    <h1>Edit Berita ✏️</h1>

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
        action="{{ route('berita.update', $berita->id) }}"
        method="POST"
        enctype="multipart/form-data"
    >
        @csrf
        @method('PUT')

        <label for="judul">Judul berita</label>
        <input
            id="judul"
            name="judul"
            type="text"
            value="{{ old('judul', $berita->judul) }}"
            required
            maxlength="255"
        >

        @error('judul')
            <p class="error">{{ $message }}</p>
        @enderror

        <label for="tanggal_berita">Tanggal berita</label>
        <input
            id="tanggal_berita"
            name="tanggal_berita"
            type="date"
            value="{{ old('tanggal_berita', optional($berita->tanggal_berita)->format('Y-m-d')) }}"
            required
        >

        @error('tanggal_berita')
            <p class="error">{{ $message }}</p>
        @enderror

        <label for="ringkasan">Ringkasan</label>
        <textarea
            id="ringkasan"
            name="ringkasan"
            maxlength="500"
            required
        >{{ old('ringkasan', $berita->ringkasan) }}</textarea>

        @error('ringkasan')
            <p class="error">{{ $message }}</p>
        @enderror

        <label for="isi_artikel">Isi lengkap artikel</label>
        <textarea
            id="isi_artikel"
            name="isi_artikel"
            style="min-height:240px"
            required
        >{{ old('isi_artikel', $berita->isi) }}</textarea>

        @error('isi_artikel')
            <p class="error">{{ $message }}</p>
        @enderror

        <label>Foto saat ini</label>

        @if ($berita->gambar)
            <img
                class="preview"
                src="{{ asset('storage/' . $berita->gambar) }}"
                alt="Foto berita saat ini"
            >
        @else
            <p>Belum ada foto.</p>
        @endif

        <label for="gambar">Ganti foto (opsional)</label>
        <input
            id="gambar"
            type="file"
            name="gambar"
            accept=".jpg,.jpeg,.png,.webp,image/jpeg,image/png,image/webp"
        >

        <small>
            Biarkan kosong jika ingin mempertahankan foto lama.
            Maksimal 5 MB.
        </small>

        @error('gambar')
            <p class="error">{{ $message }}</p>
        @enderror

        <div class="actions">
            <button class="btn" type="submit">
                Simpan Perubahan
            </button>

            <a
                class="btn secondary"
                href="{{ route('berita.index') }}"
            >
                Batal
            </a>
        </div>
    </form>

</div>
</body>
</html>
