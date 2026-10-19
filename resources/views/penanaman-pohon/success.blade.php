
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Status Pesanan {{ $order->kode_pesanan }}</title>

    <style>
        * { box-sizing: border-box; }

        body {
            margin: 0;
            padding: 30px 15px;
            font-family: Arial, sans-serif;
            background: #f0fdf4;
            color: #1f2937;
        }

        .container {
            max-width: 760px;
            margin: auto;
            padding: 30px;
            border-radius: 18px;
            background: white;
            box-shadow: 0 8px 30px rgba(0,0,0,.08);
        }

        .heading { text-align: center; margin-bottom: 30px; }
        .heading h1 { color: #166534; }

        .info, .items {
            border: 1px solid #e5e7eb;
            border-radius: 12px;
            padding: 18px;
            margin: 20px 0;
        }

        .row {
            display: flex;
            justify-content: space-between;
            gap: 15px;
            padding: 9px 0;
            border-bottom: 1px solid #f3f4f6;
        }

        .row:last-child { border-bottom: none; }

        .label { color: #6b7280; }
        .value { font-weight: bold; text-align: right; overflow-wrap: anywhere; }

        .item {
            display: flex;
            justify-content: space-between;
            gap: 15px;
            padding: 12px 0;
            border-bottom: 1px solid #eee;
        }

        .item:last-child { border-bottom: none; }

        .total {
            display: flex;
            justify-content: space-between;
            gap: 15px;
            padding: 20px 0;
            font-size: 21px;
            font-weight: bold;
            color: #166534;
        }

        .buttons {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
            margin-top: 25px;
        }

        .button {
            flex: 1;
            min-width: 180px;
            padding: 14px;
            text-align: center;
            text-decoration: none;
            border-radius: 9px;
            font-weight: bold;
        }

        .green { background: #16a34a; color: white; }
        .gray { background: #e5e7eb; color: #222; }

        @media (max-width: 520px) {
            .container { padding: 18px; }
            .row, .item, .total { flex-direction: column; }
            .value { text-align: left; }
        }
    </style>
</head>

<body>
<div class="container">
    <div class="heading">
        @if ($order->status_pembayaran === 'berhasil')
            <h1>✓ Pembayaran Berhasil!</h1>
            <p>Terima kasih telah mendukung penghijauan Indonesia.</p>
        @else
            <h1>Pembayaran Belum Terverifikasi</h1>
            <p>Silakan selesaikan pembayaran terlebih dahulu.</p>
        @endif
    </div>

    <div class="info">
        <div class="row">
            <span class="label">Kode Pesanan</span>
            <span class="value">{{ $order->kode_pesanan }}</span>
        </div>
        <div class="row">
            <span class="label">Nama</span>
            <span class="value">{{ $order->nama }}</span>
        </div>
        <div class="row">
            <span class="label">Email</span>
            <span class="value">{{ $order->email }}</span>
        </div>
        <div class="row">
            <span class="label">Alamat</span>
            <span class="value">{{ $order->alamat }}</span>
        </div>
        <div class="row">
            <span class="label">Tanggal</span>
            <span class="value">{{ $order->created_at?->format('d/m/Y H:i') ?? '-' }}</span>
        </div>
        <div class="row">
            <span class="label">Metode Pembayaran</span>
            <span class="value">{{ strtoupper($order->metode_pembayaran) }}</span>
        </div>
        <div class="row">
            <span class="label">Status</span>
            <span class="value">{{ ucfirst($order->status_pembayaran) }}</span>
        </div>
    </div>

    <div class="items">
        <h3>Detail Penanaman</h3>

        @forelse ($order->items as $item)
            <div class="item">
                <div>
                    <strong>{{ $item->nama_bibit }}</strong>
                    <div>{{ $item->jumlah }} × Rp {{ number_format($item->harga, 0, ',', '.') }}</div>
                </div>
                <strong>Rp {{ number_format($item->subtotal, 0, ',', '.') }}</strong>
            </div>
        @empty
            <p>Tidak ada item dalam pesanan ini.</p>
        @endforelse
    </div>

    <div class="total">
        <span>Total Pembayaran</span>
        <span>Rp {{ number_format($order->total, 0, ',', '.') }}</span>
    </div>

    <div class="buttons">
        @if ($order->status_pembayaran === 'berhasil')
            <a class="button green"
               href="{{ route('penanaman-pohon.receipt', $order->id) }}">
                Lihat & Cetak Struk
            </a>
        @else
            <a class="button green"
               href="{{ route('penanaman-pohon.payment', $order->id) }}">
                Lanjutkan Pembayaran
            </a>
        @endif

        <a class="button gray" href="{{ route('penanaman-pohon.index') }}">
            Kembali ke Marketplace
        </a>
    </div>
</div>
</body>
</html>
