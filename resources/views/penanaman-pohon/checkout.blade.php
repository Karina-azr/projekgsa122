
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout - HijauKita</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: "Segoe UI", sans-serif;
        }

        body {
            background: #f4f8f1;
            color: #294b36;
        }

        .container {
            max-width: 1050px;
            margin: auto;
            padding: 40px 20px;
        }

        .header {
            margin-bottom: 25px;
        }

        .header h1 {
            color: #254f35;
            margin-bottom: 5px;
        }

        .header p {
            color: #718174;
            font-size: 13px;
        }

        .grid {
            display: grid;
            grid-template-columns: 1.3fr .7fr;
            gap: 20px;
        }

        .card {
            background: white;
            border: 1px solid #dfe9dc;
            border-radius: 18px;
            padding: 25px;
            box-shadow: 0 8px 25px rgba(40, 86, 59, .06);
            min-width: 0;
        }

        .card h2 {
            color: #315b3e;
            font-size: 18px;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 16px;
        }

        .form-group label {
            display: block;
            color: #4f6555;
            font-size: 12px;
            margin-bottom: 7px;
            font-weight: 600;
        }

        .form-group input,
        .form-group textarea,
        .form-group select {
            width: 100%;
            padding: 11px 13px;
            border: 1px solid #dfe9dc;
            border-radius: 10px;
            outline: none;
            color: #294b36;
            background: white;
        }

        .form-group textarea {
            min-height: 100px;
            resize: vertical;
        }

        .form-group input:focus,
        .form-group textarea:focus,
        .form-group select:focus {
            border-color: #568568;
        }

        .error {
            color: #b43131;
            font-size: 12px;
            margin-top: 5px;
        }

        .alert {
            padding: 12px 15px;
            margin-bottom: 18px;
            border-radius: 10px;
            font-size: 13px;
        }

        .alert-error {
            background: #fff0f0;
            color: #a32828;
            border: 1px solid #f2cccc;
        }

        .alert-success {
            background: #eaf7ec;
            color: #246638;
            border: 1px solid #cce8d1;
        }

        .item {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 13px 0;
            border-bottom: 1px solid #edf2eb;
            font-size: 12px;
        }

        .item:last-child {
            border-bottom: none;
        }

        .item-image {
            width: 68px;
            height: 68px;
            flex-shrink: 0;
            border-radius: 10px;
            object-fit: cover;
            background: #edf4e9;
        }

        .image-placeholder {
            width: 68px;
            height: 68px;
            flex-shrink: 0;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #edf4e9;
            font-size: 25px;
        }

        .item-name {
            color: #365b43;
            flex: 1;
            min-width: 0;
            overflow-wrap: anywhere;
        }

        .item-name small {
            display: inline-block;
            color: #718174;
            margin-top: 5px;
        }

        .item-price {
            font-weight: 700;
            color: #254f35;
            white-space: nowrap;
        }

        .total {
            display: flex;
            justify-content: space-between;
            gap: 12px;
            margin-top: 20px;
            padding-top: 18px;
            border-top: 2px solid #dfe9dc;
        }

        .total span:first-child {
            color: #718174;
            font-size: 13px;
        }

        .total span:last-child {
            color: #254f35;
            font-size: 21px;
            font-weight: 700;
            text-align: right;
        }

        .payment-title {
            margin-top: 20px;
        }

        .payment-option {
            display: block;
            border: 1px solid #dfe9dc;
            padding: 14px;
            border-radius: 10px;
            margin-bottom: 10px;
            font-size: 13px;
            cursor: pointer;
        }

        .payment-option:has(input:checked) {
            border-color: #568568;
            background: #f2f8ef;
        }

        .payment-option input {
            margin-right: 8px;
            accent-color: #254f35;
        }

        .btn {
            display: block;
            width: 100%;
            border: none;
            background: #254f35;
            color: white;
            padding: 14px;
            border-radius: 10px;
            cursor: pointer;
            font-weight: 700;
            margin-top: 20px;
            text-align: center;
        }

        .btn:hover {
            background: #356c49;
        }

        .back {
            display: inline-block;
            margin-top: 15px;
            color: #568568;
            text-decoration: none;
            font-size: 12px;
        }

        .empty {
            color: #718174;
            font-size: 13px;
            padding: 15px 0;
        }

        @media (max-width: 750px) {
            .container {
                padding: 25px 14px;
            }

            .grid {
                grid-template-columns: 1fr;
            }

            .card {
                padding: 20px;
            }

            .item {
                flex-wrap: wrap;
            }

            .item-price {
                margin-left: 80px;
            }
        }
    </style>
</head>

<body>
<div class="container">

    <div class="header">
        <h1>🌱 Checkout Penanaman Pohon</h1>
        <p>Lengkapi data untuk melanjutkan pembayaran.</p>
    </div>

    @if(session('error'))
        <div class="alert alert-error">
            {{ session('error') }}
        </div>
    @endif

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-error">
            <strong>Periksa kembali data kamu:</strong>
            <ul style="margin:8px 0 0 18px;">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="grid">

        <div class="card">
            <h2>Data Pemesan</h2>

            <form action="{{ route('penanaman-pohon.process') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="nama">Nama Lengkap</label>
                    <input
                        id="nama"
                        type="text"
                        name="nama"
                        value="{{ old('nama', auth()->user()->name ?? '') }}"
                        maxlength="255"
                        required
                    >
                    @error('nama')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input
                        id="email"
                        type="email"
                        name="email"
                        value="{{ old('email', auth()->user()->email ?? '') }}"
                        maxlength="255"
                        required
                    >
                    @error('email')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea
                        id="alamat"
                        name="alamat"
                        required
                    >{{ old('alamat') }}</textarea>
                    @error('alamat')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <h2 class="payment-title">Metode Pembayaran</h2>

                <label class="payment-option">
                    <input
                        type="radio"
                        name="metode_pembayaran"
                        value="qris"
                        {{ old('metode_pembayaran', 'qris') === 'qris' ? 'checked' : '' }}
                        required
                    >
                    <strong>QRIS</strong>
                    <br>
                    <small>Bayar melalui aplikasi yang mendukung QRIS.</small>
                </label>

                <label class="payment-option">
                    <input
                        type="radio"
                        name="metode_pembayaran"
                        value="transfer"
                        {{ old('metode_pembayaran') === 'transfer' ? 'checked' : '' }}
                    >
                    <strong>Transfer Bank</strong>
                </label>

                @error('metode_pembayaran')
                    <div class="error">{{ $message }}</div>
                @enderror

                <button type="submit" class="btn">
                    Lanjut ke Pembayaran
                </button>
            </form>

            <a href="{{ route('penanaman-pohon.cart') }}" class="back">
                ← Kembali ke keranjang
            </a>
        </div>

        <div class="card">
            <h2>Ringkasan Pesanan</h2>

            @forelse($cart as $item)
                @php
                    $gambar = $item['gambar'] ?? null;

                    if ($gambar && \Illuminate\Support\Str::startsWith(
                        $gambar,
                        ['http://', 'https://']
                    )) {
                        $gambarUrl = $gambar;
                    } elseif ($gambar) {
                        $gambar = ltrim($gambar, '/');

                        // Gambar dari folder public/images/...
                        if (\Illuminate\Support\Str::startsWith($gambar, 'images/')) {
                            $gambarUrl = asset($gambar);
                        } else {
                            // Gambar dari storage/app/public/...
                            $gambarUrl = asset('storage/' . $gambar);
                        }
                    } else {
                        $gambarUrl = null;
                    }
                @endphp

                <div class="item">
                    @if($gambarUrl)
                        <img
                            class="item-image"
                            src="{{ $gambarUrl }}"
                            alt="{{ $item['nama'] ?? 'Bibit pohon' }}"
                            onerror="this.style.display='none';this.nextElementSibling.style.display='flex';"
                        >
                        <div class="image-placeholder" style="display:none;">🌱</div>
                    @else
                        <div class="image-placeholder">🌱</div>
                    @endif

                    <div class="item-name">
                        <strong>{{ $item['nama'] ?? 'Bibit pohon' }}</strong>
                        <br>
                        <small>
                            {{ (int) ($item['jumlah'] ?? 0) }} bibit ×
                            Rp {{ number_format((float) ($item['harga'] ?? 0), 0, ',', '.') }}
                        </small>
                    </div>

                    <div class="item-price">
                        Rp {{ number_format(
                            (float) ($item['harga'] ?? 0) *
                            (int) ($item['jumlah'] ?? 0),
                            0, ',', '.'
                        ) }}
                    </div>
                </div>
            @empty
                <div class="empty">
                    Keranjang kamu masih kosong.
                </div>
            @endforelse

            <div class="total">
                <span>Total</span>
                <span>
                    Rp {{ number_format((float) ($cartTotal ?? 0), 0, ',', '.') }}
                </span>
            </div>
        </div>

    </div>
</div>
</body>
</html>
