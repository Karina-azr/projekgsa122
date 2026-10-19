<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        Pembayaran - {{ $order->kode_pesanan }}
    </title>

    <style>

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            background: #f4f7f5;
            font-family: Arial, Helvetica, sans-serif;
            color: #333;
        }

        .container {
            max-width: 900px;
            margin: 40px auto;
            padding: 20px;
        }

        .card {
            background: white;
            border-radius: 18px;
            padding: 30px;
            box-shadow: 0 8px 30px rgba(0,0,0,.08);
        }

        .header {
            text-align: center;
            margin-bottom: 30px;
        }

        .header h1 {
            margin: 0;
            color: #166534;
        }

        .header p {
            color: #666;
        }

        .order-info {
            background: #f8faf9;
            padding: 20px;
            border-radius: 12px;
            margin-bottom: 25px;
        }

        .row {
            display: flex;
            justify-content: space-between;
            gap: 20px;
            padding: 10px 0;
            border-bottom: 1px solid #e5e7eb;
        }

        .row:last-child {
            border-bottom: none;
        }

        .label {
            color: #666;
        }

        .value {
            font-weight: bold;
            text-align: right;
        }

        .payment-box {
            text-align: center;
            background: #f0fdf4;
            border: 1px solid #bbf7d0;
            border-radius: 16px;
            padding: 30px 20px;
            margin-bottom: 30px;
        }

        .payment-box h2 {
            color: #166534;
            margin-top: 0;
        }

        .qris-logo {
            font-size: 28px;
            font-weight: bold;
            color: #111;
            margin-bottom: 15px;
        }

        .qris-logo span {
            color: #e11d48;
        }

        .qr-wrapper {
            background: white;
            display: inline-block;
            padding: 12px;
            border-radius: 12px;
            box-shadow: 0 5px 20px rgba(0,0,0,.08);
            margin: 15px 0;
        }

        .qr-image {
            width: 280px;
            height: 280px;
            display: block;
        }

        .payment-total {
            font-size: 24px;
            font-weight: bold;
            color: #166534;
            margin: 10px 0;
        }

        .payment-note {
            color: #666;
            font-size: 14px;
        }

        .items {
            margin-top: 25px;
        }

        .items h3 {
            color: #166534;
        }

        .item {
            display: flex;
            justify-content: space-between;
            gap: 20px;
            padding: 14px 0;
            border-bottom: 1px solid #eee;
        }

        .item-name {
            font-weight: bold;
        }

        .item-detail {
            color: #777;
            font-size: 14px;
            margin-top: 4px;
        }

        .item-price {
            font-weight: bold;
            white-space: nowrap;
        }

        .total {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
            padding-top: 20px;
            border-top: 2px solid #ddd;
            font-size: 21px;
            font-weight: bold;
            color: #166534;
        }

        .button {
            width: 100%;
            border: none;
            border-radius: 10px;
            padding: 16px;
            margin-top: 25px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
        }

        .button-success {
            background: #16a34a;
            color: white;
        }

        .button-success:hover {
            background: #15803d;
        }

        .back {
            display: block;
            text-align: center;
            margin-top: 15px;
            color: #166534;
            text-decoration: none;
        }

        @media (max-width: 600px) {

            .container {
                margin: 10px auto;
                padding: 10px;
            }

            .card {
                padding: 20px;
            }

            .row,
            .item {
                flex-direction: column;
                gap: 5px;
            }

            .value,
            .item-price {
                text-align: left;
            }

            .qr-image {
                width: 230px;
                height: 230px;
            }

        }

    </style>

</head>


<body>

<div class="container">

    <div class="card">

        <div class="header">

            <h1>
                Pembayaran
            </h1>

            <p>
                Selesaikan pembayaran untuk melanjutkan.
            </p>

        </div>


        {{-- INFORMASI ORDER --}}

        <div class="order-info">

            <div class="row">

                <span class="label">
                    Kode Pesanan
                </span>

                <span class="value">
                    {{ $order->kode_pesanan }}
                </span>

            </div>

            <div class="row">

                <span class="label">
                    Nama
                </span>

                <span class="value">
                    {{ $order->nama }}
                </span>

            </div>

            <div class="row">

                <span class="label">
                    Metode Pembayaran
                </span>

                <span class="value">
                    {{ strtoupper($order->metode_pembayaran) }}
                </span>

            </div>

            <div class="row">

                <span class="label">
                    Status
                </span>

                <span class="value">
                    {{ ucfirst($order->status_pembayaran) }}
                </span>

            </div>

        </div>


        {{-- PEMBAYARAN QRIS --}}

        @if ($order->metode_pembayaran === 'qris')

            <div class="payment-box">

                <div class="qris-logo">
                    <span>QR</span>IS
                </div>

                <h2>
                    Pembayaran QRIS
                </h2>

                <div class="qr-wrapper">

                    <img
                        src="https://api.qrserver.com/v1/create-qr-code/?size=300x300&data={{ urlencode('PEMBAYARAN|' . $order->kode_pesanan . '|' . $order->total) }}"
                        alt="QRIS Pembayaran"
                        class="qr-image"
                    >

                </div>

                <div class="payment-total">

                    Rp {{ number_format(
                        $order->total,
                        0,
                        ',',
                        '.'
                    ) }}

                </div>

                <p class="payment-note">
                    Scan QR untuk melakukan pembayaran.
                </p>

            </div>

        @endif


        {{-- TRANSFER --}}

        @if ($order->metode_pembayaran === 'transfer')

            <div class="payment-box">

                <h2>
                    Transfer Bank
                </h2>

                <p>
                    Silakan transfer sesuai nominal berikut:
                </p>

                <div class="payment-total">

                    Rp {{ number_format(
                        $order->total,
                        0,
                        ',',
                        '.'
                    ) }}

                </div>

                <p>
                    Bank Hutan Kita
                </p>

                <p>
                    <strong>
                        1234567890
                    </strong>
                </p>

                <p>
                    a.n. Hutan Kita
                </p>

            </div>

        @endif


        {{-- DETAIL ITEM --}}

        <div class="items">

            <h3>
                Detail Pesanan
            </h3>

            @foreach ($order->items as $item)

                <div class="item">

                    <div>

                        <div class="item-name">
                            {{ $item->nama_bibit }}
                        </div>

                        <div class="item-detail">

                            {{ $item->jumlah }}
                            ×
                            Rp {{ number_format(
                                $item->harga,
                                0,
                                ',',
                                '.'
                            ) }}

                        </div>

                    </div>

                    <div class="item-price">

                        Rp {{ number_format(
                            $item->subtotal,
                            0,
                            ',',
                            '.'
                        ) }}

                    </div>

                </div>

            @endforeach

        </div>


        {{-- TOTAL --}}

        <div class="total">

            <span>
                Total
            </span>

            <span>

                Rp {{ number_format(
                    $order->total,
                    0,
                    ',',
                    '.'
                ) }}

            </span>

        </div>


        {{-- KONFIRMASI --}}

        <form
            action="{{ route(
                'penanaman-pohon.payment.confirm',
                $order->id
            ) }}"
            method="POST"
        >

            @csrf

            <button
                type="submit"
                class="button button-success"
            >
                Saya Sudah Membayar
            </button>

        </form>


        <a
            href="{{ route('penanaman-pohon.index') }}"
            class="back"
        >
            Kembali ke Marketplace
        </a>

    </div>

</div>

</body>

</html>