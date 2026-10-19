
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Struk {{ $order->kode_pesanan }}</title>

    <style>
        * { box-sizing: border-box; }

        body {
            margin: 0;
            padding: 30px;
            background: #f3f4f6;
            font-family: Arial, Helvetica, sans-serif;
            color: #222;
        }

        .receipt {
            width: 100%;
            max-width: 650px;
            margin: auto;
            background: white;
            padding: 35px;
            border-radius: 12px;
            box-shadow: 0 5px 25px rgba(0,0,0,.08);
        }

        .header {
            text-align: center;
            padding-bottom: 20px;
            border-bottom: 2px dashed #bbb;
        }

        .header h1 { margin: 0; color: #166534; }
        .header p { margin: 5px 0; color: #666; }

        .success {
            text-align: center;
            margin: 25px 0;
        }

        .success-icon {
            width: 65px;
            height: 65px;
            margin: auto;
            border-radius: 50%;
            background: #dcfce7;
            color: #16a34a;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 35px;
            font-weight: bold;
        }

        .success h2 { color: #166534; margin-bottom: 5px; }

        .info { margin: 25px 0; }

        .row {
            display: flex;
            justify-content: space-between;
            gap: 20px;
            padding: 8px 0;
        }

        .label { color: #666; }

        .value {
            font-weight: bold;
            text-align: right;
            overflow-wrap: anywhere;
        }

        .items {
            border-top: 2px dashed #bbb;
            border-bottom: 2px dashed #bbb;
            padding: 15px 0;
        }

        .item {
            display: flex;
            justify-content: space-between;
            gap: 20px;
            padding: 10px 0;
        }

        .item-name { font-weight: bold; }

        .item-detail {
            font-size: 13px;
            color: #777;
            margin-top: 3px;
        }

        .item-price {
            font-weight: bold;
            white-space: nowrap;
        }

        .total {
            display: flex;
            justify-content: space-between;
            gap: 15px;
            padding: 20px 0;
            font-size: 21px;
            font-weight: bold;
            color: #166534;
        }

        .footer {
            text-align: center;
            border-top: 2px dashed #bbb;
            padding-top: 20px;
            color: #777;
            font-size: 14px;
        }

        .actions {
            max-width: 650px;
            margin: 20px auto;
            display: flex;
            gap: 10px;
        }

        .button {
            flex: 1;
            padding: 14px;
            border-radius: 8px;
            text-decoration: none;
            text-align: center;
            font-weight: bold;
            border: none;
            cursor: pointer;
            font-size: 14px;
        }

        .button-green { background: #16a34a; color: white; }
        .button-gray { background: #e5e7eb; color: #333; }

        @media print {
            body { background: white; padding: 0; }
            .receipt {
                box-shadow: none;
                max-width: 100%;
            }
            .actions { display: none; }
        }

        @media (max-width: 600px) {
            body { padding: 10px; }
            .receipt { padding: 20px; }

            .row, .item {
                flex-direction: column;
                gap: 3px;
            }

            .value, .item-price { text-align: left; }
            .actions { flex-direction: column; }
            .total { flex-direction: column; font-size: 18px; }
        }
    </style>
</head>

<body>
    <div class="receipt">
        <div class="header">
            <h1>HijauKita</h1>
            <p>Bukti Pembayaran Penanaman Pohon</p>
        </div>

        @if ($order->status_pembayaran === 'berhasil')
            <div class="success">
                <div class="success-icon">✓</div>
                <h2>Pembayaran Berhasil</h2>
                <p>Terima kasih telah berpartisipasi dalam penanaman pohon.</p>
            </div>
        @else
            <div class="success">
                <h2>Pembayaran Belum Terverifikasi</h2>
                <p>Pembayaran belum dikonfirmasi.</p>
            </div>
        @endif

        <div class="info">
            <div class="row">
                <span class="label">Kode Pesanan</span>
                <span class="value">{{ $order->kode_pesanan }}</span>
            </div>

            <div class="row">
                <span class="label">Tanggal</span>
                <span class="value">{{ $order->created_at?->format('d/m/Y H:i') ?? '-' }}</span>
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
                <span class="label">Metode Pembayaran</span>
                <span class="value">{{ strtoupper($order->metode_pembayaran) }}</span>
            </div>

            <div class="row">
                <span class="label">Status</span>
                <span class="value">{{ ucfirst($order->status_pembayaran) }}</span>
            </div>
        </div>

        <div class="items">
            @forelse ($order->items as $item)
                <div class="item">
                    <div>
                        <div class="item-name">{{ $item->nama_bibit }}</div>
                        <div class="item-detail">
                            {{ $item->jumlah }} × Rp {{ number_format($item->harga, 0, ',', '.') }}
                        </div>
                    </div>

                    <div class="item-price">
                        Rp {{ number_format($item->subtotal, 0, ',', '.') }}
                    </div>
                </div>
            @empty
                <p>Tidak ada detail item pesanan.</p>
            @endforelse
        </div>

        <div class="total">
            <span>Total Pembayaran</span>
            <span>Rp {{ number_format($order->total, 0, ',', '.') }}</span>
        </div>

        <div class="footer">
            <p>Terima kasih telah berkontribusi untuk penghijauan Indonesia.</p>
            <p>{{ $order->kode_pesanan }}</p>
        </div>
    </div>

    <div class="actions">
        @if ($order->status_pembayaran === 'berhasil')
            <button onclick="window.print()" class="button button-green">
                Cetak / Simpan PDF
            </button>
        @endif

        <a href="{{ route('penanaman-pohon.index') }}" class="button button-gray">
            Kembali ke Marketplace
        </a>
    </div>
</body>
</html>
