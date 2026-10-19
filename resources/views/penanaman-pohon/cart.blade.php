<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Keranjang - HijauKita</title>

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
            min-height: 100vh;
            padding: 30px;
        }

        .container {
            max-width: 1000px;
            margin: auto;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
            margin-bottom: 25px;
        }

        h1 {
            color: #254f35;
            font-size: 28px;
        }

        .back {
            text-decoration: none;
            color: white;
            background: #568568;
            padding: 11px 18px;
            border-radius: 10px;
            font-size: 13px;
        }

        .alert {
            padding: 13px 16px;
            border-radius: 10px;
            margin-bottom: 15px;
            background: #e3f2df;
            color: #315f42;
        }

        .cart-card {
            background: white;
            border: 1px solid #dfe9dc;
            border-radius: 18px;
            padding: 20px;
            margin-bottom: 15px;
        }

        .item {
            display: flex;
            align-items: center;
            gap: 18px;
            padding: 15px 0;
            border-bottom: 1px solid #edf2eb;
        }

        .item:last-child {
            border-bottom: none;
        }

        .item-image {
            width: 90px;
            height: 90px;
            border-radius: 12px;
            overflow: hidden;
            background: #e7f0e4;
            flex-shrink: 0;
        }

        .item-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .item-info {
            flex: 1;
        }

        .item-info h2 {
            color: #315b3e;
            font-size: 17px;
            margin-bottom: 6px;
        }

        .price {
            color: #568568;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .quantity-form {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        input[type="number"] {
            width: 70px;
            padding: 8px;
            border: 1px solid #dfe9dc;
            border-radius: 8px;
        }

        button {
            border: none;
            cursor: pointer;
        }

        .update {
            background: #568568;
            color: white;
            padding: 8px 12px;
            border-radius: 8px;
        }

        .remove {
            background: #f3dada;
            color: #a23b3b;
            padding: 8px 12px;
            border-radius: 8px;
        }

        .summary {
            background: white;
            border: 1px solid #dfe9dc;
            border-radius: 18px;
            padding: 22px;
        }

        .summary-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 15px;
        }

        .total {
            color: #254f35;
            font-size: 22px;
            font-weight: 700;
        }

        .checkout {
            display: block;
            width: 100%;
            text-align: center;
            text-decoration: none;
            background: #254f35;
            color: white;
            padding: 14px;
            border-radius: 11px;
            font-weight: 700;
        }

        .clear {
            margin-top: 10px;
            width: 100%;
            background: #f3dada;
            color: #a23b3b;
            padding: 11px;
            border-radius: 10px;
        }

        .empty {
            text-align: center;
            background: white;
            border-radius: 18px;
            padding: 60px 20px;
        }

        .empty-icon {
            font-size: 55px;
            margin-bottom: 15px;
        }

        .empty h2 {
            margin-bottom: 8px;
        }

        .empty a {
            display: inline-block;
            margin-top: 20px;
            background: #568568;
            color: white;
            padding: 11px 18px;
            border-radius: 10px;
            text-decoration: none;
        }

        @media (max-width: 700px) {
            body {
                padding: 15px;
            }

            .header {
                align-items: flex-start;
                flex-direction: column;
            }

            .item {
                align-items: flex-start;
                flex-wrap: wrap;
            }
        }
    </style>
</head>

<body>

<div class="container">

    <div class="header">

        <div>
            <h1>🛒 Keranjang Bibit</h1>
            <p>Periksa bibit sebelum melanjutkan pembayaran.</p>
        </div>

        <a
            href="{{ route('penanaman-pohon.index') }}"
            class="back"
        >
            ← Pilih Bibit Lagi
        </a>

    </div>

    @if(session('success'))
        <div class="alert">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert">
            {{ session('error') }}
        </div>
    @endif

    @if(count($cart) > 0)

        <div class="cart-card">

            @foreach($cart as $item)

                <div class="item">

                    <div class="item-image">

                        @if(!empty($item['gambar']))
                            <img
                                src="{{ asset($item['gambar']) }}"
                                alt="{{ $item['nama'] }}"
                            >
                        @else
                            <div
                                style="
                                    width:100%;
                                    height:100%;
                                    display:flex;
                                    align-items:center;
                                    justify-content:center;
                                    font-size:35px;
                                "
                            >
                                🌱
                            </div>
                        @endif

                    </div>

                    <div class="item-info">

                        <h2>
                            {{ $item['nama'] }}
                        </h2>

                        <div class="price">
                            Rp {{ number_format($item['harga'], 0, ',', '.') }}
                        </div>

                        <form
                            action="{{ route('penanaman-pohon.cart.update', $item['id']) }}"
                            method="POST"
                            class="quantity-form"
                        >

                            @csrf
                            @method('PUT')

                            <input
                                type="number"
                                name="jumlah"
                                min="1"
                                value="{{ $item['jumlah'] }}"
                            >

                            <button
                                type="submit"
                                class="update"
                            >
                                Update
                            </button>

                        </form>

                    </div>

                    <form
                        action="{{ route('penanaman-pohon.cart.remove', $item['id']) }}"
                        method="POST"
                    >

                        @csrf
                        @method('DELETE')

                        <button
                            type="submit"
                            class="remove"
                        >
                            Hapus
                        </button>

                    </form>

                </div>

            @endforeach

        </div>

        <div class="summary">

            <div class="summary-row">

                <span>
                    Jumlah bibit
                </span>

                <strong>
                    {{ $cartCount }}
                </strong>

            </div>

            <div class="summary-row">

                <span>
                    Total
                </span>

                <span class="total">
                    Rp {{ number_format($cartTotal, 0, ',', '.') }}
                </span>

            </div>

            <a
                href="{{ route('penanaman-pohon.checkout') }}"
                class="checkout"
            >
                Lanjut ke Checkout →
            </a>

            <form
                action="{{ route('penanaman-pohon.cart.clear') }}"
                method="POST"
            >

                @csrf
                @method('DELETE')

                <button
                    type="submit"
                    class="clear"
                >
                    Kosongkan Keranjang
                </button>

            </form>

        </div>

    @else

        <div class="empty">

            <div class="empty-icon">
                🛒
            </div>

            <h2>
                Keranjang masih kosong
            </h2>

            <p>
                Pilih bibit terlebih dahulu untuk melanjutkan.
            </p>

            <a href="{{ route('penanaman-pohon.index') }}">
                Pilih Bibit
            </a>

        </div>

    @endif

</div>

</body>
</html>
